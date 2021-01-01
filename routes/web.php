<?php

use App\Http\Controllers\TestController;
use App\Http\Livewire\Admin\Settings;
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

Route::get('/', [TestController::class, 'index'])->name('home');
Route::get('/send', [TestController::class, 'sendMail']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

// Admin Namespace - Husk At tilføje HasRole('admin') check.
Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('/settings', Settings::class)->name('settings');
});

require __DIR__.'/auth.php';
