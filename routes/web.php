<?php

use App\Http\Controllers\front\HomeController;
use App\Http\Controllers\admin\CategoriesAdminController;
use App\Http\Controllers\admin\UsersAdminController;
use App\Http\Controllers\LocaleController;
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
    Route::get('/frontIndex', [HomeController::class, 'frontIndex'])->name('frontIndex');
    Route::get('/', function () {
        return view('welcome');
    });
    Route::get('/categories_admin', [CategoriesAdminController::class, 'ShowCategoryAdmin'])->name('categories_admin');
    Route::get('/homeAdmin', [CategoriesAdminController::class, 'homeAdmin'])->name('homeAdmin');
    
    // Route::post('add_category', [CategoriesAdminController::class, 'store'])->name('add_category');
    Route::get('/usersAdminManage', [UsersAdminController::class, 'ShowUsersAdmin'])->name('usersAdminManage');
    Route::get('change-language/{locale}', [LocaleController::class, 'switch'])->name('change-language');
    
});

