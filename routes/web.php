<?php

use App\Models\Article;
use Illuminate\Support\Facades\Route;


Route::get('/',function (){
    return view('welcome');

});
Route::get('/about',function (){
    return view('about',[
        'articles'=>Article::take(3)->latest()->get()
    ]);
});
Route::get('/articles','App\Http\Controllers\ArticleController@index');
Route::get('/articles/{article}','App\Http\Controllers\ArticleController@show');
