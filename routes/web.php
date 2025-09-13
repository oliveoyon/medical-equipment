<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\GeneralSettingController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SizeController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\SubcategoryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WebController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {return view('welcome');});


Route::get('/home', [WebController::class, 'index'])->name('web.home');
Route::get('/about-us', [WebController::class, 'aboutUs'])->name('web.about');
Route::get('/company-profile', [WebController::class, 'profile'])->name('web.profile');
Route::get('/certification-and-compliance', [WebController::class, 'certification'])->name('web.certification');
Route::get('/why-choose-us', [WebController::class, 'whyChose'])->name('web.whyChose');
Route::get('/partners-and-clients', [WebController::class, 'partners'])->name('web.partners');
Route::get('/contacts', [WebController::class, 'contacts'])->name('web.contacts');
Route::get('/after-sales-support', [WebController::class, 'afterSale'])->name('web.aftersale');



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';



Route::prefix('admin')->middleware(['auth'])->group(function () {
    Route::get('/', [AdminController::class, 'dashboard'])->name('admin.dashboard');

    Route::resource('categories', CategoryController::class, ['as' => 'admin']);
    Route::resource('subcategories', SubcategoryController::class, ['as' => 'admin']);
    Route::resource('products', ProductController::class, ['as' => 'admin']);
    Route::resource('contacts', ContactController::class, ['as' => 'admin']);
    Route::resource('colors', ColorController::class, ['as' => 'admin']); 
    Route::resource('sizes', SizeController::class, ['as' => 'admin']); 
    Route::resource('brands', BrandController::class, ['as' => 'admin']); 
    Route::resource('sliders', SliderController::class, ['as' => 'admin']);


    Route::get('general-settings', [GeneralSettingController::class, 'edit'])->name('admin.general-settings.edit');
    Route::post('general-settings', [GeneralSettingController::class, 'update'])->name('admin.general-settings.update');
});
