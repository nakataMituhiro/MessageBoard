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

//Route::get('/', function () {
    //return view('welcome');
//});
Route::get('/', 'MessagesController@index');

//Route::resource('messages', 'MessagesController',
//        ['only' => ['index','create','show','edit']]);
Route::resource('messages', 'MessagesController');

// CRUD
// メッセージの個別詳細ページ表示
Route::get('messages/{id}', 'MessagesController@show');

// メッセージの新規登録を処理
//Route::post('messages', 'MessagesController@store');
Route::post('messages/store', 'MessagesController@store')->name('messages.store');

// メッセージの更新処理
//Route::put('messages/{id}', 'MessagesController@update');
Route::put('messages/{id}/edit', 'MessagesController@update');

// メッセージを削除
Route::delete('messages/{id}', 'MessagesController@destroy');

// index: showの補助ページ
Route::get('messages', 'MessagesController@index')->name('messages.index');

// create: 新規作成用のフォームページ
Route::get('messages/create', 'MessagesController@create')->name('messages.create');

// edit: 更新用のフォームページ
//Route::get('messages/{id}/edit', 'MessagesController@edit')->name('messages.edit');
Route::get('messages/{id}/edit', 'MessagesController@edit');