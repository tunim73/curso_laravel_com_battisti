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
  Route::get('/events/create', "create")->middleware('auth');
  Route::get('/dashboard', "dashboard")->name('dashboard')->middleware('auth');
  Route::get('/events/{id}', "show");
  Route::post('/events', 'store');
  Route::delete('/events/{id}', 'destroy');
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
