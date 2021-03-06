<?php

use Azuriom\Plugin\Minecraft\Controllers\MinecraftHomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your plugin. These
| routes are loaded by the RouteServiceProvider of your plugin within
| a group which contains the "web" middleware group and your plugin name
| as prefix. Now create something great!
|
*/

Route::get('/', [MinecraftHomeController::class, 'index']);
Route::get('/configure', [MinecraftHomeController::class, 'settings'])->name('settings');
Route::post('/configure', [MinecraftHomeController::class, 'updateSettings'])->name('updateSettings');
