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
use App\Http\Controllers\API\ApiFinancialReports;
use App\Http\Controllers\API\ApiOurPartners;
use App\Http\Controllers\API\ApiSocialMedia;
use App\Http\Controllers\API\ApNewsAdmin;
use App\Http\Controllers\API\ApiJobsAdmin;
use App\Http\Controllers\API\ApiExchangeRates;
use App\Http\Controllers\API\ApiServicePoints;
use App\Http\Controllers\API\ApiCountries;
use App\Http\Controllers\API\ApiUsers;
use App\Http\Controllers\API\ApiPermissions;

use App\Http\Controllers\API\ApiServiceAdvantages;
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

Route::get('change-language/{locale}', [LocaleController::class, 'switch'])->name('change-language');
Route::get('/frontIndex', [HomeController::class, 'frontIndex'])->name('frontIndex');
Route::get('/', function () {
    return view('front.index');
});
Route::middleware(['web'])->group(function () {
    Route::group(['middleware' => 'auth'], function () {
        Route::group(['middleware' => ['role:admin|admin_reports|admin_services']], function () {


            // Route::get('/categories_admin', [CategoriesAdminController::class, 'ShowCategoryAdmin'])->name('categories_admin');
            // Route::get('/categories_admin', ['middleware' => ['permission:manage_website'], 'uses' => 'App\Http\Controllers\API\ApiCategory@ShowCategoryAdmin'])->name('categories_admin');

        });
    });
});
Route::get('/errors-admin', [CategoriesAdminController::class, 'errors'])->name('errors-admin');

// Route::get('/login', [ApiAuthenticate::class, 'show'])->name('login');
// Route::get('sign_in', [ApiAuthenticate::class, 'sign_in']);
// Route::post('login-save', [ApiAuthenticate::class, 'login_save'])->name('login-save');
Route::get('logout', [ApiAuthenticate::class, 'logout'])->name('logout');
