<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
// Route::get("/admin", function () {
//     return "Hello admin";
// });

Route::prefix("admin")->name("admin.")->group(function () {
    Route::middleware(["guest:admin","PreventBackHistory"])->group(function () {
        Route::view("/login","back.pages.admin.auth.login")->name("login");
        Route::post("/login_handler",[AdminController::class,"loginHandler"])->name("login_handler");
        Route::view("/forgot-password","back.pages.admin.auth.forgot-password")->name("forgot-password");
        Route::post("/send-password-reset-link",[AdminController::class,"sendPasswordResetLink"])->name("send-password-reset-link");
        Route::get("/password/reset/{token}",[AdminController::class,"resetPassword"])->name("reset-password");
    });
    Route::middleware(["auth:admin","PreventBackHistory"])->group(function () {
        Route::view("/home","back.pages.admin.home")->name("home");
        Route::post("/logut_handler",[AdminController::class,"logoutHandler"])->name('logout_handler');
        Route::get('/profile',[AdminController::class,'profileView'])->name('profile');
        Route::get('/change-profile-picture/{id}',[AdminController::class,'changeProfilePicture'])->name('change-profile-picture');
        Route::view('/settings','back.pages.settings')->name('settings');
        Route::post('/change-logo',[AdminController::class,'changeLogo'])->name('change-logo');
        Route::post('/change-favicon',[AdminController::class,'changeFavicon'])->name('change-favicon');
    });

});