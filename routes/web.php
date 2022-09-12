<?php

use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExternalController;
use App\Http\Controllers\TwiController;
use Illuminate\Support\Facades\Auth;

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

Route::get('/disasterList', [ReportController::class, 'getDataNR']);

Route::get('/disasterTweets', [TwiController::class, 'getTweets']);


Route::get('/rainmap', function () {
	return view('rainmap');
});

Route::post('/addReport', [ReportController::class, 'addReport']);
Route::get('/pending/approve/{id}', [ReportController::class, 'approvePendingReport']);
Route::get('/pending/reject/{id}', [ReportController::class, 'rejectPendingReport']);

// Auth::routes();

Auth::routes(['register'=>false, 'reset'=>false,'verify'=>false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/loadDataToDB', [ExternalController::class, 'loadDataToDB']);

Route::get('/test000', function () {
	return view('examples/reversegeo');
});

Route::get('/test001', function () {
	return view('examples/locationlatlng');
});