<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\DistrictController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Http\Controllers\Backend\SubDistrictController;
use App\Http\Controllers\Backend\PostController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('admin.index');
})->name('dashboard');

//Admin Logout
Route::get('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');


//Admin Category All Routes
Route::get('/categories', [CategoryController::class, 'index'])->name('categories');
Route::get('/add/category', [CategoryController::class, 'addCategory'])->name('add.category');
Route::post('/store/category', [CategoryController::class, 'storeCategory'])->name('store.category');
Route::get('/edit/category/{id}', [CategoryController::class, 'editCategory'])->name('edit.category');
Route::post('/update/category/{id}', [CategoryController::class, 'updateCategory'])->name('update.category');
Route::get('/delete/category/{id}', [CategoryController::class, 'deleteCategory'])->name('delete.category');


//Admin SabCategory All Routes
Route::get('/subcategories', [SubCategoryController::class, 'index'])->name('subcategories');
Route::get('/add/subcategory', [SubCategoryController::class, 'addSubCategory'])->name('add.subcategory');
Route::post('/store/subcategory', [SubCategoryController::class, 'storeSubCategory'])->name('store.subcategory');
Route::get('/edit/subcategory/{id}', [SubCategoryController::class, 'editSubCategory'])->name('edit.subcategory');
Route::post('/update/subcategory/{id}', [SubCategoryController::class, 'updateSubCategory'])->name('update.subcategory');
Route::get('/delete/subcategory/{id}', [SubCategoryController::class, 'deleteSubCategory'])->name('delete.subcategory');


//Admin District All Routes
Route::get('/districts', [DistrictController::class, 'index'])->name('districts');
Route::get('/add/district', [DistrictController::class, 'addDistrict'])->name('add.district');
Route::post('/store/district', [DistrictController::class, 'storeDistrict'])->name('store.district');
Route::get('/edit/district/{id}', [DistrictController::class, 'editDistrict'])->name('edit.district');
Route::post('/update/district/{id}', [DistrictController::class, 'updateDistrict'])->name('update.district');
Route::get('/delete/district/{id}', [DistrictController::class, 'deleteDistrict'])->name('delete.district');


//Admin Subdistrict All Routes
Route::get('/subdistrict', [SubDistrictController::class, 'index'])->name('subdistrict');
Route::get('/add/subdistrict', [SubDistrictController::class, 'addSubDistrict'])->name('add.subdistrict');
Route::post('/store/subdistrict', [SubDistrictController::class, 'storeSubDistrict'])->name('store.subdistrict');
Route::get('/edit/subdistrict/{id}', [SubDistrictController::class, 'editSubDistrict'])->name('edit.subdistrict');
Route::post('/update/subdistrict/{id}', [SubDistrictController::class, 'updateSubDistrict'])->name('update.subdistrict');
Route::get('/delete/subdistrict/{id}', [SubDistrictController::class, 'deleteSubDistrict'])->name('delete.subdistrict');


//Ajax Category Filter Route
Route::get('/get/subcategory/{category_id}', [PostController::class, 'filterSubCategory']);

//Ajax District Filter Route
Route::get('/get/subdistrict/{district_id}', [PostController::class, 'filterSubDistrict']);

//Admin Posts All Routes
Route::resource('posts', PostController::class);
//Route::get('/posts', [PostController::class, 'index'])->name('posts');
