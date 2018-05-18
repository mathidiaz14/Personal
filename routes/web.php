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
Auth::routes();

Route::get('/home'						, 'HomeController@index');
Route::get('/'							, 'HomeController@index');
Route::resource('people'				, 'PeopleController');
Route::resource('category'				, 'CategoryController');
Route::resource('note'					, 'NoteController');
Route::resource('conversation'			, 'ConversationController');
Route::get('conversation/search/{id}'	, 'ConversationController@search');
Route::post('search'					, 'HomeController@search');
