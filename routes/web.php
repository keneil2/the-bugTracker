<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BugController;
use App\Http\Controllers\userController;
use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Route;



// home page
Route::redirect("/", "bug");

Route::resource("bug", BugController::class);


//auth part
Route::middleware("auth")->group(function () {




    // dashboard dev dashboard probably ?
// Route::view("/dashboard","bugs.dashboard")->name("dashboard");



    // admin section
    Route::get("/dashboard", [AdminController::class, "ShowDashboard"])->name("dashboard")->middleware("checkRole");

    Route::get("/dashboard/user/create", [userController::class, "showform"])->name("admin.register");

    Route::post("/dashboard/user/create", [userController::class, "createUser"])->middleware("checkRole");

    Route::get("dashboard/users", [userController::class, "viewallUsers"])->name("get.Allusers");

    Route::get("dashboard/dev", [userController::class, "viewAllDevelopers"])->name("get.devs");

    Route::get("dashboard/dev/{id}/edit", [userController::class, "edit"])->name("user.edit");

    Route::put("dashboard/dev/{id}", [userController::class, "update"])->name("user.update");

    Route::delete("dashboard/dev/{id}", [userController::class, "delete"])->name("user.delete");

    Route::get("dashboard/bug/{id}", [BugController::class, "show"])->name("admin.showBug");

    Route::put("dashboard/bug/{id}/assign",[userController::class,"assignTask"])->name("assign.Bug");



    // logout 
    Route::get("/logout", [AuthController::class, "Logout"])->name("logout");


});


// guest Part of the website
Route::middleware("guest")->group(function () {

    //Register
    Route::view("/register", "auth.register")->name("registration");

    Route::post("/register", [AuthController::class, "register"]);

    // login
    Route::view("/login", "auth.login")->name("login");

    Route::post("/login", [AuthController::class, "login"]);
});



Route::fallback(function () {
    return "Page Not Found";
});



