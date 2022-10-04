<?php

use App\Http\Controllers\AdminInputerController;
use App\Http\Controllers\AdminTeknisiController;
use App\Http\Controllers\CanvaserController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HelpdeskController;
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



Route::view('login', 'login');
Route::post('login', [LoginController::class, 'login'])->name('login');
Route::get('logout', [LoginController::class, 'logout'])->name('logout');

Route::group(['middleware' => 'user'], function() {
    Route::get('/', function () {
        return view('welcome');
    });

    Route::resource('canvasser', CanvaserController::class);
    Route::resource('inputer', AdminInputerController::class);
    Route::resource('teknisi', AdminTeknisiController::class);
    Route::resource('manager', ManagerController::class);
    Route::resource('history', HistoryController::class);
    Route::resource('helpdesk', HelpdeskController::class);

    Route::get('approve/data/{data}', [AdminInputerController::class, 'approve_data']);
    Route::get('cancel/data/{data}', [AdminInputerController::class, 'cancel_data']);
    Route::get('home', [HomeController::class, 'index'])->name('home');
    
    Route::get('data/report/input', [HomeController::class, 'data_report_input']);
    Route::post('filter/data/input', [HomeController::class, 'filter_report_input']);

    Route::get('data/report/ps', [HomeController::class, 'data_report_ps']);
    Route::post('filter/data/ps', [HomeController::class, 'filter_report_ps']);

    

    Route::post('data/filter/canvasser', [CanvaserController::class, 'filter_data']);
    Route::post('data/filter/teknisi', [AdminTeknisiController::class, 'filter_data']);

    Route::get('kirim/teknisi/{data}', [CanvaserController::class, 'kirim_teknisi'])->name('hehehe');

    Route::get('data/report/monitor', [HomeController::class, 'data_report_monitor']);
    Route::post('filter/data/monitoring', [HomeController::class, 'filter_report_monitoring']);


});
