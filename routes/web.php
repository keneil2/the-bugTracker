<?php

use App\Http\Controllers\Project\ProjectController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BugController;
use App\Http\Controllers\Developer\DeveloperController;
use App\Http\Controllers\userController;
use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Route;



// home page
Route::redirect("/", "bug");




//auth part
Route::middleware("auth")->group(function () {
     // dev section 
    Route::get("bug/assignment",[DeveloperController::class,"ShowAssignedBugs"])->name("bug.assigned");
    Route::get("bug/{id}/change",[DeveloperController::class,"editAssignTask"])->name("bug.editTask");


    Route::resource("bug", BugController::class);


    // dashboard dev dashboard probably ?
// Route::view("/dashboard","bugs.dashboard")->name("dashboard");



    // admin section
    Route::get("/dashboard", [AdminController::class, "ShowDashboard"])->name("dashboard")->middleware("checkRole");

    Route::prefix("dashboard")->group(function(){
        
        Route::get("/user/create", [userController::class, "showform"])->name("admin.register");

        Route::post("/user/create", [userController::class, "createUser"])->middleware("checkRole");
    
        Route::get("/users", [userController::class, "viewallUsers"])->name("get.Allusers");
    
        Route::get("dev", [userController::class, "viewAllDevelopers"])->name("get.devs");
    
        Route::get("dev/{id}/edit", [userController::class, "edit"])->name("dev.edit");
    
        Route::put("dev/{id}", [userController::class, "update"])->name("dev.update");
    
        Route::delete("dev/{id}", [userController::class, "delete"])->name("dev.delete");
    
        Route::get("bug/{id}", [BugController::class, "show"])->name("admin.showBug");
    
        Route::put("bug/{id}/assign",[userController::class,"assignTask"])->name("assign.Bug");
    
        Route::get("users/{id}/edit",[userController::class,"edit"])->name("user.edit");
    
        Route::put("users/{id}", [userController::class, "update"])->name("user.update");
    
        Route::delete("users/{id}", [userController::class, "delete"])->name("user.delete");

        Route::get("/project",[ProjectController::class,"create"])->name("project.create");
        
        Route::post("/project/{id}/store",[ProjectController::class,"storeProject"])->name("store.project");
    });
    
// dev
    
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



