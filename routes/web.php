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

Route::get('/tasks/create', 'TasksController@create');

Route::get('/tasks', 'TasksController@index');
//Route::get('/tasks/{sort}', 'TasksController@index');

Route::get('/tasks/{task}', 'TasksController@show');

Route::patch('/tasks/{task}/edit', 'TasksController@update');
Route::delete('/tasks/{task}/delete', 'TasksController@destroy');

Route::post('/tasks', 'TasksController@store');
Route::post('/tasks/{task}/comments', 'CommentsController@create');


Route::get('/index_reverse', 'TasksController@index_reverse');
Route::get('/', 'TasksController@index');


Route::get('/posts/{post}', 'PostController@show');






Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
