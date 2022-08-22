<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PCController;
use App\Http\Controllers\PCCategoryController;
use App\Http\Controllers\PCProducerController;
use App\Http\Controllers\userWebsiteController;
use App\Http\Controllers\UserAdminController;
use App\Http\Controllers\adminWebsiteController;
use App\Http\Controllers\InfomationController;


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
Route::get('list-pc',[PCController::class, 'index'])->middleware('isLoggedIn');
Route::get('add-pc',[PCController::class, 'addPC'])->middleware('isLoggedIn');;
Route::post('save-pc',[PCController::class, 'savePC']);
Route::get('edit-pc/{id}',[PCController::class, 'editPC'])->middleware('isLoggedIn');;
Route::post('update-pc',[PCController::class, 'updatePC']);
Route::get('delete-pc/{id}',[PCController::class, 'deletePC'])->middleware('isLoggedIn');;

Route::get('list-category',[PCCategoryController::class, 'index'])->middleware('isLoggedIn');;
Route::get('add-category',[PCCategoryController::class, 'addCategory'])->middleware('isLoggedIn');;
Route::post('save-category',[PCCategoryController::class, 'saveCategory']);
Route::get('edit-category/{id}',[PCCategoryController::class, 'editCategory'])->middleware('isLoggedIn');;
Route::post('update-category',[PCCategoryController::class, 'updateCategory']);
Route::get('delete-category/{id}',[PCCategoryController::class, 'deleteCategory'])->middleware('isLoggedIn');;

Route::get('list-producer',[PCProducerController::class, 'index'])->middleware('isLoggedIn');;
Route::get('add-producer',[PCProducerController::class, 'addProducer'])->middleware('isLoggedIn');;
Route::post('save-producer',[PCProducerController::class, 'saveProducer']);
Route::get('edit-producer/{id}',[PCProducerController::class, 'editProducer'])->middleware('isLoggedIn');;
Route::post('update-producer',[PCProducerController::class, 'updateProducer']);
Route::get('delete-producer/{id}',[PCProducerController::class, 'deleteProducer'])->middleware('isLoggedIn');;

Route::get('list-user',[UserAdminController::class, 'index']);
Route::get('delete-user/{id}',[UserAdminController::class, 'deleteUser']);

Route::get('user-view-homepage',[userWebsiteController::class, 'index']);
Route::get('user-view-about',[userWebsiteController::class, 'aboutPage']);
Route::get('user-view-product',[userWebsiteController::class, 'listUserProduct']);
Route::get('user-view-productDetail/{id}',[userWebsiteController::class, 'productDetail']);
Route::get('user-view-contactus',[userWebsiteController::class, 'contactusPage']);

Route::get('user-view-list-category/{id}',[userWebsiteController::class, 'listCategory']);
Route::get('user-view-list-producer/{id}',[userWebsiteController::class, 'listProducer']);

Route::get('user-view-login', [userWebsiteController::class, 'login']);
Route::post('/register-user', [userWebsiteController::class, 'registerUser']) -> name('register-user'); 
Route::post('/login-user', [userWebsiteController::class, 'loginUser']) -> name('login-user');
Route::get('/dashboard', [userWebsiteController::class, 'dashboard']);
Route::get('user-view-homepage', [userWebsiteController::class, 'index']);
Route::get('/logout', [userWebsiteController::class, 'logout']);
Route::get('/infomation/{id}',[userWebsiteController::class, 'infomation']);
Route::post('/updateinfomation',[userWebsiteController::class, 'updateInfomation'])->name('update-infomation');
Route::get('/search', [userWebsiteController::class, 'search']);

Route::get('admin-view-login', [adminWebsiteController::class, 'index']);
Route::post('/login-admin', [adminWebsiteController::class, 'loginAdmin']) -> name('login-admin');
Route::get('/logoutadmin', [adminWebsiteController::class, 'logout']);

