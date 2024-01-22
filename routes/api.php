<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReviewController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use Laravel\Passport\Http\Controllers\AccessTokenController;
use Laravel\Passport\Http\Controllers\AuthorizedAccessTokenController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();

});
Route::apiResource('/products', ProductController::class);


Route::resource('reviews', ReviewController::class);

// Additional routes for editing
Route::get('reviews/{review}/edit', [ReviewController::class, 'edit']);
Route::put('reviews/{review}', [ReviewController::class, 'update']);

Route::get('products/{product}/reviews', [ReviewController::class, 'index']);


//  Route::post('/token',[ReviewController::class,'ReviewController@show']);

Route::post('/token', [AccessTokenController::class, 'issueToken']);
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
