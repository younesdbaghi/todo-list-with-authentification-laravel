<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\AuthentificationController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware("guest")->group(
    function(){
        Route::get("/login",[AuthentificationController::class,"ShowLoginForm"])->name("login");
        Route::post("/login/traitement",[AuthentificationController::class,"se_connecter"])->name("login.traitement");
    }
);


Route::middleware("auth")->group(
    function(){
        Route::get('/', [TaskController::class,"ListTask"]);
        Route::get("/ajouter",[TaskController::class,"AjouterForm"])->name("ajouter");
        Route::get("/modifier/{id}",[TaskController::class,"ModifierPage"])->name("modifier");
        Route::get("/tasks",[TaskController::class,"ListTask"])->name("tasks");
        Route::post("/ajouter/traitement",[TaskController::class,"Create"])->name("ajouterTraitement");
        Route::post("/modifier/traitement",[TaskController::class,"Update"])->name("modifierTraitement");
        Route::get("/supprimer/{id}",[TaskController::class,"Delete"])->name("supprimerTraitement");
        Route::get("/logout",[AuthentificationController::class,"Logout"])->name("logout");
    }
);