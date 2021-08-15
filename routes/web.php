<?php

use App\Http\Controllers\Aqe\PeopleController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
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

Route::get('login', [LoginController::class, 'showLoginForm'])->name('showLoginForm')->middleware('guest');
Route::get('register', [RegisterController::class, 'showRegisterForm'])->name('showRegisterForm')->middleware('guest');
Route::post('login', [LoginController::class, 'authenticate'])->name('login');
Route::post('register', [RegisterController::class, 'register'])->name('register');
Route::post('logout', [LoginController::class, 'logout'])->name('logout');
Route::get('people', [PeopleController::class, 'index'])->name('people.index');
Route::get('people/create', [PeopleController::class, 'create'])->name('people.create');
Route::get('people/edit/{id}', [PeopleController::class, 'edit'])->name('people.edit');
Route::put('people/edit/{id}', [PeopleController::class, 'update'])->name('people.update');
//Route::resource('people', PeopleController::class);
Route::redirect('/', 'people');
