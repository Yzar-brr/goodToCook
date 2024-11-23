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

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::view('home', 'welcome')
    ->name('home');


// Admin auth routes

Route::view('admin_show_recipes', 'admin.recipes')
    ->middleware(['auth', 'verified', 'admin'])
    ->name('admin_show_recipes');

Route::view('admin_show_users', 'admin.users')
    ->middleware(['auth', 'verified', 'admin'])
    ->name('admin_show_users');

    Route::view('admin_show_ingredients', 'admin.ingredients')
    ->middleware(['auth', 'verified', 'admin'])
    ->name('admin_show_ingredients');


require __DIR__.'/auth.php';