<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\PricingController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\StudyCaseController;
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

// Route::get('/', function () {
//     return view('welcome');
// });



Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'index');
});

Route::group(
    [
        'middleware' => 'auth',
        'prefix' => 'dashboard',
        'controller' => DashboardController::class,
    ],
    function () {
        Route::get('/', 'index');
    }
);

Route::group(
    [
        'middleware' => 'auth',
        'prefix' => 'services',
        'controller' => ServicesController::class,
    ],
    function () {
        Route::get('/', 'index');
        Route::get('/create', 'form');
        Route::get('/{id}', 'show');
        Route::post('/store', 'store');
        Route::put('/{id}/update', 'update');
        Route::delete('{id}/delete', 'delete');
    }
);

Route::group(
    [
        'middleware'    => 'auth',
        'prefix'        => 'study-case',
        'controller'    => StudyCaseController::class,
    ],
    function () {
        Route::get('/', 'index');
        Route::get('/create', 'form');
        Route::get('/{id}', 'show');
        Route::post('/store', 'store');
        Route::put('/{id}/update', 'update');
        Route::delete('/{id}/delete', 'delete');
    }
);

Route::group([
    'middleware'    => 'auth',
    'prefix'        => 'portfolio',
    'controller'    => PortfolioController::class,
], function () {
    Route::get('/', 'index');
    Route::get('/create', 'form');
    Route::get('/{id}', 'show');
    Route::post('/store', 'store');
    Route::put('/{id}/update', 'update');
    Route::delete('/{id}/delete', 'delete');
});

Route::group([
    'middleware'    => 'auth',
    'prefix'        => 'pricing',
    'controller'    => PricingController::class,
], function () {
    Route::get('/', 'index');
    Route::get('/create', 'form');
    Route::get('/{id}', 'show');
    Route::post('/store', 'store');
    Route::put('/{id}/update', 'update');
    Route::delete('/{id}/delete', 'delete');
});

Route::group([
    'middleware'     => 'auth',
    'prefix'         => 'client',
    'controller'     => ClientController::class,
], function () {
    Route::get('/', 'index');
    Route::get('/create', 'form');
    Route::get('/{id}', 'show');
    Route::post('/store', 'store');
    Route::put('/{id}/update', 'update');
    Route::delete('/{id}/delete', 'delete');
});


// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');



require __DIR__ . '/auth.php';
