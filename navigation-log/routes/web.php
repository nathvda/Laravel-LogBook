<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EntryController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SessionController;

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

/** Entry related routes */
Route::get('/', function() {
    return view('homepage', ['dropdownLocations' => App\Models\Location::get()]);
})->middleware('guest');

Route::get('/home', [EntryController::class, 'index'])->middleware('auth');

Route::get('/entry/create', [EntryController::class, 'create']);

Route::get('/entry/edit/{entry:id}', [EntryController::class, 'edit']);

Route::patch('/entry/edit/{entry:id}', [EntryController::class, 'update']);

Route::post('/entry/create', [EntryController::class, 'store']);

Route::delete('/entry/delete/{entry:id}', [EntryController::class, 'destroy']);

/**Location related routes */
Route::get('/location/create', [LocationController::class, 'create']);

Route::post('/location/create', [LocationController::class, 'store']);

Route::get('location/show/{locations}', [LocationController::class, 'show']);

Route::get('user/show/{user}', [UserController::class, 'show'])->middleware('auth');

Route::get('register', [UserController::class, 'create'])->middleware('guest');

Route::post('register', [UserController::class, 'store'])->middleware('guest');

Route::post('logout', [SessionController::class, 'destroy'])->middleware('auth');

Route::get('login', [SessionController::class, 'create'])->middleware('guest');

Route::post('login', [SessionController::class, 'store']);