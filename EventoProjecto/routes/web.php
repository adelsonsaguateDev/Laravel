<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventoController;

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

Route::get('/', [EventoController::class, 'index']);
Route::get('/eventos', [EventoController::class, 'evento']);

// Rotas agrupadas que exigem autenticação
Route::middleware(['auth'])->group(function () {
    Route::get('/events/create', [EventoController::class, 'create']);
    Route::get('/dashboard', [EventoController::class, 'dashboard']);
    Route::delete('/events/{id}', [EventoController::class, 'destroy']);
    Route::get('/events/edit/{id}', [EventoController::class, 'edit']);
    Route::put('/events/update/{id}', [EventoController::class, 'update']);
    Route::post('/events/join/{id}', [EventoController::class, 'joinEvent']);
    Route::delete('/events/leave/{id}', [EventoController::class, 'leaveEvent']);
});

Route::get('/events/{id}', [EventoController::class, 'show']);
Route::post('/events', [EventoController::class, 'store']);
