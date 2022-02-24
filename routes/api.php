<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AttendanceControler;
use App\Http\Controllers\EmployeeControler;
use App\Http\Controllers\PermissionControler;


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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

/////////////////////
// Attendances Routes
/////////////////////

Route::get("/attendances", [AttendanceControler::class, 'index']);

Route::get("/attendances/{id}", [AttendanceControler::class, 'show']);

Route::post("/attendances", [AttendanceControler::class, 'store']);

Route::put("/attendances/{id}", [AttendanceControler::class, 'update']);

Route::delete("/attendances/{id}", [AttendanceControler::class, 'delete']);

////////////////////


/////////////////////
// Employee Routes
/////////////////////

Route::get("/employees/{id}", [EmployeeControler::class, 'show']);

Route::post("/employees", [EmployeeControler::class, 'store']);

/////////////////////


/////////////////////
// Permission Routes
/////////////////////

Route::get("/permissions", [EmployeeControler::class, 'index']);

/////////////////////
