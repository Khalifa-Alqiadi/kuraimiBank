<?php

use App\Http\Controllers\front\HomeController;
use App\Http\Controllers\admin\CategoriesAdminController;
use App\Http\Controllers\admin\UsersAdminController;
use App\Http\Controllers\LocaleController;
use App\Http\Controllers\API\ApiCities;
use App\Http\Controllers\API\ApiAuthenticate;
use App\Http\Controllers\API\ApiCategory;
use App\Http\Controllers\API\ApiServices;
use App\Http\Controllers\API\ApiWebsiteInfo;
use Illuminate\Support\Facades\Route;

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


Route::middleware(['web'])->group(function(){
    Route::group(['middleware' => 'auth'], function () {
        Route::group(['middleware' => ['role:admin']], function () {
            Route::get('/frontIndex', [HomeController::class, 'frontIndex'])->name('frontIndex');
            Route::get('/', function () {
                return view('welcome');
            });
            Route::get('/homeAdmin', [CategoriesAdminController::class, 'homeAdmin'])->name('homeAdmin');
            Route::get('/show-control-info', [ApiWebsiteInfo::class, 'show'])->name('show-control-info');
            Route::get('/Show-Services', [ApiServices::class, 'ShowServices'])->name('Show-Services');
            Route::post('/add_service', [ApiServices::class, 'store']);
        });
    });  

    
});

Route::get('/login', [ApiAuthenticate::class, 'show'])->name('login');

    Route::get('sign_in', [ApiAuthenticate::class, 'sign_in']);
    Route::post('login-save', [ApiAuthenticate::class, 'login_save'])->name('login-save');
