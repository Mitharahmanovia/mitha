<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\BiodataController;
use App\Http\Controllers\PortofolioController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [HomeController::class, 'index']);

Route::post('question/store', [QuestionController::class, 'store'])
    ->name('question.store');

Route::get('dashboard', [DashboardController::class, 'index'])
    ->name('dashboard');

Route::resource('pelanggan', PelangganController::class);

Route::resource('biodata', BiodataController::class)->except(['show']);

Route::resource('portofolio', PortofolioController::class)->except(['show']);

Route::patch('portofolio/{portofolio}/toggle', [PortofolioController::class, 'toggle'])
    ->name('portofolio.toggle');


Route::get('/karya', [PortofolioController::class, 'publicPage'])
    ->name('portofolio.public');
