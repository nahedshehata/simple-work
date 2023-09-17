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
Route::post('/articles','App\Http\Controllers\ArticleController@store' );
Route::get('/articles/{article}/edit','App\Http\Controllers\ArticleController@edit');
Route::get('/articles/create','App\Http\Controllers\ArticleController@create');
Route::get('/articles/{article}','App\Http\Controllers\ArticleController@show');
Route::put('/articles/{article}','App\Http\Controllers\ArticleController@update');

