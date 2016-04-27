<?php

namespace App\Http\Controllers\backend;

use App\Model\Article;
use App\Model\Category;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::all();
        return view('backend.content.article.index',compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $catArr = Category::getCategoryTree();
        unset($catArr[0]);
        return view('backend.content.article.create',compact('catArr'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\ArticleForm $result)
    {
        try {
            $data = array(
                'title' => $result->title,
                'cat_id' => $result->cat_id,
                'content' => $result->content,
                );
            if (Article::create($data)) {
                return redirect()->route('backend.article.index')->with(['message' => '恭喜你又写一篇干货！']);
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
        $catArr = Category::getCategoryTree();
        unset($catArr[0]);
        $article = Article::findOrFail($id);
        return view('backend.content.article.edit', compact('article', 'catArr'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\ArticleForm $result, $id)
    {
        try {
            $data = array(
                'title'=>$result->title,
                'cat_id'=>$result->cat_id,
                'content' =>$result->content,
            );

            if(Article::where('id',$id)->update($data)){
                return redirect()->route('backend.article.index')->with([
                    'message' => '更新成功',
                ]);
            }
        } catch(\Exception $e) {
                return redirect()->back()->withErrors(array('error'=>$e->getMessage()))->withInput();
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
        if(Article::destroy($id)){
            return redirect()->route('backend.article.index')->with([
               'message' => '删除成功！',
            ]);
        }
    }
}
