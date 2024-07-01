<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainTableController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\console_core\core;
use App\Providers\FtpServiceProvider;
/*
|--------------------------------------------------------------------------
| Web Routes //////// Hi, my name is linkol13 (aka creator of this project), DM im discord, if you have ideas for project!
|                                                                            Discord: linkol13#0
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::view('/','login00');
Route::post('/post',[LoginController::class,'post']);

Route::prefix('msap')->middleware('RequestAuth')->group(function () {

    Route::post('/login', [LoginController::class, 'index']);

    Route::get('/change_config', [MainTableController::class, 'change_server']);
    Route::get('/change', [MainTableController::class, 's']);
    Route::get('/console', [core\CoreController::class, 'index']);
    Route::get('/mainpage', [MainTableController::class, 'index']);
    Route::get('/new_table_view', [MainTableController::class, 'new_table_view']);
    Route::get('/delete_server', [MainTableController::class, 'delete_view']);


    Route::post('/add', [MainTableController::class, 'add']);
    Route::post('/bind', [core\CoreController::class, 'bind']);
    Route::post('/change_cc', [MainTableController::class, 'change_server_cc']);
    Route::post('/connect', [FtpServiceProvider::class, 'register']);
    Route::post('/delete', [MainTableController::class, 'delete']);

    Route::post('/log', [core\CoreController::class, 'log']);


    Route::view('/','login');
    Route::view('/donate', 'donate');
    Route::view('/settings', 'maintable_form');
    Route::view('/change_server', 'maintable_form_change');
    Route::view('/add_new_server', 'maintable_form_add');

});


