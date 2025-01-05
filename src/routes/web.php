<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use Laravel\Fortify\Http\Controllers\AuthenticatedSessionController;
use App\Http\Controllers\ModalController;

// ホームページ
Route::get('/', [ContactController::class, 'index']);

// フォーム送信系ルート
Route::post('/confirm', [ContactController::class, 'confirm']);
Route::post('/contacts', [ContactController::class, 'store']);
Route::get('/thanks', [ContactController::class, 'thanks']);

// ユーザー登録ページの表示ルート
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');

// ユーザー登録処理のルート
Route::post('/register', [RegisterController::class, 'register']);

// ログインページの表示ルート
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');

// ログイン処理のルート
Route::post('/login', [AuthenticatedSessionController::class, 'store'])->name('login.post');

// ログアウト処理のルート
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

// 管理者ページ
Route::get('/admin', [AdminController::class, 'admin']);

// Modal用
Route::get('/modal', [ModalController::class, 'modal']);

Route::get('/contacts/{id}', [AdminController::class, 'show']);
