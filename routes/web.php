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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('user/{id}', function ($id) {
    return 'User '.$id;
});
Route::get('blogs', ['uses' => 'PostsController@getBlogs', 'as' => 'route_edit']);
Route::get('blogs/{id}', ['uses' => 'PostsController@getBlogById', 'as' => 'route_edit'])->where('id', "[a-z0-9]{6,}$");
Route::get('blogs/edit/{id?}', ['uses' => 'PostsController@edit', 'as' => 'route_edit']);
Route::post('blogs/save/', ['uses' => 'PostsController@save', 'as' => 'route_update']);
Route::get('blogs/delete/{id}', ['uses' => 'PostsController@delete', 'as' => 'route_delete']);

Route::get('blogs/add/', ['uses' => 'PostsController@add', 'as' => 'route_save']);
Route::get("now", function() {return date("y-m-d H:i:s");});