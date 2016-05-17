<?php

namespace App\Http\Controllers\backend;

use App\Model\Category;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class CateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cates = Category::getCategoryDataModel();
        return view('backend.content.cate.index',compact('cates'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cateArr = Category::getCategoryTree();
        return view('backend.content.cate.create',compact('cateArr'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\CateForm $request)
    {
        try {
            if (Category::create($request->all())) {
                return redirect()->route('backend.cate.index')->with(['message' => '成功添加一个分类']);
            }
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(array('error' => $e->getMessage()))->withInput();
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('backend.content.cate.edit')->withCate(Category::find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\CateForm $request, $id)
    {
        try {
            $data = $request->all();
            unset($data['_method']);
            unset($data['_token']);
            if (Category::where('id', $id)->update($data)) {
                return redirect()->route('backend.cate.index')->with(['message' => '修改成功']);
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
        $son = Category::where('parent_id', $id)->get()->toArray();
        if (!empty($son)) {
            return redirect()->back()->with(['message'=>'请先删除下级分类']);
        }
        if (Category::destroy($id)) {
            return redirect()->route('backend.cate.index')->with(['message' => '删除成功']);
        }
    }
}
