<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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
})->name('welcome');

    Route::get('/home', function () {
        return view('dashboard');
    })->name('home');

    Route::get('profile', function(){
        return view('profile.edit');
    })->name('profile.edit');

    Route::get('update', function(){
        return view('profile.edit');
    })->name('profile.update');

    Route::get('password', function(){
        return view('profile.edit');
    })->name('profile.password');

    Route::get('user', function(){
        return view('users.index');
    })->name('user.index');

    Route::get('login', function(){
        return view('auth.login');
    })->name('login');


    Route::get('register', function(){
        return view('auth.register');
    })->name('register');

    Route::get('logout', function(){
        return view('welcome');
    })->name('logout');

    Route::get('upgrade', function () {return view('pages.upgrade');})->name('upgrade'); 
    Route::get('map', function () {return view('pages.maps');})->name('map');
    Route::get('icons', function () {return view('pages.icons');})->name('icons'); 
    Route::get('table-list', function () {return view('pages.tables');})->name('table');