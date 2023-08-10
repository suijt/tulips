<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Country\CountryController;
use App\Http\Controllers\City\CityController;
use App\Http\Controllers\Population\PopulationController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    $countries = \App\Models\Modules\Country\Country::get();
    return view('welcome', compact('countries'));
})->name('home');

Auth::routes();

Route::middleware(['sanitize'])->group(function ($router) {
    //--------------------------------------------------------------------------
    // Private Routes
    //--------------------------------------------------------------------------
    $router->middleware('auth')->group(function ($router) {
        //--------------------------------------------------------------------------
        // Dashboard Routes
        //--------------------------------------------------------------------------
        $router->prefix('dashboard')->controller(DashboardController::class)->group(function ($router) {
            $router->get('{formType?}', 'index')->name('dashboard');
        });
        //--------------------------------------------------------------------------
        // Country Routes
        //--------------------------------------------------------------------------
        $router->prefix('country')->controller(CountryController::class)->group(function ($router) {
            $router->get('', 'index')->name('country.get');
            $router->post('submit', 'store')->name('country.store');
        });
        //--------------------------------------------------------------------------
        // City Routes
        //--------------------------------------------------------------------------
        $router->prefix('city')->controller(CityController::class)->group(function ($router) {
            $router->get('', 'index')->name('city.get');
            $router->post('submit', 'store')->name('city.store');
        });
        //--------------------------------------------------------------------------
        // Population Routes
        //--------------------------------------------------------------------------
        $router->prefix('population')->controller(PopulationController::class)->group(function ($router) {
            $router->get('', 'index')->name('population.get');
            $router->post('submit', 'store')->name('population.store');
        });
    });
});

