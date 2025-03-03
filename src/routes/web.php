<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\UserController;

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

// 🔑 認証関連（会員登録 & ログイン）
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('auth.register');
Route::post('/register', [AuthController::class, 'register'])->name('auth.register.post');
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('auth.login');
Route::post('/login', [AuthController::class, 'login'])->name('auth.login.post');

// 初回プロフィール設定（会員登録後のみ）
// Route::middleware(['auth', 'first_login'])->group(function () {
    Route::get('/setup', [UserController::class, 'showSetupForm'])->name('users.setup.form');
    Route::post('/setup', [UserController::class, 'setup'])->name('users.setup');
// });

// 🛒 商品一覧（トップページ）
Route::get('/', [ItemController::class, 'index'])->name('items.index');

// 🛒 いいねした商品一覧（要ログイン）
// Route::get('/?tab=mylist', [ItemController::class, 'index'])
//     ->middleware('auth')->name('items.mylist');

// 🛍 商品詳細ページ
Route::get('/item/{item_id}', [ItemController::class, 'show'])->name('items.show');

// // 🛒 購入関連（要ログイン）
// Route::middleware('auth')->group(function () {
    Route::get('/purchase/{item_id}', [PurchaseController::class, 'showPurchaseForm'])->name('purchase.show');
//     Route::post('/purchase/{item_id}', [PurchaseController::class, 'purchase'])->name('purchase.process');
//     Route::get('/purchase/address/{item_id}', [PurchaseController::class, 'showAddressEditForm'])->name('purchase.address.edit');
//     Route::post('/purchase/address/{item_id}', [PurchaseController::class, 'updateAddress'])->name('purchase.address.update');
// });

// // 📦 出品関連（要ログイン）
// Route::middleware('auth')->group(function () {
//     Route::get('/sell', [ItemController::class, 'create'])->name('items.create');
//     Route::post('/sell', [ItemController::class, 'store'])->name('items.store');
// });

// // 👤 プロフィール関連（要ログイン）
// Route::middleware('auth')->group(function () {
//     Route::get('/mypage', [UserController::class, 'show'])->name('users.profile');
    Route::get('/mypage/profile', [UserController::class, 'edit'])->name('users.profile.edit');
//     Route::post('/mypage/profile', [UserController::class, 'update'])->name('users.profile.update');
    Route::get('/mypage?tab=buy', [UserController::class, 'show'])->name('users.purchases');
    Route::get('/mypage?tab=sell', [UserController::class, 'show'])->name('users.sales');
// });
