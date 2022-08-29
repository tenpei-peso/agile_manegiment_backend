<?php

declare(strict_types=1);

use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ProjectUserController;
use App\Http\Controllers\TimeCardController;
use App\Http\Controllers\userController;
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

Route::get('/user_list', [userController::class, 'userList']);
Route::post('/timecard/register',[ProjectUserController::class, 'createOrUpdateTimecard']);
Route::get('/timecard/{project_user_id}', [TimeCardController::class, 'getTimeCard']); //   クエリパラメーターでyear_monthを送る
Route::get('/user_data/{id}', [userController::class, 'getUserData']);
Route::post('/setting/backlog',[userController::class, 'settingBacklog']);

// Route::get('/timecard/{project_id}', [TimeCardController::class, 'getTimeCard']);

Route::get('/user_project_list/{user_id}', [ProjectUserController::class, 'getUserProject']);
Route::post('/update_join_project', [ProjectUserController::class, 'updateJoinProject']);

//オーナープロジェクト一覧画面
Route::get('/owner/get_project_list/{owner_id}', [ProjectController::class, 'getOwnerProject']);
//オーナープロジェクト作成
Route::post('/owner/create_project', [ProjectController::class, 'createOwnerProject']);
