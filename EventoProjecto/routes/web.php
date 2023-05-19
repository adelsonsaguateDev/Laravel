<?php

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

use App\Http\Controllers\EventoController;

Route::get('/', [EventoController::class, 'index']);
Route::get('/eventos', [EventoController::class, 'evento']);
Route::get('/events/create', [EventoController::class, 'create'])->middleware('auth');
Route::get('/events/{id}', [EventoController::class, 'show']);
Route::post('/events', [EventoController::class, 'store']);
Route::get('/dashboard', [EventoController::class, 'dashboard'])->middleware('auth');
Route::delete('/events/{id}', [EventoController::class, 'destroy'])->middleware('auth');
Route::get('/events/edit/{id}', [EventoController::class, 'edit'])->middleware('auth');
Route::put('/events/update/{id}', [EventoController::class, 'update'])->middleware('auth');
Route::post('/events/join/{id}', [EventoController::class, 'joinEvent'])->middleware('auth');
Route::delete('/events/leave/{id}', [EventoController::class, 'leaveEvent'])->middleware('auth');
