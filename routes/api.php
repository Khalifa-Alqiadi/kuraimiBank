<?php

use Illuminate\Http\Request;
use App\Http\Controllers\admin\CategoriesAdminController;
use App\Http\Controllers\API\ApiApplications;
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
use App\Http\Controllers\API\ApiUsers;
use App\Http\Controllers\API\ApiWebsiteInfo;
use App\Http\Controllers\API\ApiSocialMedia;
use App\Http\Controllers\API\ApiAuthenticate;
use App\Http\Controllers\API\ApiOurPartners;
use App\Http\Controllers\API\ApiPermissions;
use App\Http\Controllers\API\ApiServicesNumbers;
use App\Http\Controllers\API\ApiServicesSlider;
use App\Http\Controllers\API\ApiSuccessStories;
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

// Route::middleware('api')->group(function () {
// Route::group(['middleware' => 'auth'], function () {
// Route::group(['middleware' => ['role:admin']], function () {
Route::group(['middleware' => 'auth'], function () {
    Route::group(['middleware' => ['role:admin|admin_reports|admin_services']], function () {
        Route::get('/categories_admin', ['middleware' => ['permission:Add_Category|Edit_Category|Delete_Category|Status_Category'], 'uses' => 'App\Http\Controllers\API\ApiCategory@ShowCategoryAdmin'])->name('categories_admin');
        Route::get('/show-control-info', [ApiWebsiteInfo::class, 'show'])->name('show-control-info');
        Route::post('/add-websiteInfo', [ApiWebsiteInfo::class, 'store'])->name('add-websiteInfo');
        // Route::group(['middleware' => ['api']], function () {
        //routes here
        Route::get('showCategory', [ApiCategory::class, 'show']);
        // Route::get('showCountries', [ApiCountries::class, 'showCantry']);
        Route::get('/showCountries', ['middleware' => ['permission:manage_website'], 'uses' => 'App\Http\Controllers\API\ApiCountries@showCantry'])->name('showCountries');
        Route::get('/showCities', ['middleware' => ['permission:manage_website'], 'uses' => 'App\Http\Controllers\API\ApiCities@showCities'])->name('showCities');
        Route::get('/show-permission', ['middleware' => ['permission:manage_website'], 'uses' => 'App\Http\Controllers\API\ApiPermissions@show'])->name('show-permission');
        // Route::get('/show-permission', [ApiPermissions::class, 'show'])->name('show-permission');
        Route::post('/permission-active', [ApiPermissions::class, 'active'])->name('permission-active');


        Route::get('/show-jobs', ['middleware' => ['permission:manage_website|manage_services'], 'uses' => 'App\Http\Controllers\API\ApiJobsAdmin@showJobs'])->name('show-jobs');
        Route::get('/service-points', ['middleware' => ['permission:manage_website|manage_services'], 'uses' => 'App\Http\Controllers\API\ApiServicePoints@showServicePoints'])->name('service-points');
        Route::get('/Show-Services', ['middleware' => ['permission:manage_website|manage_services'], 'uses' => 'App\Http\Controllers\API\ApiServices@ShowServices'])->name('Show-Services');
        Route::get('/Show-exchange-rate', ['middleware' => ['permission:manage_website|manage_services'], 'uses' => 'App\Http\Controllers\API\ApiExchangeRates@showRate'])->name('Show-exchange-rate');
        // Route::get('/Show-exchange-rate', [ApiExchangeRates::class, 'showRate']);
        // Route::get('/Show-Services', [ApiServices::class, 'ShowServices'])->name('Show-Services');
        // Route::get('/show-jobs', [ApiJobsAdmin::class, 'showJobs'])->name('show-jobs');
        Route::get('/showJobs', [ApiJobsAdmin::class, 'show'])->name('showJobs');
        Route::get('/show_service-points', [ApiServicePoints::class, 'show']);
        // Route::get('/service-points', [ApiServicePoints::class, 'showServicePoints'])->name('service-points');
        // Route::get('/showCities', [ApiCities::class, 'showCities'])->name('showCities');
        Route::get('/show-social-media', [ApiSocialMedia::class, 'showSocialMedia'])->name('show-social-media');
        Route::get('countriesAdmin', [ApiCountries::class, 'countriesAdmin'])->name('countriesAdmin');

        Route::get('/Api-Cities', [ApiCities::class, 'show']);
        Route::get('/showNews', [ApNewsAdmin::class, 'show_news'])->name('showNews');

        Route::get('/show-exchange-rate', [ApiExchangeRates::class, 'show']);

        Route::get('/Show-exchange-rate', [ApiExchangeRates::class, 'showRate']);


        Route::get('/show-news', ['middleware' => ['permission:manage_website|manage_reports'], 'uses' => 'App\Http\Controllers\API\ApNewsAdmin@show'])->name('show-news');

        Route::get('/show-social_media', ['middleware' => ['permission:manage_website|manage_reports'], 'uses' => 'App\Http\Controllers\API\ApiSocialMedia@show'])->name('show-social_media');
        Route::get('/our_partners', ['middleware' => ['permission:manage_website|manage_reports'], 'uses' => 'App\Http\Controllers\API\ApiOurPartners@ShowPartners'])->name('our_partners');
        Route::get('/financial-reports', ['middleware' => ['permission:manage_website|manage_reports'], 'uses' => 'App\Http\Controllers\API\ApiFinancialReports@show'])->name('financial-reports');
        // Route::get('/financial-reports', [ApiFinancialReports::class, 'show'])->name('financial-reports');
        // Route::get('/our_partners', [ApiOurPartners::class, 'ShowPartners'])->name('our_partners');
        // Route::get('/show-control-info', [ApiWebsiteInfo::class, 'show'])->name('show-control-info');
        // Route::get('/show-news', [ApNewsAdmin::class, 'show'])->name('show-news');

        // Route::get('/show-social_media', [ApiSocialMedia::class, 'show'])->name('show-social_media');

        Route::get('/homeAdmin', [CategoriesAdminController::class, 'homeAdmin'])->name('homeAdmin');

        Route::post('/add-websiteInfo', [ApiWebsiteInfo::class, 'store'])->name('add-websiteInfo');
        Route::post('/Website_Active', [ApiWebsiteInfo::class, 'active'])->name('Website_Active');
        Route::post('/Website_Delete', [ApiWebsiteInfo::class, 'delete'])->name('Website_Delete');
        Route::get('/show-info/{id}', [ApiWebsiteInfo::class, 'showInfo']);
        Route::post('/update-info', [ApiWebsiteInfo::class, 'update'])->name('update-info');


        Route::post('/add_service', [ApiServices::class, 'store']);
        Route::post('/update_service', [ApiServices::class, 'update']);
        Route::post('/serviceActive', [ApiServices::class, 'active']);
        Route::post('/serviceDelete', [ApiServices::class, 'delete']);

        Route::get('/service-advantage/{id}', [ApiServiceAdvantages::class, 'show'])->name('service-advantage.show');
        Route::post('/add_service_advantage', [ApiServiceAdvantages::class, 'store'])->name('add_service_advantage');
        Route::post('/update_service_advantage', [ApiServiceAdvantages::class, 'update'])->name('update_service_advantage');
        Route::post('/serviceAdvantageActive', [ApiServiceAdvantages::class, 'active'])->name('serviceAdvantageActive');
        Route::post('/serviceAdvantageDelete', [ApiServiceAdvantages::class, 'delete'])->name('serviceAdvantageDelete');

        Route::post('/add_service_slider', [ApiServicesSlider::class, 'store'])->name('add_service_slider');
        Route::post('/update_service_slider', [ApiServicesSlider::class, 'update'])->name('update_service_slider');
        Route::post('/service_Slider_Active', [ApiServicesSlider::class, 'active'])->name('service_Slider_Active');
        Route::post('/service_slider_delete', [ApiServicesSlider::class, 'delete'])->name('service_slider_delete');


        Route::post('/add_our_partaner', [ApiOurPartners::class, 'store'])->name('add_our_partaner');
        Route::post('/update_our_partaner', [ApiOurPartners::class, 'update'])->name('add_our_partaner');
        Route::post('/our-partaner-active', [ApiOurPartners::class, 'active'])->name('our-partaner-active');
        Route::post('/our-partaner-delete', [ApiOurPartners::class, 'delete'])->name('our-partaner-delete');





        Route::post('/add_financial_report', [ApiFinancialReports::class, 'store'])->name('add_financial_report');
        Route::post('/update_our_partaner', [ApiFinancialReports::class, 'update'])->name('update_our_partaner');
        Route::post('/financial-report-active', [ApiFinancialReports::class, 'active'])->name('financial-report-active');
        Route::post('/financial-report-delete', [ApiFinancialReports::class, 'delete'])->name('financial-report-delete');
        Route::get('/usersAdminManage', [ApiUsers::class, 'show'])->name('usersAdminManage');
        Route::post('/update_user', [ApiUsers::class, 'update'])->name('update_user');
        Route::post('/edit-permission', [ApiUsers::class, 'updatePermission'])->name('edit-permission');
        Route::post('/delete-permission', [ApiUsers::class, 'delete'])->name('delete-permission');



        Route::post('add_category', [ApiCategory::class, 'store']);
        Route::get('/edit_category/{id}', [ApiCategory::class, 'editCategory'])->name('edit_category');
        Route::post('UpdateCategory', [ApiCategory::class, 'UpdateCategory']);

        Route::post('add_country', [ApiCountries::class, 'addCountry']);

        Route::get('/edit_country/{id}', [ApiCountries::class, 'EditCantry']);
        Route::post('/UpdateCountry', [ApiCountries::class, 'UpdateCountry']);
        Route::post('/CountryActive', [ApiCountries::class, 'ActiveCountry']);
        Route::post('/CountryDelete', [ApiCountries::class, 'DeleteCountry']);
        Route::post('/add_City', [ApiCities::class, 'store']);


        Route::get('/Edit_City/{id}', [ApiCities::class, 'edit']);
        Route::post('/UpdateCity', [ApiCities::class, 'update']);
        Route::post('/CityActive', [ApiCities::class, 'active']);
        Route::post('/CityDelete', [ApiCities::class, 'delete']);



        Route::post('/add_service_point', [ApiServicePoints::class, 'store']);
        Route::get('/Edit_Service_Point/{id}', [ApiServicePoints::class, 'edit']);
        Route::post('/UpdateServicePoint', [ApiServicePoints::class, 'update']);
        Route::post('/ServicePointActive', [ApiServicePoints::class, 'active']);
        Route::post('/ServicePointDelete', [ApiServicePoints::class, 'delete']);

        Route::get('/Edit_Service/{id}', [ApiServices::class, 'edit']);


        Route::post('/add_exchange_rate', [ApiExchangeRates::class, 'store']);

        Route::get('/edit_rate/{id}', [ApiExchangeRates::class, 'edit']);
        Route::post('/UpdateRate', [ApiExchangeRates::class, 'update']);

        Route::get('/Edit_Service_Adv/{id}', [ApiServiceAdvantages::class, 'edit'])->name('Edit_Service_Adv');


        Route::post('/add-Job', [ApiJobsAdmin::class, 'store'])->name('add-Job');
        Route::get('/Edit_Job/{id}', [ApiJobsAdmin::class, 'edit'])->name('Edit_Job');
        Route::post('/update-Job', [ApiJobsAdmin::class, 'update'])->name('update-Job');



        Route::post('/add-news', [ApNewsAdmin::class, 'store'])->name('add-news');
        Route::post('/update-News', [ApNewsAdmin::class, 'update'])->name('update-News');
        Route::get('/Edit_News/{id}', [ApNewsAdmin::class, 'edit']);







        Route::get('/showAxios', [ApiCities::class, 'shshowAxiosow']);

        Route::get('/Edit_social_media/{id}', [ApiSocialMedia::class, 'edit'])->name('Edit_social_media');
        Route::post('/add_social_media', [ApiSocialMedia::class, 'store'])->name('add_social_media');
        Route::post('/update_social_media', [ApiSocialMedia::class, 'update'])->name('update_social_media');

        Route::post('CategoryActive', [ApiCategory::class, 'CategoryActive']);
        Route::post('Category_Delete', [ApiCategory::class, 'delete']);


        Route::post('/RateActive', [ApiExchangeRates::class, 'active']);
        Route::post('/RateDelete', [ApiExchangeRates::class, 'delete']);

        Route::post('/Job_Active', [ApiJobsAdmin::class, 'active'])->name('Job_Active');
        Route::post('/Job-Delete', [ApiJobsAdmin::class, 'delete'])->name('Job-Delete');


        Route::post('/News_Active', [ApNewsAdmin::class, 'active'])->name('News_Active');
        Route::post('/News-Delete', [ApNewsAdmin::class, 'delete'])->name('News-Delete');


        Route::post('/mediaActive', [ApiSocialMedia::class, 'active'])->name('mediaActive');
        Route::post('/mediaDelete', [ApiSocialMedia::class, 'delete'])->name('mediaDelete');

        Route::post('/add_partner', [ApiOurPartners::class, 'store'])->name('add_partner');

        Route::post('/add-role', [ApiPermissions::class, 'store'])->name('add-role');

        Route::get('/admin-applications', [ApiApplications::class, 'showApplications'])->name('admin-applications');
        Route::post('/add_application', [ApiApplications::class, 'store'])->name('add_application');
        Route::get('/Edit_Application/{id}', [ApiApplications::class, 'edit'])->name('Edit_Application');
        Route::post('/update_application', [ApiApplications::class, 'update'])->name('update_application');
        Route::post('/applicationActive', [ApiApplications::class, 'active'])->name('applicationActive');
        Route::post('/applicationDelete', [ApiApplications::class, 'delete'])->name('applicationDelete');


        Route::get('/services-numbers', [ApiServicesNumbers::class, 'showData'])->name('services-numbers');
        Route::get('/showServicesNumbers', [ApiServicesNumbers::class, 'show'])->name('showServicesNumbers');
        Route::post('/add_service_number', [ApiServicesNumbers::class, 'store'])->name('add_service_number');
        Route::get('/edit_service_number/{id}', [ApiServicesNumbers::class, 'edit'])->name('edit_service_number');
        Route::post('/update_service_number', [ApiServicesNumbers::class, 'update'])->name('update_service_number');
        Route::post('/active_service_number', [ApiServicesNumbers::class, 'active'])->name('active_service_number');
        Route::post('/delete_service_number', [ApiServicesNumbers::class, 'delete'])->name('delete_service_number');


        Route::get('/success-stories-admin', [ApiSuccessStories::class, 'show'])->name('success-stories-admin');
        Route::get('/Edit_Success_stories/{id}', [ApiSuccessStories::class, 'edit'])->name('Edit_Success_stories');
        Route::post('/add_success_stories', [ApiSuccessStories::class, 'store'])->name('add_success_stories');
        Route::post('/update_success_stories', [ApiSuccessStories::class, 'update'])->name('update_success_stories');
        Route::post('/successStoriesActive', [ApiSuccessStories::class, 'active'])->name('successStoriesActive');
        Route::post('/successStoriesDelete', [ApiSuccessStories::class, 'delete'])->name('successStoriesDelete');
    });
});
Route::get('/login', [ApiAuthenticate::class, 'show'])->name('login');
Route::get('sign_in', [ApiAuthenticate::class, 'sign_in']);
Route::post('login-save', [ApiAuthenticate::class, 'login_save'])->name('login-save');
// });


// Route::post('add_category', [CategoriesAdminController::class, 'store'])->name('add_category');
