<?php

use App\Http\Controllers\HavapeymaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();

});
Route::post('havapeyma/store',[HavapeymaController::class,'store']);
Route::get('havapeyma/{havapeyma}/show',[HavapeymaController::class,'show']);
Route::put('havapeyma/{havapeyma}/update',[HavapeymaController::class,'update']);
Route::delete('havapeyma/{havapeyma}/delete',[HavapeymaController::class,'delete']);
Route::post('pilot/store',[HavapeymaController::class,'store']);
Route::get('pilot/{pilot}/show',[HavapeymaController::class,'show']);
Route::put('pilot/{pilot}/update',[HavapeymaController::class,'update']);
Route::delete('pilot/{pilot}/delete',[HavapeymaController::class,'delete']);
Route::get('pilot/{pilot}/token',[HavapeymaController::class,'token']);

