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

// Route::middleware('web')->group(function (){
    // Route::group(['middleware' => 'auth'], function () {
        // Route::group(['middleware' => ['role:admin']], function () {
            Route::get('showCountries', [ApiCountries::class, 'showCantry']);
            Route::get('/Api-Cities', [ApiCities::class, 'show']);


    
    
    
            Route::get('showCategory', [ApiCategory::class, 'show']);
            Route::get('/categories_admin', [CategoriesAdminController::class, 'ShowCategoryAdmin'])->name('categories_admin');
            Route::post('add_category', [ApiCategory::class, 'store']);
            Route::get('/edit_category/{id}', [ApiCategory::class, 'editCategory'])->name('edit_category');
            Route::post('UpdateCategory', [ApiCategory::class, 'UpdateCategory']);
            Route::get('countriesAdmin', [ApiCountries::class, 'countriesAdmin'])->name('countriesAdmin');
            Route::post('add_country', [ApiCountries::class, 'addCountry']);
            
            Route::get('/edit_country/{id}', [ApiCountries::class, 'EditCantry']);
            Route::post('/UpdateCountry', [ApiCountries::class, 'UpdateCountry']);
            Route::post('/CountryActive', [ApiCountries::class, 'ActiveCountry']);
            Route::post('/CountryDelete', [ApiCountries::class, 'DeleteCountry']);
            Route::post('/add_City', [ApiCities::class, 'store']);
            
            Route::get('/showCities', [ApiCities::class, 'showCities'])->name('showCities');
            Route::get('/Edit_City/{id}', [ApiCities::class, 'edit']);
            Route::post('/UpdateCity', [ApiCities::class, 'update']);
            Route::post('/CityActive', [ApiCities::class, 'active']);
            Route::post('/CityDelete', [ApiCities::class, 'delete']);


            Route::get('/service-points', [ApiServicePoints::class, 'showServicePoints']);
            Route::get('/show_service-points', [ApiServicePoints::class, 'show']);
            Route::post('/add_service_point', [ApiServicePoints::class, 'store']);
            Route::get('/Edit_Service_Point/{id}', [ApiServicePoints::class, 'edit']);
            Route::post('/UpdateServicePoint', [ApiServicePoints::class, 'update']);
            Route::post('/ServicePointActive', [ApiServicePoints::class, 'active']);




            
            
            Route::get('/Edit_Service/{id}', [ApiServices::class, 'edit']);
            
            




            Route::get('/Show-exchange-rate', [ApiExchangeRates::class, 'showRate']);
            Route::post('/add_exchange_rate', [ApiExchangeRates::class, 'store']);
            Route::get('/show-exchange-rate', [ApiExchangeRates::class, 'show']);
            Route::get('/edit_rate/{id}', [ApiExchangeRates::class, 'edit']);
            Route::post('/UpdateRate', [ApiExchangeRates::class, 'update']);
            


            Route::get('/service-advantage/{id}', [ApiServiceAdvantages::class, 'show']);
            Route::post('/add_service_advantage', [ApiServiceAdvantages::class, 'store'])->name('add_service_advantage');
            Route::get('/Edit_Service_Adv/{id}', [ApiServiceAdvantages::class, 'edit'])->name('Edit_Service_Adv');
            Route::post('/update_service_advantage', [ApiServiceAdvantages::class, 'update'])->name('update_service_advantage');
            





            Route::get('/show-jobs', [ApiJobsAdmin::class, 'showJobs'])->name('show-jobs');
            Route::get('/showJobs', [ApiJobsAdmin::class, 'show'])->name('showJobs');
            Route::post('/add-Job', [ApiJobsAdmin::class, 'store'])->name('add-Job');
            Route::get('/Edit_Job/{id}', [ApiJobsAdmin::class, 'edit'])->name('Edit_Job');
            Route::post('/update-Job', [ApiJobsAdmin::class, 'update'])->name('update-Job');




            Route::get('/show-news', [ApNewsAdmin::class, 'show'])->name('show-news');
            Route::get('/showNews', [ApNewsAdmin::class, 'show_news'])->name('showNews');
            Route::post('/add-news', [ApNewsAdmin::class, 'store'])->name('add-news');
            Route::post('/update-News', [ApNewsAdmin::class, 'update'])->name('update-News');
            Route::get('/Edit_News/{id}', [ApNewsAdmin::class, 'edit']);



            
            
            
            



            Route::get('/show-social_media', [ApiSocialMedia::class, 'show'])->name('show-social_media');
            Route::get('/show-social-media', [ApiSocialMedia::class, 'showSocialMedia'])->name('show-social-media');
            
            
            
            
            Route::get('/showAxios', [ApiCities::class, 'shshowAxiosow']);
            
            
            
        // });
    // });
// });

Route::get('/Edit_social_media/{id}', [ApiSocialMedia::class, 'edit'])->name('Edit_social_media');    
Route::post('/add_social_media', [ApiSocialMedia::class, 'store'])->name('add_social_media');    
Route::post('/update_social_media', [ApiSocialMedia::class, 'update'])->name('update_social_media');          
// Route::group(['middleware' => ['api']], function () {
    //routes here
    

// });

Route::post('CategoryActive', [ApiCategory::class, 'CategoryActive']);
Route::post('Category_Delete', [ApiCategory::class, 'delete']);


Route::post('/RateActive', [ApiExchangeRates::class, 'active']);
    Route::post('/RateDelete', [ApiExchangeRates::class, 'delete']);

Route::post('/serviceAdvantageActive', [ApiServiceAdvantages::class, 'active'])->name('serviceAdvantageActive');
Route::post('/serviceAdvantageDelete', [ApiServiceAdvantages::class, 'delete'])->name('serviceAdvantageDelete');

Route::post('/Job_Active', [ApiJobsAdmin::class, 'active'])->name('Job_Active');
Route::post('/Job-Delete', [ApiJobsAdmin::class, 'delete'])->name('Job-Delete');


Route::post('/News_Active', [ApNewsAdmin::class, 'active'])->name('News_Active');
Route::post('/News-Delete', [ApNewsAdmin::class, 'delete'])->name('News-Delete');




Route::post('/mediaActive', [ApiSocialMedia::class, 'active'])->name('mediaActive');
Route::post('/mediaDelete', [ApiSocialMedia::class, 'delete'])->name('mediaDelete');



    // Route::post('add_category', [CategoriesAdminController::class, 'store'])->name('add_category');
    Route::get('/usersAdminManage', [UsersAdminController::class, 'ShowUsersAdmin'])->name('usersAdminManage');
    Route::get('change-language/{locale}', [LocaleController::class, 'switch'])->name('change-language');
