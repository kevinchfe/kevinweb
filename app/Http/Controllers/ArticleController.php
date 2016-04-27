<?php

namespace App\Http\Controllers;

use App\Model\Article;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{

    /**
     *display all articles
     *
     */
    public function index()
    {
        $articles = Article::getAllArticle();
        viewInit();
        return view('home.index',compact('articles'));
    }

    public function show($id)
    {
        $article = Article::getArticleModelByArticleId($id);
        viewInit();
        return view('home.article',compact('article'));
    }

}
