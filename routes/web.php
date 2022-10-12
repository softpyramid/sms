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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('branch.dashboard');
    })->name('dashboard');

    Route::get('/students', function () {
        return view('student.dashboard');
    })->name('students');

    Route::get('/students/create', function () {
        return view('student.dashboard');
    })->name('student.create');

    Route::get('/students/{id}/edit', function () {
        return view('student.dashboard');
    })->name('student.edit');

    Route::get('/fee', function () {
        return view('fee.dashboard');
    })->name('fee');

});
