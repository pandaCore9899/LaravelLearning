<?php

use App\Http\Controllers\LaravelLearning\MacroController;
use App\Http\Controllers\LaravelLearning\RequestController;
use App\Http\Controllers\LaravelLearning\ServiceContainerController;
use App\Http\Controllers\LaravelLearning\TestMixController;
use App\Http\Controllers\LaravelLearning\TestRedirectController;
use App\Http\Controllers\LaravelLearning\TestResponseController;
use App\Http\Controllers\LaravelLearning\ValidationController;
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

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::prefix('learning')->group(function () {
    Route::get('/service_container', [ServiceContainerController::class, 'index']);
});
Route::crud('learning/macro', MacroController::class);

Route::resource('events.invites', ServiceContainerController::class);

Route::prefix('test')->group(function () {
    Route::get("/mix", [TestMixController::class, 'index']);
    Route::get("/response", [TestResponseController::class, 'text']);
    Route::get("/responseWithCookies", [TestResponseController::class, 'withCookies']);
    Route::get("/responseWithCookieButResponse", [TestResponseController::class, 'withCookiesButResponse']);
    Route::get("/expiringCookiesEarly", [TestResponseController::class, 'expireCookiesEarly']);
    Route::get("/redirectGlobal", [TestRedirectController::class, 'global']);
    Route::get("/redirectWithInput", [TestRedirectController::class,'globalWithInput']);
    Route::get("/request", [RequestController::class, 'index']);
    Route::get('/validation', [ValidationController::class, 'index']);
    Route::post('/validation/import', [ValidationController::class, 'import']);

});
