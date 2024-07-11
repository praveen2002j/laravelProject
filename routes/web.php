<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Authmanager;
use App\Http\Controllers\TodoController;

Route::get('/', function () {
    return view('layouts.auth');
})->name('home');

Route::get('/login',[Authmanager::class,'login'])->name('login');  
Route::post('/login',[Authmanager::class,'loginPost'])->name('login.post');  


Route::get('/registration',[Authmanager::class,'registration'])->name('registration');  
Route::post('/registration',[Authmanager::class,'registrationPost'])->name('registration.post');

//Route::get('/logout',[Authmanager::class,'logout'])->name('logout');
Route::post('/logout', [AuthManager::class, 'logout'])->name('logout');
Route::group(['middleware'=> 'auth'],function(){
    Route::get('/profile',function(){
        return "Hi" ;
    });
});


Route::get('/todo',[TodoController::class, 'todo'])->name('todos.todo');
Route::get('/todo/create',[TodoController::class, 'create'])->name('todos.create');
Route::post('/todo/store', [TodoController::class, 'store'])->name('todo.store');
Route::get('/todo/{todo}/edit', [TodoController::class, 'edit'])->name('todo.edit');
Route::put('/todo/{todo}/update', [TodoController::class, 'update'])->name('todo.update');
Route::delete('/todo/{todo}/destroy', [TodoController::class, 'destroy'])->name('todo.destroy');