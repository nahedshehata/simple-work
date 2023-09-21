<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Tag;
use Illuminate\Http\Request;

class ArticleController extends Controller
{

    public function show(Article $article){
        return view('article.show',['article'=>$article]);
    }
    public function index(){
        if(request('tag'))
        {
            $articles = Tag::where('name', request('tag'))->firstOrFail()->article;
        }
        else
        {
            $articles = Article::latest()->get();

        }
        return view('article.index',['articles'=>$articles]);
    }
    public function create(){
        $tags=Tag::all();
        return view('article.create',['tags'=>$tags]);
    }
    public function store(){
        $this->validateArticle();
        $article=new Article(request(['title','excerpt','body']));
        $article->user_id=1;
        $article->save();
        $article->tags()->attach(request('tags'));

        return redirect('/articles');

    }
    public function edit(Article $article){
        return view('article.edit',compact('article'));

    }
    public function update(Article $article){
        $article->update($this->validateArticle());
        return redirect('/articles/'.$article->id);
    }
    public function destroy(Article $article){
        $article->delete();
        return redirect('/article');

    }
    protected function validateArticle(){
        return request()->validate([

                'title' =>'required' ,
                'excerpt' => 'required' ,
                'body' => 'required' ,
                'tag'=>'exists:tags,id'
        ]);


    }

}
