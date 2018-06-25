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
Route::get('timeline', 'PostsController@index')->name('timeline');
//Route::get('/', 'PostsController@index');

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
    Route::resource('users', 'UsersController', ['only' => ['index', 'show']]);
    Route::resource('posts', 'PostsController', ['only' => ['create','store','update','edit','destroy']]);
    Route::group(['prefix' => 'users/{id}'], function () {
        Route::post('follow', 'UserFollowController@store')->name('user.follow');
        Route::delete('unfollow', 'UserFollowController@destroy')->name('user.unfollow');
        Route::get('followings', 'UsersController@followings')->name('users.followings');
        Route::get('followers', 'UsersController@followers')->name('users.followers');
        // favorites
        Route::get('favorites', 'UsersController@favorites')->name('users.favorites');
        // profile
        Route::get('edit', 'UsersController@edit')->name('users.edit');
        Route::put('udpate', 'UsersController@update')->name('users.update');
    });

    Route::group(['prefix' => 'posts/{id}'], function () {
        // favorites
        Route::post('favorite', 'UserFavoriteController@store')->name('user.favorite');
        Route::delete('unfavorite', 'UserFavoriteController@destroy')->name('user.unfavorite');
    });
});
