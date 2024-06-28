<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TasksController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProjectsController;
use App\Http\Controllers\ProjectCommentController;
use App\Http\Controllers\TaskCommentController;
use App\Http\Controllers\Admin\GivePermissionController;



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
Route::get('/task/getAll',[TasksController::class,'getAll']);
Route::post('/task/add',[TasksController::class,'store']);
Route::post('/task/show/{id}',[TasksController::class,'show']);
Route::post('/task/update',[TasksController::class,'update']);
Route::delete('/task/destroy',[TasksController::class,'destroy']);
/*************************************************/
Route::post('/user/create',[UserController::class,'store']);
Route::post('login',[UserController::class,'login']);
Route::post('signUp',[UserController::class,'signUp']);
Route::post('givePermission',[GivePermissionController::class,'givePermission']);
/*************************************************/
Route::get('/project/getAll',[ProjectsController::class,'getAll']);
Route::post('/project/add',[ProjectsController::class,'store']);
Route::post('/project/show/{id}',[ProjectsController::class,'show']);
Route::post('/project/update',[ProjectsController::class,'update']);
Route::delete('/project/destroy',[ProjectsController::class,'destroy']);
/**************************************************/
Route::post('/taskcomment/add',[TaskCommentController::class,'store']);
Route::post('/taskcomment/getALL',[TaskCommentController::class,'getALL']);
Route::post('/taskcomment/update',[TaskCommentController::class,'update']);
Route::delete('/taskcomment/destroy',[TaskCommentController::class,'destroy']);
/***************************************************/
Route::post('/projectcomment/add',[ProjectCommentController::class,'store']);
Route::post('/projectcomment/getALL',[ProjectCommentController::class,'getALL']);
Route::post('/projectcomment/update',[ProjectCommentController::class,'update']);
Route::delete('/projectcomment/destroy',[ProjectCommentController::class,'destroy']);
