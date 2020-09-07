<?php

use Illuminate\Support\Facades\Route;

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


//admin route //

Route::group(["middleware" => ['auth', 'IsAdmin']], function (){

Route::get('/admin', 'AdminController@index')->name('admin');
Route::post('/store-book', 'AdminController@store');
Route::get('/show-table', 'AdminController@show_table');
Route::get ( '/vueitems', 'AdminController@readItems' );
Route::get ( '/edititems/{id}', 'AdminController@editItem' );
Route::post ( '/deleteitems/{id}', 'AdminController@deleteItem' );
Route::post ( '/book-edit', 'AdminController@getBookDetails' );
Route::post ( '/update-book', 'AdminController@update' );

});





//user route//
Route::group(["middleware" => ['auth']], function (){
	Route::get('/home', 'HomeController@index')->name('home');
	Route::get( '/user-book-show', 'UserController@index' );
	Route::get ( '/user-vueitems', 'UserController@readItems' );
	Route::post ( '/user-rent-book', 'UserController@rentBookStore' );
	Route::get ( '/user-return-book', 'UserController@returnBookShow' );
	Route::get ( '/rented-book-list', 'UserController@rented_book_list' );
	Route::post ( '/user-delete-booked', 'UserController@destroy' );

});
