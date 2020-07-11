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
Route::get('/tasks/list', 'TasksController@index');
// Route::resource('tasks', 'TasksController');

//トップページ表示用新規作成（追加）
Route::get('/', 'TopController@index');

//ユーザ登録（追加）twitterクローン6.2の記載のもの
Route::get('signup', 'Auth\RegisterController@showRegistrationForm')->name('signup.get');
Route::post('signup', 'Auth\RegisterController@register')->name('signup.post');

//ログイン認証(追加) 7.ログイン機能記載のもの
Route::get('login','Auth\LoginController@showLoginForm')->name('login');
Route::post('login','Auth\LoginController@login')->name('login.post');
Route::get('logout','Auth\LoginController@logout')->name('logout.get');

//ユーザー機能（追加） 8.2 Router　ログイン認証付きのルーティングより
Route::group(['middleware' => 'auth'], function() {
    Route::resource('tasks', 'TasksController');
});