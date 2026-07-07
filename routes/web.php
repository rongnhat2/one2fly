<?php

use App\Http\Controllers\DisplayController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DisplayController::class, 'index'])->name('home');
Route::get('/kham-pha', [DisplayController::class, 'explore'])->name('explore');
Route::get('/gioi-thieu', [DisplayController::class, 'about'])->name('about');
Route::get('/diem-den', [DisplayController::class, 'destinations'])->name('destinations');
Route::get('/diem-den/chi-tiet', [DisplayController::class, 'destinationsDetail'])->name('destinations.detail');
Route::get('/diem-den/ha-giang', [DisplayController::class, 'diemDen'])->name('diem-den');
Route::get('/thu-vien-anh', [DisplayController::class, 'gallery'])->name('gallery');
Route::get('/thu-vien-anh/chi-tiet', [DisplayController::class, 'galleryDetail'])->name('gallery.detail');
Route::get('/cam-nang', [DisplayController::class, 'guide'])->name('guide');
Route::get('/am-thuc', [DisplayController::class, 'food'])->name('food');
Route::get('/am-thuc/{region}', [DisplayController::class, 'foodRegion'])->name('food.region');
Route::get('/an-pham', [DisplayController::class, 'issue'])->name('issue');
Route::get('/an-pham/chi-tiet', [DisplayController::class, 'issueDetail'])->name('issue.detail');
Route::get('/an-pham/doc', [DisplayController::class, 'issueRead'])->name('issue.read');

// Chuyển hướng URL tiếng Anh cũ
Route::redirect('/about', '/gioi-thieu', 301);
Route::redirect('/destinations', '/diem-den', 301);
Route::redirect('/destinations/detail', '/diem-den/chi-tiet', 301);
Route::redirect('/gallery', '/thu-vien-anh', 301);
Route::redirect('/gallery/detail', '/thu-vien-anh/chi-tiet', 301);
Route::redirect('/issue', '/an-pham', 301);
Route::redirect('/issue/detail', '/an-pham/chi-tiet', 301);
Route::redirect('/issue/read', '/an-pham/doc', 301);

Route::fallback([DisplayController::class, 'notFound']);
