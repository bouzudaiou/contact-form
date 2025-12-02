<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;

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

Route::get('/', [ContactController::class, 'index']);
Route::post('/contacts/confirm', [ContactController::class, 'confirm']);
Route::post('/contacts/thanks', [ContactController::class, 'thanks']);
Route::get('/contacts', [ContactController::class, 'list']);
Route::get('/contacts/{id}', [ContactController::class, 'show']);
Route::get('/contacts/{id}/edit', [ContactController::class, 'edit']);
Route::patch('/contacts/{id}', [ContactController::class, 'update']);
Route::get('/contacts/{id}/delete', [ContactController::class, 'delete']);
Route::delete('/contacts/{id}', [ContactController::class, 'destroy']);