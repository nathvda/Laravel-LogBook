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

Route::get('/home', [EntryController::class, 'index'])->middleware('auth')->middleware('auth');

Route::get('/entry/create', [EntryController::class, 'create'])->middleware('auth');

Route::get('/entry/edit/{entry:id}', [EntryController::class, 'edit'])->middleware('auth');

Route::patch('/entry/edit/{entry:id}', [EntryController::class, 'update'])->middleware('auth');

Route::post('/entry/create', [EntryController::class, 'store'])->middleware('auth');

Route::delete('/entry/delete/{entry:id}', [EntryController::class, 'destroy'])->middleware('auth');

/**Location related routes */
Route::get('/location/create', [LocationController::class, 'create'])->middleware('auth');

Route::post('/location/create', [LocationController::class, 'store'])->middleware('auth');

Route::get('location/show/{locations}', [LocationController::class, 'show'])->middleware('auth');

Route::get('user/show/{user}', [UserController::class, 'show'])->middleware('auth');

Route::get('viewprofile/{user}', [UserController::class, 'index'])->middleware('auth');

Route::get('edit/{user}', [UserController::class, 'edit'])->middleware('auth');

Route::patch('edit/{user}', [UserController::class, 'update'])->middleware('auth');

Route::get('register', [UserController::class, 'create'])->middleware('guest');

Route::post('register', [UserController::class, 'store'])->middleware('guest');

Route::post('logout', [SessionController::class, 'destroy'])->middleware('auth');

Route::get('login', [SessionController::class, 'create'])->middleware('guest');

Route::post('login', [SessionController::class, 'store'])->middleware('guest');
