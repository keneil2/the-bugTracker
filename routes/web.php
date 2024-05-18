<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BugController;
use App\Http\Controllers\userController;
use Illuminate\Support\Facades\Route;



// home page
Route::redirect("/","bug");

Route::resource("bug",BugController::class);


//auth part
Route::middleware("auth")->group(function(){

  


// dashboard dev dashboard probably ?
// Route::view("/dashboard","bugs.dashboard")->name("dashboard");



// admin section
Route::view("/dashboard","admin.adminDashboard")->name("dashboard")->middleware("checkRole");

Route::get("dashboard/users",[userController::class,"viewallUsers"])->name("get.Allusers");

Route::get("dashboard/dev",[userController::class,"viewAllDevelopers"])->name("get.devs");

Route::get("dashboard/dev/{id}/edit",[userController::class,"edit"])->name("user.edit");

Route::put("dashboard/dev/{id}",[userController::class,"update"])->name("user.update");

Route::delete("dashboard/dev/{id}",[userController::class,"delete"])->name("user.delete");


// logout 
Route::get("/logout",[AuthController::class,"Logout"])->name("logout");
});


// guest Part of the website
Route::middleware("guest")->group( function(){

//Register
Route::view("/register", "auth.register")->name("registration");

Route::post("/register",[AuthController::class,"register"]);

// login
Route::view("/login","auth.login")->name("login");

Route::post("/login",[AuthController::class,"login"]);
});



Route::fallback(function(){
    return "Page Not Found";
});



