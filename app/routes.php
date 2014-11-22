<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('hello');
});

Route::controller('users', 'UsersController');
Route::controller('relationships', 'RelationshipsController');
Route::controller('students', 'StudentsController');
Route::controller('stickinessLogs', 'StickinessLogsController');
Route::controller('voteLogs', 'VoteLogsController');
Route::controller('comments', 'CommentsController');