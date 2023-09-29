<?php

use App\constants\RouteConstants;
use App\Http\Controllers\TaskController;
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

Route::controller(TaskController::class)
    ->prefix("tasks")
    ->middleware(["throttle:" . RouteConstants::RATE_LIMIT_NAME_TASK])
    ->group(function () {
        Route::get("tasks", "index")->name(RouteConstants::ROUTE_NAME_LIST_TASKS);
        Route::get("tasks/{task}", "show")->name(RouteConstants::ROUTE_NAME_VIEW_TASK);
        Route::post("tasks", "create")->name(RouteConstants::ROUTE_NAME_CREATE_TASK);
        Route::patch("tasks/{task}", "edit")->name(RouteConstants::ROUTE_NAME_UPDATE_TASK);
        Route::delete("tasks/{task}", "destroy")->name(RouteConstants::ROUTE_NAME_DELETE_TASK);
    })//    ->whereAlphaNumeric("id")
;


// todo: use later
//Route::apiResource("tasks", TaskController::class);


// todo: implement later
//Route::fallback(function () {
//    // ...
//});
