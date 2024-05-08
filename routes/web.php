<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::prefix('dashboard')->group(function () {
    Route::controller(DashboardController::class)->group(function () {
        Route::get('/', 'index')->name('dashboard');
        Route::get('heatmap', 'heatmap')->name('heatmap');
        Route::get('disaster-types', 'types')->name('disaster.types');
        Route::post('add-type', 'addtype')->name('add.type');
        Route::get('reports', 'reports')->name('reports');
        Route::get('notifications', 'notifications')->name('notifications');
        Route::post('notify', 'notifify')->name('notify');
    });
});

Route::get('data-config', function () {
    Artisan::call('migrate');
    Artisan::call('db:seed');
    Artisan::call('optimize:clear');
    return Artisan::output();
});
