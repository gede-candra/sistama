<?php

use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DataAbsensiController;
use App\Http\Controllers\MainController;
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

Route::get('/', [MainController::class, 'index'])->name("frontend");
Route::post('/register', [MainController::class, 'register'])->name("register");
Route::post('/login', [MainController::class, 'login'])->name("login");
Route::get('/logout', [MainController::class, 'logout'])->name("logout");

// --- AUTHENTICATION ---
Route::group(["middleware" => ['auth']], function () {
    Route::group(["middleware" => ["cek_login:HRD"]], function(){
      // --- HALAMAN HRD ---
      // Dashboard
      Route::get('/hrd', DashboardController::class)->name("dashboard");
      // Karyawan
      Route::resource('/hrd/karyawan', UserController::class);
      Route::post('/hrd/updatekaryawan', [UserController::class, 'update'])->name('updatekaryawan');
      Route::get("/hrd/table", [UserController::class, 'datatables'])->name('datatables');
      // Absensi
      Route::get('/hrd/absensi', [DataAbsensiController::class, 'index']);
      Route::get("/hrd/absensi-table",[DataAbsensiController::class, 'datatables'])->name('absensi_datatables');
      // Profile
      Route::get('/hrd/profil-saya', [ProfilController::class, 'index'])->name("profilUserPage_HRD");
      Route::post('/hrd/profil-saya/edit', [ProfilController::class, 'update'])->name("editProfilUser_HRD");
      // Ubah Password
      Route::get('/hrd/ubah-password', [UbahPasswordController::class, 'index'])->name("ubahPasswordPage_HRD");
      Route::post('/hrd/ubah-password/ubah', [UbahPasswordController::class, 'update'])->name("prosesUbahPassword_HRD");
   });
   Route::group(["middleware" => ["cek_login:Karyawan"]], function(){
       // --- HALAMAN KARYAWAN ---
      // Dashboard
      Route::get('/karyawan', DashboardController::class)->name("dashboardkaryawan");
      // Absensi
      Route::resource('/karyawan/absensi', AbsensiController::class);
      Route::get("/karyawan/absensi-table", [AbsensiController::class, 'datatables'])->name('absensi_datatables_karyawan');
      // Profile
      Route::get('/karyawan/profil-saya', [ProfilController::class, 'index'])->name("profilUserPage_Karyawan");
      Route::post('/karyawan/profil-saya/edit', [ProfilController::class, 'update'])->name("editProfilUser_Karyawan");
      // Ubah Password
      Route::get('/karyawan/ubah-password', [UbahPasswordController::class, 'index'])->name("ubahPasswordPage_Karyawan");
      Route::post('/karyawan/ubah-password/ubah', [UbahPasswordController::class, 'update'])->name("prosesUbahPassword_Karyawan");
   });
});
