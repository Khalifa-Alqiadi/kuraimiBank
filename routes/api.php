<?php

use Illuminate\Http\Request;
use App\Http\Controllers\admin\CategoriesAdminController;
use App\Http\Controllers\API\ApiCategory;
use App\Http\Controllers\API\ApiCities;
use App\Http\Controllers\API\ApiCountries;
use App\Http\Controllers\API\ApiExchangeRates;
use App\Http\Controllers\API\ApiServices;
use App\Http\Controllers\API\ApiServiceAdvantages;
use App\Http\Controllers\API\ApiJobsAdmin;
use App\Http\Controllers\API\ApiServicePoints;
use App\Http\Controllers\API\ApNewsAdmin;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\API\ApiWebsiteInfo;
use App\Http\Controllers\API\ApiSocialMedia;
use App\Http\Controllers\API\ApiAuthenticate;
use App\Http\Controllers\API\ApiOurPartners;
use App\Http\Controllers\LocaleController;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::middleware('web')->group(function () {
    // Route::group(['middleware' => 'auth'], function () {
    // Route::group(['middleware' => ['role:admin']], function () {



    // Route::group(['middleware' => ['api']], function () {
    //routes here


});


// Route::post('add_category', [CategoriesAdminController::class, 'store'])->name('add_category');
