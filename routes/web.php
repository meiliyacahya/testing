<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ScheduleController;

// Rute untuk menampilkan jadwal
Route::get('/', [ScheduleController::class, 'index'])->name('schedule.index');

// Rute untuk menghasilkan jadwal baru
Route::get('/generate', [ScheduleController::class, 'generateSchedule'])->name('schedule.generate');