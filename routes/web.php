<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\userController;
use App\Http\Controllers\Backend\dashboardController;
use App\Http\Controllers\Backend\PelangganController;
use App\Http\Controllers\Backend\packetController;
use App\Http\Controllers\Backend\orderController;
use App\Http\Controllers\Backend\waController;
use App\Http\Controllers\Backend\reportController;
use App\Http\Controllers\PasswordResetController;
use App\Http\Middleware\CheckRole;





 
        Route::get('/', [PelangganController::class, 'index'])->name('pelanggan.index');
        Route::get('/add', [PelangganController::class, 'add'])->name('pelanggan.add');
        Route::post('/store', [PelangganController::class, 'store'])->name('pelanggan.store');
        Route::get('/edit/{kd_pelanggans}', [PelangganController::class, 'edit'])->name('pelanggan.edit');
        Route::post('/update/{kd_pelanggans}', [PelangganController::class, 'update'])->name('pelanggan.update');
        Route::get('/delete/{kd_pelanggans}', [PelangganController::class, 'delete'])->name('pelanggan.delete');




        
 



