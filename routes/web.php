<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;

// 📄 Trang Public
Route::get('/', fn () => view('trang-chu'));
Route::get('/tuyen-xe', fn () => view('tuyen-xe'));
Route::get('/lien-he', fn () => view('lien-he'));

// 👉 Tin tức public (slug)
Route::get('/tin-tuc', [PostController::class, 'list'])->name('posts.public');
Route::get('/{slug}.html', [PostController::class, 'show'])
    ->where('slug', '^(?!lien-he|tuyen-xe|dashboard|profile|login|register).*$')
    ->name('posts.show');


// 📊 Dashboard (yêu cầu đăng nhập)
Route::middleware(['auth'])->group(function () {

    // Trang tổng quan
    Route::get('/dashboard', fn () => view('dashboard.tong-quan'))->name('dashboard');

    // 👉 Danh mục
    Route::get('/dashboard/danh-muc', [CategoryController::class, 'index'])->name('categories.index');
    Route::get('/dashboard/danh-muc/create', [CategoryController::class, 'create'])->name('categories.create');
    Route::post('/dashboard/danh-muc', [CategoryController::class, 'store'])->name('categories.store');

    // 👉 Bài viết (không dùng route show để tránh xung đột với public)
    Route::resource('/dashboard/bai-viet', PostController::class)
        ->except(['show'])
        ->names([
            'index'   => 'posts.index',
            'create'  => 'posts.create',
            'store'   => 'posts.store',
            'edit'    => 'posts.edit',
            'update'  => 'posts.update',
            'destroy' => 'posts.destroy',
        ]);

    // 👉 Hồ sơ cá nhân
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Đăng nhập, đăng ký, xác thực...
require __DIR__.'/auth.php';
