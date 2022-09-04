<?php

use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExternalController;

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

Route::get('/', [ReportController::class, 'getData']);

Route::get('/news', [ExternalController::class, 'getRWData']);

Route::get('/rainmap', function () {
    return view('rainmap');
});

Route::post('/addReport', [ReportController::class, 'addReport']);
Route::get('/pending', [ReportController::class, 'viewPendingReport']);
Route::get('/pending/approve/{id}', [ReportController::class, 'approvePendingReport']);
Route::get('/pending/delete/{id}', [ReportController::class, 'deletePendingReport']);



Route::get('/loadDataToDB', [ExternalController::class, 'loadDataToDB']);

Route::get('/test000', function () {
    return view('reversegeo');
});

Route::get('/test001', function () {
    return view('locationlatlng');
});