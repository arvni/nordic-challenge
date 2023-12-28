<?php

use App\Http\Controllers\AddMoneyController;
use App\Http\Controllers\GetBalanceController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get("/get-balance", GetBalanceController::class)->name("get-balance");
Route::post("/add-money", AddMoneyController::class)->name("add-money");
