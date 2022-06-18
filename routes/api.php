<?php

use Illuminate\Http\Request;
use App\Http\Controllers\admin\CategoriesAdminController;
use App\Http\Controllers\API\ApiCategory;
use App\Http\Controllers\API\ApiCountries;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::middleware(['api'])->group(function(){
    
    // Route::get('/categories_admin', [CategoriesAdminController::class, 'ShowCategoryAdmin'])->name('categories_admin');
    // Route::get('/homeAdmin', [CategoriesAdminController::class, 'homeAdmin'])->name('homeAdmin');
    // Route::get('/editUser/{id}', [CategoriesAdminController::class, 'editUser'])->name('editUser');
    Route::get('showCategory', [ApiCategory::class, 'show']);
    Route::post('add_category', [ApiCategory::class, 'store']);
    Route::get('/edit_category/{id}', [ApiCategory::class, 'editCategory'])->name('edit_category');
    Route::post('UpdateCategory', [ApiCategory::class, 'UpdateCategory']);
    Route::post('CategoryActive', [ApiCategory::class, 'CategoryActive']);
    Route::get('countriesAdmin', [ApiCountries::class, 'countriesAdmin'])->name('countriesAdmin');
    Route::post('add_country', [ApiCountries::class, 'addCountry']);
    Route::get('showCountries', [ApiCountries::class, 'showCantry']);
    Route::get('/edit_country/{id}', [ApiCountries::class, 'EditCantry']);
    Route::post('/UpdateCountry', [ApiCountries::class, 'UpdateCountry']);
// });