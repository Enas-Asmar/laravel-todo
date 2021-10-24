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


Route::get('/', 'App\Http\Controllers\TodolistController@showAllData');
Route::get('delete/{id}', 'App\Http\Controllers\TodolistController@delete');
Route::get('create', 'App\Http\Controllers\TodolistController@create');
Route::get('todo_submit', 'App\Http\Controllers\TodolistController@todo_submit');
Route::get('edit/{id}', 'App\Http\Controllers\TodolistController@edit');
Route::get('edit_submit/{id}', 'App\Http\Controllers\TodolistController@edit_submit');
Route::get('/search', 'App\Http\Controllers\TodolistController@search');
Route::get('/order', 'App\Http\Controllers\TodolistController@order');
Route::get('comp/{id}', 'App\Http\Controllers\TodolistController@completed');
