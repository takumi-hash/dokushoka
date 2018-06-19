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

Route::get('/', 'WelcomeController@index');

Auth::routes();

// Ranking
Route::get('ranking/want', 'RankingController@want')->name('ranking.want');
Route::get('ranking/have', 'RankingController@have')->name('ranking.have');


Route::group(['middleware' => ['auth']], function () {
    Route::resource('books', 'BooksController', ['only' => ['create', 'show']]);
    Route::post('want', 'BookUserController@want')->name('book_user.want');
    Route::delete('want', 'BookUserController@dont_want')->name('book_user.dont_want');
    Route::post('have', 'BookUserController@have')->name('book_user.have');
    Route::delete('have', 'BookUserController@dont_have')->name('book_user.dont_have');
    Route::resource('users', 'UsersController', ['only' => ['show']]);
});

