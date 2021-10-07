<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\SpecificationController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',[CompanyController::class,'index']);

Route::resource('company',CompanyController::class);
Route::resource('specifications',SpecificationController::class);
Route::post('/specifications/addphoto',[SpecificationController::class,'addPhoto'])->name('addPhoto');
Route::get('/specifications/companyId/{companyId}',[SpecificationController::class,'getPhoneByCompany'])->name('getPhoneByCompany');