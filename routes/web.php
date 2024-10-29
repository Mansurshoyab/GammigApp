<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SliderController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/login', function () {
    // return view('welcome');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->prefix('admin')->group(function () {
    Route::get('dashboard', [AuthenticatedSessionController::class, 'index'])->name('admin.dashboard');
    Route::get('company', [CompanyController::class, 'index'])->name('admin.company');
    Route::post('/company/update', [CompanyController::class, 'update'])->name('admin.company.update');


    Route::get('about/', [AboutController::class, 'index'])->name('about');
    Route::get('addAbout/', [AboutController::class, 'addAbout'])->name('addAbout');
    Route::post('storeAbout/', [AboutController::class, 'storeAbout'])->name('store.about');
    Route::post('/about/delete-image', [AboutController::class, 'deleteImage'])->name('delete.image');



    Route::get('message', [MessageController::class, 'message'])->name('message');
    Route::delete('delete/message/{message}', [MessageController::class, 'messageDelete'])->name('delete.message');

    // Route::get('country', [CountryController::class, 'country'])->name('country');
    Route::get('add/country', [CountryController::class, 'addCountry'])->name('add.country');
    Route::post('store/image/country', [CountryController::class, 'storeImage'])->name('store.image.country');
    Route::post('store/country', [CountryController::class, 'store'])->name('store.country');

    Route::get('category', [CategoryController::class, 'category'])->name('category');
    Route::get('addCategory', [CategoryController::class, 'addCategory'])->name('addCategory');
    Route::post('store/category', [CategoryController::class, 'storeCategory'])->name('store.category');
    Route::delete('delete/category/{id}', [CategoryController::class, 'deleteCategory'])->name('delete.category');

});

// Route::get('/home', [DashboardController::class, 'index'])->name('home');

require __DIR__ . '/auth.php';
