<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdController;
use App\Http\Controllers\CountryAdLimitSetController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
/*Ad User Auth Routes*/
Route::middleware('auth')->prefix('user/')->name('user.')->group(function (){
    Route::get('ads', [AdController::class, 'getAllAds'])->name('all.ads');
});


/*Admin Routes*/
Route::middleware('admin')->prefix('admin/')->name('admin.')->group(function (){
   Route::get('advertisement/countries', [AdminController::class, 'allCountries'])->name('all.countries');
   Route::get('get/country', [AdminController::class, 'getCountry'])->name('get.country');
   Route::get('advertisement/countries/status/change', [AdminController::class, 'changeCountryActiveStatus'])->name('country.status.change');
   Route::post('set/add/limit', CountryAdLimitSetController::class)->name('add.limit.per.day');
});

require __DIR__.'/auth.php';
