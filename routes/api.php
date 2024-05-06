<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CleanerController;
use App\Http\Controllers\Api\CleanerDocsController;
use App\Http\Controllers\Api\OfflineController;
use App\Http\Controllers\Api\QuestionController;
use App\Http\Controllers\Api\ShiftController;
use App\Http\Controllers\Api\WorkOrderController;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::middleware(['api'])->group(function() {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);

    Route::get('/logout', [AuthController::class, 'logout']);
    Route::get('/profile', [AuthController::class, 'profile']);
    Route::post('/refresh', [AuthController::class, 'refresh']);
    Route::post('/forgot-password', [AuthController::class, 'forgot_password']);
    Route::post('/verity-reset-code', [AuthController::class, 'verity_reset_code']);
    Route::post('/update-password', [AuthController::class, 'update_password']);
    Route::post('/update-profile', [AuthController::class, 'edit_profile']);


    // Route::post('/register', [AuthController::class, 'register']);


    Route::post('/scan-qr',[ShiftController::class,'checkShift']);
    Route::post('/start-shift',[ShiftController::class,'startSiteShift']);
    Route::post('/start-end/{id}',[ShiftController::class,'endSiteShift']);
    Route::get('/running-shift',[ShiftController::class,'runningSiteShift']);
    Route::get('/shift-questions',[ShiftController::class,'shiftQuestions']);

    Route::get('/work-order',[WorkOrderController::class,'workOrder']);
    Route::post('/work-order-start',[WorkOrderController::class,'startWorkOrderShift']);
    Route::post('/work-order-end/{id}',[WorkOrderController::class,'endWorkOrderShift']);
    Route::get('/running-work-order',[WorkOrderController::class,'runningWorkOrderShift']);

    Route::post('/shift-requests',[CleanerController::class,'siteRequest']);
    Route::get('/all-shift-requests',[CleanerController::class,'allRequested']);

    Route::get('/cleaner-docs',[CleanerDocsController::class,'cleanerDocs']);
    Route::post('/cleaner-docs-upload/{id}',[CleanerDocsController::class,'cleanerDocsUpload']);


    Route::get('/cleaner-induction',[CleanerController::class,'cleanerInduction']);
    Route::post('/cleaner-induction-upload/{id}',[CleanerController::class,'cleanerInductionUpload']);




    Route::get('/offline-data',[OfflineController::class,'allOfflineData']);
    Route::post('/shift-submit',[OfflineController::class,'submitShift']);
    Route::post('/workorder-submit',[OfflineController::class,'submitWorkOrder']);

});

Route::get('/pay',[AuthController::class,'paymentGate']);

