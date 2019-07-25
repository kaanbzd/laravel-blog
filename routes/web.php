<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//use Illuminate\Support\Facades\Auth;
//use Illuminate\Support\Facades\Route;

Route::get('/', 'ArticleController@index') ;
Route::get('/detail/{id}','ArticleController@show');
Route::get('/create','ArticleController@create')->middleware('auth');
Route::get('/edit/{id}','ArticleController@edit')->name('edit-post')->middleware('auth');


Route::post('/create','ArticleController@store');
Route::put('/edit/{id}','ArticleController@update');
Route::delete('/detail/{id}','ArticleController@destroy');
Route::post('/detail/{id}/comment', 'CommentController@store');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
