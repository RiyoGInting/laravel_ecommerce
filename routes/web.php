<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\SubLevelController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AdminAuthenticatedSessionController;

use App\Models\User;
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
    return view('frontend.index');
});

Route::group(['prefix' => 'admin', 'middleware' => ['admin:admin']], function () {
    Route::get('/login', [AdminAuthenticatedSessionController::class, 'login']);
    Route::post('/login', [AdminAuthenticatedSessionController::class, 'store'])->name('admin.login');
});

Route::middleware(['auth:sanctum,admin', 'verified'])->get('/admin/dashboard', function () {
    return view('admin.index');
})->name('dashboard');

// Admin Routes
Route::get('/admin/logout', [AdminAuthenticatedSessionController::class, 'destroy'])->name('admin.logout');
Route::get('/admin/profile', [AdminController::class, 'profile'])->name('admin.profile');
Route::get('/admin/profile/edit', [AdminController::class, 'editProfile'])->name('admin.profile.edit');
Route::post('/admin/profile/update', [AdminController::class, 'updateProfile'])->name('admin.profile.update');
Route::get('/admin/password/edit', [AdminController::class, 'editPassword'])->name('admin.edit.password');
Route::post('/admin/password/update', [AdminController::class, 'updatePassword'])->name('admin.update.password');


Route::middleware(['auth:sanctum,web', 'verified'])->get('/dashboard', function () {
    $id = Auth::user()->id;
    $user = User::find($id);

    return view('dashboard', compact('user'));
})->name('dashboard');

// user routes
Route::get('/user/logout', [UserController::class, 'logout'])->name('user.logout');
Route::get('/user/profile', [UserController::class, 'editProfile'])->name('user.profile');
Route::post('/user/profile/update', [UserController::class, 'updateProfile'])->name('user.profile.update');
Route::get('/user/change/password', [UserController::class, 'changePassword'])->name('user.change.password');
Route::post('/user/update/password', [UserController::class, 'updatePassword'])->name('user.update.password');

// brands routes
Route::prefix('brand')->group(function () {
    Route::get('/list', [BrandController::class, 'index'])->name('all.brand');
    Route::post('/store', [BrandController::class, 'store'])->name('brand.store');
    Route::get('/edit/{id}', [BrandController::class, 'edit'])->name('brand.edit');
    Route::post('/update/{id}', [BrandController::class, 'update'])->name('brand.update');
    Route::get('/delete/{id}', [BrandController::class, 'delete'])->name('brand.delete');
});

// category routes
Route::prefix('category')->group(function () {
    Route::get('/list', [CategoryController::class, 'index'])->name('all.category');
    Route::post('/store', [CategoryController::class, 'store'])->name('category.store');
    Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
    Route::post('/update/{id}', [CategoryController::class, 'update'])->name('category.update');
    Route::get('/delete/{id}', [CategoryController::class, 'delete'])->name('category.delete');

    // sub-category routes
    Route::get('/subcategory/list', [SubCategoryController::class, 'index'])->name('all.subcategory');
    Route::post('/subcategory/store', [SubCategoryController::class, 'store'])->name('subcategory.store');
    Route::get('/subcategory/edit/{id}', [SubCategoryController::class, 'edit'])->name('subcategory.edit');
    Route::post('/subcategory/update/{id}', [SubCategoryController::class, 'update'])->name('subcategory.update');
    Route::get('/subcategory/delete/{id}', [SubCategoryController::class, 'delete'])->name('subcategory.delete');
    Route::get('/subcategory/getByCategoryId/{category_id}', [SubCategoryController::class, 'getByCategoryId']);

    // sub-level routes
    Route::get('/subcategory/sublevel/list', [SubLevelController::class, 'index'])->name('all.sublevel');
    Route::post('/subcategory/sublevel/store', [SubLevelController::class, 'store'])->name('sublevel.store');
    Route::get('/subcategory/sublevel/edit/{id}', [SubLevelController::class, 'edit'])->name('sublevel.edit');
    Route::post('/subcategory/sublevel/update/{id}', [SubLevelController::class, 'update'])->name('sublevel.update');
    Route::get('/subcategory/sublevel/delete/{id}', [SubLevelController::class, 'delete'])->name('sublevel.delete');
    Route::get('/subcategory/sublevel/getBySubCategoryId/{subcategory_id}', [SubLevelController::class, 'getBySubCategoryId']);
});

// products routes
Route::prefix('product')->group(function () {
    Route::get('/list', [ProductController::class, 'index'])->name('product.list');
    Route::get('/add', [ProductController::class, 'addIndex'])->name('add.product');
    Route::post('/store', [ProductController::class, 'store'])->name('product.store');
    Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
    Route::post('/update/{id}', [ProductController::class, 'update'])->name('product.update');
    Route::get('/active/{id}', [ProductController::class, 'active'])->name('product.active');
    Route::get('/inactive/{id}', [ProductController::class, 'inactive'])->name('product.inactive');
    Route::get('/delete/{id}', [ProductController::class, 'delete'])->name('product.delete');
    Route::post('/images/update', [ProductController::class, 'multiImageUpdate'])->name('images.update');
    Route::get('/images/delete/{id}', [ProductController::class, 'multiImageDelete'])->name('images.delete');
});
