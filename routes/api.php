<?php

use App\Http\Controllers\auth\CreateCompanyController;
use App\Http\Controllers\auth\DeleteAccountControllers;
use App\Http\Controllers\auth\ForgetPasswordControllers;
use App\Http\Controllers\auth\loginControllers;
use App\Http\Controllers\auth\LogoutControllers;
use App\Http\Controllers\auth\RegisterControllers;
use App\Http\Controllers\auth\ResendCodeControllers;
use App\Http\Controllers\auth\ResetPasswordControllers;
use App\Http\Controllers\auth\VerificationControllers;
use App\Http\Controllers\TestingControllers;
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



// Route::post('test',[TestingControllers::class,'test']);
// Route::post('check',[TestingControllers::class,'employeeInCity']);
// Route::post('add',[TestingControllers::class,'add']);
// Route::post('resetPassword/{email}',[TestingControllers::class,'resetPassword']);


///////////////// Auth ///////////////////////////////
Route::post('/register', [RegisterControllers::class, 'register']);
Route::post('/login', [loginControllers::class, 'login']);
Route::post('/verification', [VerificationControllers::class, 'verification']);
Route::post('/forgetPassword', [ForgetPasswordControllers::class, 'forgetPassword']);
Route::post('/resetPassword/{email}', [ResetPasswordControllers::class, 'resetPassword']);
Route::get('/resendCode/{email}', [ResendCodeControllers::class, 'resendCode']);
Route::get('/logout', [LogoutControllers::class, 'logout'])->middleware('auth:sanctum');
;
Route::get('/deleteAccount', [DeleteAccountControllers::class, 'delete'])->middleware('auth:sanctum');
;
///////////////// Company ///////////////////////////////
Route::put('/CreateCompany', [CreateCompanyController::class, 'create']);