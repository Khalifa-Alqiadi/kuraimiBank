<?php

namespace App\Providers;

use App\Models\Service;
use App\Models\SuccessStories;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to the "home" route for your application.
     *
     * Typically, users are redirected here after authentication.
     *
     * @var string
     */
    public const HOME = '/home';

    /**
     * Define your route model bindings, pattern filters, and other route configuration.
     *
     * @return void
     */
    public function boot()
    {

        $this->configureRateLimiting();
        $locale = app()->getLocale();
        $this->routes(function () use ($locale) {
            Route::middleware('api')
                ->prefix('api')
                ->namespace($this->namespace)
                ->group(base_path('routes/api.php'));

            Route::middleware('web')
                ->namespace($this->namespace)
                ->group(base_path('routes/web.php'));
            Route::middleware('api')->prefix($locale)
                ->namespace($this->namespace)
                ->group(base_path('routes/api.php'));

            Route::bind('name', function ($name) use ($locale) {
                return $this->resolveModel(Service::class, $name, $locale, 'name');
            });
            Route::bind('title', function ($name) use ($locale) {
                return $this->resolveModel(SuccessStories::class, $name, $locale, 'title');
            });
        });
    }

    /**
     * Configure the rate limiters for the application.
     *
     * @return void
     */
    protected function configureRateLimiting()
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });
    }

    protected function resolveModel($modelClass, $name, $locale, $select)
    {
        $model = $modelClass::firstWhere($select . '->' . $locale, $name);

        if (is_null($model)) {
            foreach (config('locales.languages') as $key => $val) {
                $modelInLocale = $modelClass::firstWhere($select . '->' . $key, $name);
                if ($modelInLocale) {
                    if ($modelInLocale->name) {
                        $newRoute = str_replace($name, $modelInLocale->name, urldecode(request()->url()));
                        return redirect()->to($newRoute)->send();
                    } elseif ($modelInLocale->title) {
                        $newRoute = str_replace($name, $modelInLocale->title, urldecode(request()->url()));
                        return redirect()->to($newRoute)->send();
                    }
                }
            }
            abort(404);
        }
        return $model;
    }
}
