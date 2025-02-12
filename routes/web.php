<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::post('/books/{book}/borrow/{user}', 'ActivityController@trackBookBorrowing');
Route::post('/authors/{author}/event/{user}/{eventType}', 'ActivityController@trackAuthorEvent');
Route::get('/activities', 'ActivityController@listActivities');
