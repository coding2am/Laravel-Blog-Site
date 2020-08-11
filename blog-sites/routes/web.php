<?php

use Illuminate\Support\Facades\Route;

//PublicPages
Route::get('/', 'HomeController@index')->name('home');
Route::get('/about','HomeController@about');
Route::get('/news', 'HomeController@new');
Route::get('/videos', 'HomeController@video');
Route::get('/feature', 'HomeController@feature');
Route::get('/publication', 'HomeController@publication');
Route::get('/election', 'HomeController@election');
Route::get('/intro', 'HomeController@intro');
Route::get('/privacy', 'HomeController@privacy');
Route::get('/term', 'HomeController@term');
Route::get('/normaluser','NormalUserController@index');
Route::get('/blog/detail/{id}','BlogController@detail');
Route::post('comments/add','CommentController@add')->middleware('auth');

//Auth
Auth::routes();
Route::get('/login',['as' => 'login', 'uses' => 'Auth\LoginController@show']);
Route::post('/login',['as' => 'login', 'uses' => 'Auth\LoginController@login']);
Route::get('/logout','Auth\LoginController@logout');

//AdminPrefixRoutes
Route::group(['prefix'=>'admin','middleware'=>'auth'],function(){
    //Blogs
    Route::get('/blogs','BlogController@index');
    Route::get('/blog/create','BlogController@create');
    Route::post('/blog/create','BlogController@store');
    Route::get('/blog/edit/{id}','BlogController@edit');
    Route::post('/blog/edit/{id}','BlogController@update');
    Route::get('blog/delete/{id}','BlogController@destroy');
    Route::get('/blog/show/{id}','BlogController@show');
    //Users
    Route::get('users','UserController@index');
    Route::get('user/show/{id}','UserController@show');
    Route::get('user/edit/{id}','UserController@edit');
    Route::post('user/edit/{id}','UserController@update');
    //Roles
    Route::get('roles','RoleController@index');
    Route::get('role/edit/{id}','RoleController@edit');
    Route::post('role/edit/{id}','RoleController@update');
    Route::get('role/create','RoleController@create');
    Route::post('role/create','RoleController@store');
    Route::get('role/delete/{id}','RoleController@destroy');
    //Permission
    Route::get('/manager','ManagerController@index')->middleware('isManager');
    Route::get('/supervisor','SupervisorController@index')->middleware('isSupervisor');
    Route::get('/staff','StaffController@index')->middleware('isStaff');
});
