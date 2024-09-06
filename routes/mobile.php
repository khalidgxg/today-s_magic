<?php

use App\Http\Controllers\API\Mobile\SessionController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::name('sessions.')->group(function () {
    Route::post('login', [SessionController::class, 'login'])->name('login');
    Route::post('register', [SessionController::class, 'register'])->name('register');

    Route::post('change-phone-number', [SessionController::class, 'changePhoneNumber']);
    Route::post('forgot-password', [SessionController::class, 'forgotPassword'])->name('forgot_password');
    Route::post('reset-password/{token}', [SessionController::class, 'resetPassword'])->name('reset_password');
    Route::post('resend-activation-email', [SessionController::class, 'resendActivationAccount'])->name('check_account');
    Route::post('activate-account', [SessionController::class, 'activateAccount'])->name('activate_account');
});
Route::middleware(['auth:sanctum', 'active'])->group(function () {

});
