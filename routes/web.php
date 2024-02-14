<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Validator;

Route::get('/', function (){
    return view('pages.home');
});

Route::get('/users', [UserController::class, 'index']);

Route::get('/user/{id}/show', [UserController::class, 'show']);

Route::get('/user/{id}/edit',  [UserController::class, 'edit']);

Route::get('user/create', [UserController::class, 'create']);

Route::post('user/store', [UserController::class, 'store']);

Route::post('user/update/{id}', [UserController::class, 'update']);

Route::post('user/{id}/delete', [UserController::class, 'destroy']);