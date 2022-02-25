<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AttendanceControler;
use App\Http\Controllers\EmployeeControler;
use App\Http\Controllers\PermissionControler;
use App\Http\Controllers\AuthenticationController;
use Illuminate\Support\Facades\Auth;

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

/* Rota utilizada quando uma rota é acessada com token invalido */
Route::get('unauthorized', function(){
    return response('{"message": "Unauthorized."}', 403);
})->name("unauthorized");

/////////////////////
// Authentication Routes
/////////////////////
Route::post('login', [AuthenticationController::class, 'login']);

/* Rotas que só podem ser acessadas pelos administradores.*/
Route::middleware('authorization:sanctum')->group(function(){
    /////////////////////
    // Attendance Routes
    /////////////////////
    Route::get("/attendances", [AttendanceControler::class, 'index']);
    Route::get("/attendances/{id}", [AttendanceControler::class, 'show']);
    Route::post("/attendances", [AttendanceControler::class, 'store']);
    Route::put("/attendances/{id}", [AttendanceControler::class, 'update']);
    Route::delete("/attendances/{id}", [AttendanceControler::class, 'delete']);
    
    /////////////////////
    // Employees Routes
    /////////////////////
    Route::post("/employees", [EmployeeControler::class, 'store']);
});

/* Rotas que podem ser acessadas por usuários logados. */
Route::middleware('auth2:sanctum')->group(function(){
    /////////////////////
    // Authentication Routes
    /////////////////////
    Route::post('logout', [AuthenticationController::class, 'logout']);
    
    /////////////////////
    // Permission Routes
    /////////////////////
    Route::get("/permissions", [PermissionControler::class, 'index']);

    /////////////////////
    // Attendance Routes
    /////////////////////
    Route::post("/attendances/checkin", [AttendanceControler::class, 'store']);

    /////////////////////
    // Employees Routes
    /////////////////////
    Route::get("/employees/{id}", [EmployeeControler::class, 'show']);
});
