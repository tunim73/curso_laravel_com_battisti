<?php

use App\Http\Controllers\EventController;
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

Route::controller(EventController::class)->group(function () {
  Route::get('/', "index");
  Route::get('/dashboard', "dashboard")->name('dashboard')->middleware('auth');
  Route::get('/events/create', "create")->middleware('auth');
  Route::get('/events/{id}', "show");
  Route::get('/events/edit/{id}', "edit")->middleware('auth');
  Route::post('/events', 'store')->middleware('auth');
  Route::put('/events/{id}', 'update')->middleware('auth');
  Route::delete('/events/{id}', 'destroy')->middleware('auth');
  Route::post('/events/join/{id}', 'joinEvent')->middleware('auth');

});


/* Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
}); */
