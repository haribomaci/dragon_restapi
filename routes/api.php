<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DragonController;
use App\Http\Controllers\StrengthController;

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



Route::post("/register", [AuthController::class, "signUp"]);
Route::post("/login", [AuthController::class, "signIn"]);

Route::get("/index",[DragonController::class,"index"]);

Route::post("/dragon-store",[DragonController::class,"store"]);
Route::post("/strength-store",[StrengthController::class,"store"]);

Route::get("/show/{id}",[DragonController::class,"show"]);

Route::put("/strength/{id}",[StrengthController::class,"update"]);
Route::put("/dragon/{id}",[DragonController::class,"update"]);

Route::post("/strength-delete/{id}",[StrengthController::class,"destroy"]);
Route::delete("/strength-delete/{id}",[DragonController::class,"destroy"]);