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

/**
 * Home
 */

Route::get('/', 'HomeController@index')->name('home');

/* Route::get('/alert', function(){
    return redirect()->route('home')->with('info', 'You have signed up!');
});
*/

/**
 * Authentication
 */

Route::group(['middleware' => 'guest'], function () {

	Route::get('/signup', 'AuthController@getSignup')->name('auth.signup');

	Route::post('/signup', 'AuthController@postSignup');

	Route::get('/signin', 'AuthController@getSignin')->name('auth.signin');

	Route::post('/signin', 'AuthController@postSignin');

});

Route::get('/signout', 'AuthController@getSignout')->name('auth.signout');

/**
 * Search
 */

Route::get('/search', 'SearchController@getResults')->name('search.results');

/**
 * User profile
 */

Route::get('/user/{username}', 'ProfileController@getProfile')->name('profile.index');

Route::group(['middleware' => 'auth'], function () {

    Route::get('/profile/edit', 'ProfileController@getEdit')->name('profile.edit');

    Route::post('/profile/edit', 'ProfileController@postEdit');

/**
 * Friends
 */
    
    Route::get('/friends', 'FriendController@getIndex')->name('friend.index');

    Route::get('/friends/add/{username}', 'FriendController@getAdd')->name('friend.add');

    Route::get('/friends/accept/{username}', 'FriendController@getAccept')->name('friend.accept');

    Route::post('/friends/delete/{username}', 'FriendController@postDelete')->name('friend.delete');


/**
 * Statuses
 */

    Route::post('/status', 'StatusController@postStatus')->name('status.post');

    Route::post('/status/{statusId}/reply', 'StatusController@postReply')->name('status.reply');

    Route::get('/status/{statusId}/like', 'StatusController@getLike')->name('status.like');


}); 






