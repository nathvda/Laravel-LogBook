<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EntryController;
use App\Http\Controllers\LocationController;

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
Route::get('/', [EntryController::class, 'index']);

Route::get('/entry/create', [EntryController::class, 'create']);

Route::get('/entry/edit/{entry:id}', [EntryController::class, 'edit']);

Route::patch('/entry/edit/{entry:id}', [EntryController::class, 'update']);

Route::post('/entry/create', [EntryController::class, 'store']);

Route::delete('/entry/delete/{entry:id}', [EntryController::class, 'destroy']);

/**Location related routes */
Route::get('/location/create', [LocationController::class, 'create']);

Route::post('/location/create', [LocationController::class, 'store']);

Route::get('location/show/{locations}', [LocationController::class, 'show']);