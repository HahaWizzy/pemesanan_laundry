<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\DataLaundryNonMemberController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\PembelianBarangController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Models\Pembelian_Barang;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// 
Route::resource('pegawai', PegawaiController::class);
Route::resource('member', MemberController::class);
Route::resource('nonmember', DataLaundryNonMemberController::class);
Route::resource('pembelian_barang', PembelianBarangController::class);
Route::resource('barang', BarangController::class);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
}); 

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');
});



require __DIR__.'/auth.php';
