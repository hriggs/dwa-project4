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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::controller("/join", "JoinController");

Route::controller("/login", "LoginController");

Route::controller("/puzzles", "PuzzlesController");

Route::controller("/profile", "ProfileController");

Route::controller("/scores", "ScoresController");

Route::controller("/", "IndexController");
