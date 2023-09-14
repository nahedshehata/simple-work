<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function show($id){
        $article=Article::find($id);
        return view('article.show',['article'=>$article]);
    }
    public function index(){
        $articles=Article::latest()->get();
        return view('article.index',['articles'=>$articles]);
    }
}
