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

/* all */
Route::get('/', "Web\TaskController@index")->name('list');

/* create */
Route::get('/create', "Web\TaskController@create")->name('create_task');
Route::post('/create', "Web\TaskController@store")->name('create');

/* delete */
Route::delete('/delete/{id}', "Web\TaskController@delete")->name('delete');

/* update */
Route::patch('/update/{id}', "Web\TaskController@update")->name('update');

