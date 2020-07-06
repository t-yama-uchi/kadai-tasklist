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

//以前のもの
Route::get('/', 'TasksController@index');
Route::resource('tasks', 'TasksController');

//トップページ表示用新規作成（追加）
Route::get('/',function(){
    return view('welcome');
});

//ユーザ登録（追加）twitterクローン6.2の記載のもの
Route::get('signup', 'Auth\RegisterController@showRegistrationForm')->name('signup.get');
Route::post('signup', 'Auth\RegisterController@register')->name('signup.post');