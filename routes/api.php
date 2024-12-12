<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthenticationController;
use App\Http\Controllers\Api\OperationController;
use App\Http\Controllers\Api\CurrencyController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| This file is used to register API routes for your application. These
| routes will all be assigned to the "api" middleware group.
|
*/

// Grouping for versioning and organizing API routes
Route::group(['namespace' => 'Api', 'prefix' => 'v1'], function () {

    // Route for local login (internal authentication)
    Route::post('login', [AuthenticationController::class, 'login'])->name('api.local_login');


    // Protect routes with local authentication middleware (auth:api)
    Route::group(['middleware' => 'auth:api'], function () {

        Route::post('/operations', [OperationController::class, 'addOperation']);
        Route::get('/operations', [OperationController::class, 'getAllOperations']);
        Route::get('/operations/{id}', [OperationController::class, 'getOperationById']);
        Route::post('/currencies', [CurrencyController::class, 'storeOrUpdate']);
        // Get all currencies
        Route::get('/currencies', [CurrencyController::class, 'getAllCurrency']);

        // Get currency by code
        Route::get('/currencies/{code}', [CurrencyController::class, 'getCurrencyByCode']);

    });
});
