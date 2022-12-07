<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\AbilityController;

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

Route::get('register', [UserController::class, 'register'])->name('register');
Route::post('register', [UserController::class, 'register_action'])->name('register.action');
Route::get('login', [UserController::class, 'login'])->name('login');
Route::post('login', [UserController::class, 'login_action'])->name('login.action');
Route::get('password', [UserController::class, 'password'])->name('password');
Route::get('logout', [UserController::class, 'logout'])->name('logout');

Route::get('/', [AgentController::class, 'index'])->name('index'); 
Route::get('add', [AgentController::class, 'create'])->name('add'); 
Route::post('store', [AgentController::class, 'store'])->name('store');
Route::get('edit/{id}', [AgentController::class, 'edit'])->name('edit'); 
Route::post('update/{id}', [AgentController::class,  'update'])->name('update');
Route::get('removeIndex', [AgentController::class,  'removeIndex'])->name('removed');
Route::post('remove/{id}', [AgentController::class,  'softDelete'])->name('remove');
Route::get('restore/{id}', [AgentController::class, 'restore'])->name('restore');
Route::post('delete/{id}', [AgentController::class, 'destroy'])->name('delete');
Route::get('/search', [AgentController::class, 'search'])->name('search');

Route::get('index', [AbilityController::class, 'abilityIndex'])->name('abilityIndex'); 
Route::get('ability-add', [AbilityController::class, 'abilityCreate'])->name('abilityAdd'); 
Route::post('ability-store', [AbilityController::class, 'abilityStore'])->name('abilityStore');
Route::get('ability-edit/{id}', [AbilityController::class, 'abilityEdit'])->name('abilityEdit'); 
Route::post('ability-update/{id}', [AbilityController::class,  'abilityUpdate'])->name('abilityUpdate');
Route::get('ability-removeIndex', [AbilityController::class,  'abilityRemoveIndex'])->name('abilityRemoved');
Route::post('ability-remove/{id}', [AbilityController::class,  'abilitySoftDelete'])->name('abilityRemove');
Route::get('ability-restore/{id}', [AbilityController::class, 'abilityRestore'])->name('abilityRestore');
Route::post('ability-delete/{id}', [AbilityController::class, 'abilityDestroy'])->name('abilityDelete');
Route::get('/ability-search', [AbilityController::class, 'abilitySearch'])->name('abilitySearch');