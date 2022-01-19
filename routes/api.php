<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Helpers\FunctionHelpers;

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

Route::get('/', function () {
    return response()->json(
        FunctionHelpers::resOK("Laravel ".Application::VERSION." (PHP ".PHP_VERSION.")"), 200);
});

$router->group(['middleware' => ['only.json']], function () use ($router) {
    Route::post('/sign_up', [App\Http\Controllers\AuthController::class, 'register'])->name('sign_up');
    Route::post('/sign_in', [App\Http\Controllers\AuthController::class, 'login'])->name('sign_in');
});

$router->group(['middleware' => ['jwt.verify', 'jwt.auth']], function () use ($router) {
    Route::get('/user', [App\Http\Controllers\AuthController::class, 'getUser'])->name('user');

    Route::get('/data_indonesi', [App\Http\Controllers\FetchCoronaController::class, 'dataIndonesi'])->name('data_indonesi');
    Route::get('/data_indonesi_empty', [App\Http\Controllers\FetchCoronaController::class, 'dataIndonesiEmpty'])->name('data_indonesi_empty');
    Route::get('/data_global', [App\Http\Controllers\FetchCoronaController::class, 'dataGlobal'])->name('data_global');
    Route::get('/data_global_empty', [App\Http\Controllers\FetchCoronaController::class, 'dataGlobalEmpty'])->name('data_global_empty');
    Route::get('/data_provinces', [App\Http\Controllers\FetchCoronaController::class, 'dataProvinces'])->name('data_provinces');
    Route::get('/data_provinces_empty', [App\Http\Controllers\FetchCoronaController::class, 'dataProvincesEmpty'])->name('data_provinces_empty');
    Route::get('/data_nations', [App\Http\Controllers\FetchCoronaController::class, 'dataNations'])->name('data_nations');
    Route::get('/data_nations_empty', [App\Http\Controllers\FetchCoronaController::class, 'dataNationsEmpty'])->name('data_nations_empty');
    Route::get('/all_user', [App\Http\Controllers\UserController::class, 'all'])->name('all_user');

    Route::get('/edit_user/{id}', [App\Http\Controllers\UserController::class, 'edit'])->name('edit_user');
    Route::delete('/delete_user/{id}', [App\Http\Controllers\UserController::class, 'destroy'])->name('delete_user');

    $router->group(['middleware' => ['only.json']], function () use ($router) {
        Route::post('/store_user', [App\Http\Controllers\UserController::class, 'store'])->name('store_user');
        Route::put('/update_user', [App\Http\Controllers\UserController::class, 'update'])->name('update_user');

        Route::post('/naik_user', [App\Http\Controllers\UserController::class, 'naikUser'])->name('naik_user');
        Route::post('/turun_user', [App\Http\Controllers\UserController::class, 'turunUser'])->name('turun_user');
    });
});