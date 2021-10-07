<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\SpecificationController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/companies',[CompanyController::class,'getCompany']);
Route::post('/phone/add',[SpecificationController::class,'addPhone']);


Route::get('/specifications',[SpecificationController::class,'getPhones']);
Route::get('/specifications/{id}',[SpecificationController::class,'getPhoneDetail']);
