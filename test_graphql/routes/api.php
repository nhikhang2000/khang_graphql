<?php

use App\Http\Controllers\auth\api\ProfilesController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\auth\api\AuthController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('profiles',[ProfilesController::class,'index']);//hiện thị ds
Route::post('profiles',[ProfilesController::class,'store']);//thêm
Route::put('profiles/{id}',[ProfilesController::class,'update']);//cập nhật
Route::delete('profiles/{id}',[ProfilesController::class,'destroy']);//xóa

Route::prefix('/user')->group(function(){
    Route::post('/login',[AuthController::class,'login']);
});

//xác thực token để xác tực api
// Route::group(['middleware' => 'auth:api'], function() {
//     Route::get('profiles', [ProfilesController::class,'index']);
//     Route::post('profiles', [ProfilesController::class,'store']);
//     Route::put('profiles/{id}', [ProfilesController::class,'update']);
//     Route::delete('profiles/{id}', [ProfilesController::class,'destroy']);
// });
