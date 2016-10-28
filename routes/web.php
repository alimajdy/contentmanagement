<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

use App\User;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('/role/{id}', function($id){
    $user = User::find($id);


        return $user->role->name;


});
Route::get('/admin', function(){

    return view('admin.index');
});

// put it in admin middleware to check if user login and if user is admin
Route::group(['middleware' => 'admin'], function(){

    Route::resource('admin/users', 'AdminUsersController');
    Route::resource('admin/posts', 'AdminPostsController');


});



