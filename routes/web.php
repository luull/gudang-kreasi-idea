<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\NaskahController;
use App\Http\Controllers\Admin\LinkController;
use App\Http\Controllers\Admin\TeamController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ConfigurationController;
use App\Http\Controllers\Webfront\HomeController;
use App\Http\Controllers\Webfront\KatalogController;
use App\Http\Controllers\Webfront\TeamsController;
use App\Http\Controllers\Webfront\ServicesController;
use App\Http\Controllers\Webfront\BlogsController;
use App\Http\Controllers\Webfront\NaskahsController;
use App\Http\Controllers\Webfront\ContactController;
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
Route::get('/', [HomeController::class, 'index']);
Route::get('/katalog', [KatalogController::class, 'index']);

Route::get('/detail-katalog/{slug}', [KatalogController::class, 'detailProduk']);
Route::get('/detail-category/{slug}', [KatalogController::class, 'detailCategory']);

Route::get('/service/{menu}', [ServicesController::class, 'index']);

Route::get('/detail-blog/{id}', [BlogsController::class, 'detailBlogs']);
Route::get('/blog/{menu}', [BlogsController::class, 'index']);

Route::get('/team', [TeamsController::class, 'index']);
Route::get('/naskah', [NaskahsController::class, 'index']);
Route::get('/contact', [ContactController::class, 'index']);

Route::get('/login', [LoginController::class, 'index']);
Route::get('/logout', [LoginController::class, 'logout']);
Route::post('/proses-login', [LoginController::class, 'login'])->name('proses-login');
Route::get('/changepass', [LoginController::class, 'changepass']);
Route::post('/proses-changepass', [LoginController::class, 'proseschange'])->name('change-password');

Route::get('/admin/dashboard', [DashboardController::class, 'index']);

Route::get('/admin/service/haki', [ServiceController::class, 'haki']);
Route::get('/admin/service/penelitian', [ServiceController::class, 'penelitian']);
Route::get('/admin/service/kolaborasi', [ServiceController::class, 'kolaborasi']);
Route::get('/admin/service/pelatihan', [ServiceController::class, 'pelatihan']);
Route::get('/admin/service/konversi', [ServiceController::class, 'konversi']);
Route::get('/admin/service/editing', [ServiceController::class, 'editing']);
Route::get('/admin/service/design', [ServiceController::class, 'design']);
Route::get('/admin/service/layout', [ServiceController::class, 'layout']);
Route::get('/admin/service/find/{id}', [ServiceController::class, 'find']);
Route::get('/admin/service/delete/{id}', [ServiceController::class, 'delete']);
Route::post('/proses-add-service', [ServiceController::class, 'addService'])->name('proses-add-service');
Route::post('/proses-edit-service', [ServiceController::class, 'editService'])->name('proses-edit-service');
Route::get('/admin/file_browse_service', [ServiceController::class, 'file_browse']);
Route::post('/admin/uploadfile', [ServiceController::class, 'uploadfile'])->name('upload-file-service');
Route::post('ckeditor/upload', [ServiceController::class, 'upload'])->name('ckeditor-upload');

Route::get('/admin/blog', [BlogController::class, 'index']);
Route::get('/admin/blog/find/{id}', [BlogController::class, 'find']);
Route::get('/admin/blog/delete/{id}', [BlogController::class, 'delete']);
Route::post('/proses-add-blog', [BlogController::class, 'addBlog'])->name('proses-add-blog');
Route::post('/proses-edit-blog', [BlogController::class, 'editBlog'])->name('proses-edit-blog');

Route::get('/admin/configuration', [ConfigurationController::class, 'index']);
Route::post('/proses-edit-config', [ConfigurationController::class, 'editConfig'])->name('proses-edit-config');

Route::get('/admin/team', [TeamController::class, 'index']);
Route::get('/admin/team/find/{id}', [TeamController::class, 'find']);
Route::get('/admin/team/delete/{id}', [TeamController::class, 'delete']);
Route::post('/proses-add-team', [TeamController::class, 'addTeam'])->name('proses-add-team');
Route::post('/proses-edit-team', [TeamController::class, 'editTeam'])->name('proses-edit-team');

Route::get('/admin/admin', [AdminController::class, 'index']);
Route::get('/admin/admin/find/{id}', [AdminController::class, 'find']);
Route::get('/admin/admin/delete/{id}', [AdminController::class, 'delete']);
Route::post('/proses-add-admin', [AdminController::class, 'addAdmin'])->name('proses-add-admin');
Route::post('/proses-edit-admin', [AdminController::class, 'editAdmin'])->name('proses-edit-admin');

Route::get('/admin/product', [ProductController::class, 'index']);
Route::get('/admin/product/find/{id}', [ProductController::class, 'find']);
Route::get('/admin/product/delete/{id}', [ProductController::class, 'delete']);
Route::post('/proses-add-product', [ProductController::class, 'addProduct'])->name('proses-add-product');
Route::post('/proses-edit-product', [ProductController::class, 'editProduct'])->name('proses-edit-product');

Route::get('/admin/category', [CategoryController::class, 'index']);
Route::get('/admin/category/find/{id}', [CategoryController::class, 'find']);
Route::get('/admin/category/delete/{id}', [CategoryController::class, 'delete']);
Route::post('/proses-add-category', [CategoryController::class, 'addCategory'])->name('proses-add-category');
Route::post('/proses-edit-category', [CategoryController::class, 'editCategory'])->name('proses-edit-category');

Route::get('/admin/banner', [BannerController::class, 'index']);
Route::get('/admin/banner/find/{id}', [BannerController::class, 'find']);
Route::get('/admin/banner/delete/{id}', [BannerController::class, 'delete']);
Route::post('/proses-add-banner', [BannerController::class, 'addBanner'])->name('proses-add-banner');
Route::post('/proses-edit-banner', [BannerController::class, 'editBanner'])->name('proses-edit-banner');

Route::get('/admin/naskah', [NaskahController::class, 'index']);
Route::get('/admin/naskah/find/{id}', [NaskahController::class, 'find']);
Route::get('/admin/naskah/delete/{id}', [NaskahController::class, 'delete']);
Route::post('/proses-add-naskah', [NaskahController::class, 'addNaskah'])->name('proses-add-naskah');
Route::post('/proses-edit-naskah', [NaskahController::class, 'editNaskah'])->name('proses-edit-naskah');

Route::get('/admin/link', [LinkController::class, 'index']);
Route::get('/admin/link/find/{id}', [LinkController::class, 'find']);
Route::get('/admin/link/delete/{id}', [LinkController::class, 'delete']);
Route::post('/proses-add-link', [LinkController::class, 'addLink'])->name('proses-add-link');
Route::post('/proses-edit-link', [LinkController::class, 'editLink'])->name('proses-edit-link');