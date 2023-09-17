<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{

    public function show(Article $article){
        return view('article.show',['article'=>$article]);
    }
    public function index(){
        $articles=Article::latest()->get();
        return view('article.index',['articles'=>$articles]);
    }
    public function create(){
        return view('article.create');

    }
    public function store(){

        request()->validate([
            'title'=>'required',
            'excerpt'=>'required',
            'body'=>'required'
        ]);
        $title = request()->title;
        $excerpt = request()->excerpt;
        $body = request()->body;
        $article = Article::create([
            'title' => $title,
            'excerpt' => $excerpt,
            'body' => $body
        ]);
        return redirect('/articles');

    }
    public function edit(Article $article){
        return view('article.edit',compact('article'));

    }
    public function update(Article $article){
        $article->update([
            'title' => request()->title,
            'excerpt' => request()->excerpt,
            'body' => request()->body
        ]);
        return redirect('/articles/'.$article->id);
    }
    public function destroy(Article $article){
        $article->delete();
        return redirect('/article');

    }
}
