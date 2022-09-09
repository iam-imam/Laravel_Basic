<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PersonController;
use App\Http\Controllers\PracticeController;
use App\Http\Controllers\JuncController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('register', [AuthController::class, 'register']);
Route::post('register-store', [AuthController::class, 'registerstore']);
Route::get('login', [AuthController::class, 'login']);
Route::post('login-store', [AuthController::class, 'loginstore']);


Route::get('dashboard', [AuthController::class, 'dashboard']);
Route::get('users/{status}', [AuthController::class, 'users']);
Route::get('approve-user/{userid}', [AuthController::class, 'approve']);
Route::get('delete-user/{userid}', [AuthController::class, 'delete']);

Route::get('person-register', [PersonController::class, 'register']);
Route::post('personregister-store', [PersonController::class, 'registerstore']);
Route::get('person-login', [PersonController::class, 'login']);
Route::post('personlogin-store', [PersonController::class, 'loginstore']);

Route::get('person-dashboard', [PersonController::class, 'dashboard']);
Route::get('persons/{status}', [PersonController::class, 'persons']);
Route::get('approve-person/{personid}', [PersonController::class, 'approve']);
Route::get('delete-person/{personid}', [PersonController::class, 'delete']);

Route::get('test', [PracticeController::class, 'test']);
Route::post('store-test', [PracticeController::class, 'store']);
Route::get('users', [PracticeController::class, 'all']);

Route::get('edit-user/{id}', [PracticeController::class, 'edit']);
Route::post('update-user/{id}', [PracticeController::class, 'update']);
Route::get('delete-demosuser/{id}', [PracticeController::class, 'delete']);

Route::get('junc', [JuncController::class, 'create']);
Route::post('store-junc', [JuncController::class, 'store']);
Route::get('juncs', [JuncController::class, 'all']);

Route::get('edit-junc/{id}', [JuncController::class, 'edit']);
Route::post('update-junc/{id}', [JuncController::class, 'update']);
Route::get('delete-junc/{id}', [JuncController::class, 'delete']);
