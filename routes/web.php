<?php

use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DataAbsensiController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\PicketScheduleController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\UbahPasswordController;
use App\Http\Controllers\UserController;
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

Route::middleware(['guest'])->group(function () {
   Route::get('/', [MainController::class, 'index'])->name("frontend");
   Route::post('/register', [MainController::class, 'register'])->name("register");
   Route::post('/login', [MainController::class, 'login'])->name("login");
});

// --- AUTHENTICATION ---
Route::middleware(['auth'])->group(function () {
   // Dashboard
   Route::get('dashboard', DashboardController::class)->name("dashboard");
   // Karyawan
   Route::prefix('data-karyawan-magang')->name('dataMagang.')->middleware('can:isNotIntern')->group(function () {
      Route::resource('/', UserController::class);
      Route::post('{id}', [UserController::class, 'update'])->name('update');
      Route::get('{id}/edit', [UserController::class, 'edit'])->name('edit');
      Route::delete('{id}', [UserController::class, 'destroy'])->name('destroy');
      Route::get("table", [UserController::class, 'datatables'])->name('datatable');
      Route::get("export", [UserController::class, 'export'])->name('export');
   });
   // Data Absensi
   Route::prefix('data-absensi')->name('dataAbsensi.')->middleware('can:isNotIntern')->group(function () {
      Route::get('/', [DataAbsensiController::class, 'index'])->name('index');
      Route::get("/table",[DataAbsensiController::class, 'datatables'])->name('datatable');
      Route::get("/export",[DataAbsensiController::class, 'export'])->name('export');
   });
   // Data Absensi
   Route::prefix('absensi')->name('absensi.')->middleware('can:isIntern')->group(function () {
      Route::resource('/', AbsensiController::class);
      Route::put('/{id}', [AbsensiController::class, 'update'])->name('update');
      Route::get("/table",[AbsensiController::class, 'datatables'])->name('datatable');
   });
   // Data Absensi
   Route::prefix('jadwal-piket')->name('picket.')->group(function () {
      Route::get("/",[PicketScheduleController::class, 'index'])->name('index');
      Route::get("/table",[PicketScheduleController::class, 'datatables'])->name('datatable');
      Route::get("/search",[PicketScheduleController::class, 'search'])->name('search');
      Route::post("/ubah",[PicketScheduleController::class, 'update'])->name('update');
   });
   // Profile
   Route::prefix('profil-saya')->name('profile.')->group(function () {
      Route::get('/', [ProfilController::class, 'index'])->name("index");
      Route::post('/ubah', [ProfilController::class, 'update'])->name("update");
   });
   // Ubah Password
   Route::prefix('ubah-password')->name('changePassword.')->group(function () {
      Route::get('/', [UbahPasswordController::class, 'index'])->name("index");
      Route::post('/ubah', [UbahPasswordController::class, 'update'])->name("update");
   });
   // Logout
   Route::get('/logout', [MainController::class, 'logout'])->name("logout");
});
