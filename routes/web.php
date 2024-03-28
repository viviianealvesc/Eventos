<?php

use App\Http\Controllers\EventController;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', [EventController::class, 'index'])->name('/');
Route::get('/events/create', [EventController::class, 'create'])->name('events.create')->middleware('auth');
Route::post('/events', [EventController::class, 'store'])->name('events.store');
Route::get('/events/{id}', [EventController::class, 'show']);
Route::get('/dashboard', [EventController::class, 'dashboard'])->middleware('auth');
Route::delete('/events/{id}', [EventController::class, 'destroy'])->name('events.dashboard')->middleware('auth');
Route::get('/events/update/{id}', [EventController::class, 'edit'])->middleware('auth');
Route::put('/update/{id}', [EventController::class, 'update'])->middleware('auth');
Route::get('/events/join/{id}', [EventController::class, 'joinEvent'])->middleware('auth');
Route::delete('/events/leave/{id}', [EventController::class, 'leaveEvent'])->middleware('auth');










require __DIR__.'/auth.php';

