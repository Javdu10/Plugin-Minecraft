<?php

use Illuminate\Support\Facades\Route;
use Azuriom\Plugin\Minecraft\Controllers\Admin\AdminController;
use Azuriom\Plugin\Minecraft\Controllers\Admin\ServerController;

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

Route::get('/settings', [AdminController::class, 'settings'])->name('settings');
Route::post('/settings', [AdminController::class, 'updateSettings'])->name('updateSettings');

Route::resource('servers', ServerController::class)->only(['store', 'update']);
Route::post('/servers/{server}/verify/azlink', [ServerController::class, 'verifyAzLink'])->name('servers.verify-azlink');
