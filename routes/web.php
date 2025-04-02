<?php

use App\Http\Controllers\FrontendController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserPassController;
use App\Http\Controllers\PasswordManageController;

Route::get('/', function () {
    return view('index');
})->name('index');

// Routes requiring auth, email verification, and 2FA
Route::middleware(['auth', 'verified'])->prefix('admin')->group(function () {
    // for managing passwords

    Route::resource('/pass-manage', UserPassController::class);
    Route::get('/pass-manage/{id}/share', [UserPassController::class, 'share'])->name('pass-manage.share');
    Route::post('/pass-manage/{id}/share', [UserPassController::class, 'storeShare'])->name('pass-manage.store-share');
    Route::delete('/pass-manage/{id}/share/{sharedPassId}', [UserPassController::class, 'removeShare'])->name('pass-manage.remove-share');

    // for generating and showing password

    Route::get('/pass-gen', [PasswordManageController::class, 'index'])->name('pass.gen');
    Route::get('/pass-show', [PasswordManageController::class, 'viewPass'])->name('pass.show');

    // profile edits
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // dashboard routes
    // Route::get('/dashboard', function () {
    //     return view('dashboard');
    // })->name('dashboard');
    // Route::get('/', function () {
    //     return view('admin.index');
    // })->name('dashboard');
    Route::get('/', [FrontendController::class, 'dashboard'])->name('dashboard');
});


require __DIR__ . '/auth.php';
