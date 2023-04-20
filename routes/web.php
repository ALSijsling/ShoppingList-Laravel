<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GroceriesController;

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

// TODO: oefening: gebruik eens een resource-controller om regels code te besparen (zie docunentatie)
Route::get('/groceries', [GroceriesController::class, 'index'])->name('groceries.index');
Route::get('/groceries/create', [GroceriesController::class, 'create'])->name('groceries.create');
Route::post('/groceries', [GroceriesController::class, 'store'])->name('groceries.store');
Route::get('/groceries/{grocery}/edit', [GroceriesController::class, 'edit'])->name('groceries.edit');
Route::match(['put', 'patch'], '/groceries/{grocery}', [GroceriesController::class, 'update'])->name('groceries.update');
Route::delete('/groceries/{grocery}', [GroceriesController::class, 'destroy'])->name('groceries.destroy');

Route::redirect('/', '/groceries');
