<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Show login form
Route::get('/login', 'Auth\AuthController@getLogin');

// Process login form
Route::post('/login', 'Auth\AuthController@postLogin');

// Process logout
Route::get('/logout', 'Auth\AuthController@getLogout');

// Show registration form
Route::get('/register', 'Auth\AuthController@getRegister');

// Process registration form
Route::post('/register', 'Auth\AuthController@postRegister');

// Pages guests and logged-in users can see
Route::controller("/puzzles", "PuzzlesController");
Route::controller("/profile", "ProfileController");
Route::controller("/stats", "StatsController");
Route::controller("/change-password", "ChangePasswordController");
Route::controller("/high-scores", "HighScoresController");
Route::controller("/users/{username?}", "UsersController");
Route::controller("/the-river-crossing-puzzle", "RiverCrossingController");
Route::controller("/the-endangered-miners", "MinersController");
Route::controller("/", "IndexController");

/**
 * Guests cannot view the profile, change password, or stats page.
 */
Route::group(['middleware' => 'auth'], function () {
    Route::get('/profile', 'ProfileController@getIndex');
    Route::post('/profile', 'ProfileController@postIndex');
    
    Route::get('/stats', 'StatsController@getIndex');
    Route::post('/states', 'StatsController@postIndex');
    
    Route::get('/change-password', 'ChangePasswordController@getIndex');
    Route::post('/change-password', 'ChangePasswordController@postIndex');
});