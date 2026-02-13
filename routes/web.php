<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/admin/users',UserController::class.'@index')->name('admin.index');
Route::get('/admin/archive',UserController::class.'@archive')->name('admin.archive');
Route::get('/admin/create',UserController::class.'@create')->name('admin.create');
Route::post('/admin/create',UserController::class.'@store')->name('admin.store');
Route::post('/admin/update/{user}',UserController::class.'@edit')->name('admin.edit');
Route::post('/admin/delete/{user}',UserController::class.'@destroy')->name('admin.delete');
Route::post('/admin/destroy/{user}',UserController::class.'@forceDelete')->withTrashed()->name('admin.destroy');
Route::patch('/admin/restore/{user}',UserController::class.'@restore')->withTrashed()->name('admin.restore');
Route::put('/admin/update',UserController::class.'@update')->name('admin.update');