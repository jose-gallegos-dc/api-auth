<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CompanyController;
use App\Http\Controllers\Api\EmployeeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::prefix('auth')->controller(AuthController::class)->group(function () {
    Route::post('register', 'register');
    Route::post('login', 'login');
});

Route::group(['middleware' => ['auth:sanctum']], function(){
    
    Route::resource('companies', CompanyController::class)
    ->only(['index', 'store', 'show', 'update', 'destroy']);

    Route::resource('employees', EmployeeController::class)
    ->only(['index', 'store', 'show', 'update', 'destroy']);
});
