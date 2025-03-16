<?php

use App\Group;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\StudentController;
use App\Student;
use Illuminate\Support\Facades\Route;
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

Route::get('/', [IndexController::class, "index"]);
Route::get('/group/create', 'GroupController@create');
Route::get("/student/create", [StudentController::class, "create"]);
Route::get("group/{id}", [GroupController::class, "show"])->name("group.show");
Route::get("student/{id}", [StudentController::class, "show"])->name("student.show");
Route::get("student/{id}/edit", [StudentController::class, "edit"])->name("student.edit");
Route::get("group/{id}/edit", [GroupController::class, "edit"])->name("group.edit");




Route::get("groups", [GroupController::class, "index"]);
Route::post("group", [GroupController::class, "store"]);
Route::put("group/{id}", [GroupController::class, "update"]);
Route::delete("group/{id}", [GroupController::class, "destroy"]);

Route::get("students", [StudentController::class, "index"]);
Route::post("student", [StudentController::class, "store"]);
Route::put("student/{id}", [StudentController::class, "update"]);
Route::delete("student/{id}", [StudentController::class, "destroy"]);


