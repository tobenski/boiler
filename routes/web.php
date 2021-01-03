<?php

use App\Http\Controllers\Admin\PagesController;
use App\Http\Controllers\TestController;
use App\Http\Livewire\Admin\PagesMedia;
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
    //Route::get('/pages', PageDetails::class )->name('pages');

    // Pages
    Route::get('/page', [PagesController::class, 'index'])->name('page.index');
    Route::get('/page/create', [PagesController::class, 'create'])->name('page.create');
    Route::post('/page', [PagesController::class, 'store'])->name('page.store');
    Route::get('/page/{id?}', [PagesController::class, 'edit'])->name('page.edit');
    Route::put('/page/{id?}', [PagesController::class, 'update'])->name('page.update');
    Route::delete('/page/{id}', [PagesController::class, 'destroy'])->name('page.destroy');
    Route::post('/page/{id?}/image', [PagesController::class, 'storeImage'])->name('page.image.store');
    Route::post('/page/{id?}/album', [PagesController::class, 'storeAlbum'])->name('page.album.store');

    Route::get('/pages/media/', PagesMedia::class)->name('pages.media');
});

Route::mediaLibrary();

require __DIR__.'/auth.php';
