<?php

namespace App\Http\Controllers\backend;

use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('id','desc')->paginate(1);
        return view('backend/user/index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*
         * 自定义验证规则
         */
        $validator = Validator::make($request->all(),[
            'name'=>'required',
            'email'=>'required|email',
            'password'=>'required|min:6|confirmed',
            'password_confirmation'=>'required|min:6',
        ]);
        if ($validator->fails()) {
            return redirect('backend/user/create')->withErrors($validator)->withInput();
        }
        $input = $request->all();
        $user = new User;
        $user->name = $input['name'];
        $user->email = $input['email'];;
        $user->password = bcrypt($input['password']);
        if ($user->save()) {
            return redirect('/backend/user')->with([
               'message' => 'Create user successfully!',
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('backend.user.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password'=>'required|min:6|confirmed',
            'password_confirmation'=>'required|min:6',
        ]);
        if ($validator->fails()) {
            return redirect('backend/user/' . $id . '/edit')->withErrors($validator)->withInput();
        }

       /* if (User::updateUserInfo($id, $request->all())) {
            return redirect('backend.user')->with(['message' => '修改成功！',]);*/

        try {
            if (User::updateUserInfo($id, $request->all())) {
                return redirect('backend/user')->with(['message' => '修改成功！']);
            }
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(array('error' => $e->getMessage()))->withInput();
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (User::destroy($id)) {
            return redirect('/backend/user')->with([
               'message'=>'删除成功',
            ]);
        }
    }
}
