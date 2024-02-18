<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Validator;

Route::get('/', function (){
    return view('pages.home');
});

Route::resource('user', UserController::class);