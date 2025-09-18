<?php

use App\Http\Controllers\LoanController;
use App\Http\Controllers\UserAuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::get('/home', [LoanController::class, 'view']);
Route::get('/home/formPinjaman', [LoanController::class, 'form']);
Route::get('/home/penawaran', [LoanController::class, 'offer']);
Route::post('/home/ajukanPinjaman', [LoanController::class, 'store']);

Route::get('/signUp', [UserAuthController::class, 'viewSignUp']);
Route::get('/login', [UserAuthController::class, 'viewlogin']);
Route::get('/logout', [UserAuthController::class, 'logout']);

Route::post('/signUp/store', [UserAuthController::class, 'store']);
Route::post('/login/auth', [UserAuthController::class, 'auth']);