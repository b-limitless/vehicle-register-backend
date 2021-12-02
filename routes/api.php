<?php
use App\Http\Controllers\BrandController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
// CRUD Operation route for  vehicle
// Route::post('/vehicle', [VehicleController::class, 'register']);
// Route::get('/vehicle', [VehicleController::class, 'login']);
// Route::put('/vehicle', [VehicleController::class, 'login']);
// Route::delete('/vehicle', [VehicleController::class, 'login']);

// // CRUD Operation route for Brands
// Route::post('/brand', [BrandController::class, 'login']);
Route::get('/brand', [BrandController::class, 'index']);
// Route::put('/brand', [BrandController::class, 'login']);
// Route::delete('/brand', [BrandController::class, 'login']);

// // CRUD Operation route for Models
// Route::post('/model', [ModelController::class, 'login']);
// Route::get('/model', [ModelController::class, 'login']);
// Route::put('/model', [ModelController::class, 'login']);
// Route::delete('/model', [ModelController::class, 'login']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
