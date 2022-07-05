<?php

use App\Http\Controllers\MovementController;
use App\Http\Controllers\SetController;
use App\Http\Controllers\SetGroupController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware(['auth', 'verified'])->group(function() {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
    Route::get('/movements', [MovementController::class, 'index'])->name('movements');
    Route::post('/set-groups', [SetGroupController::class, 'store']);
    Route::post('/movements', [MovementController::class, 'store']);
    Route::get('/movements/list', [MovementController::class, 'list']);
});

require __DIR__.'/auth.php';
