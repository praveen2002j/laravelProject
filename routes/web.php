<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Authmanager;
Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/login',[Authmanager::class,'login'])->name('login');  
Route::post('/login',[Authmanager::class,'loginPost'])->name('login.post');  

Route::get('/registration',[Authmanager::class,'registration'])->name('registration');  
Route::post('/registration',[Authmanager::class,'registrationPost'])->name('registration.post');

Route::get('/logout',[Authmanager::class,'logout'])->name('logout');
