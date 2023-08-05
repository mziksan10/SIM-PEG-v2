<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\BidangController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\GolonganController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FunctionController;
use App\Http\Controllers\PresensiController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\PelatihanController;
use App\Http\Controllers\PerjalananDinasController;
use App\Http\Controllers\RewardPunishmentController;

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
// Route Landing
Route::get('/landing', [Controller::class, 'index'])->name('landing')->middleware('guest');
// Route Login
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);

// Route Logout
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Route Register
Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

Route::group(['middleware' => ['auth', 'checkRole:admin']], function () {
    // Route Dashboard
    Route::get('/', [DashboardController::class, 'index']);
    // Route Data Pegawai
    Route::get('/pegawai', [PegawaiController::class, 'index'])->name('pegawai');
    Route::get('/pegawai/create-pegawai-tetap', [PegawaiController::class, 'createPegawaiTetap'])->name('createPegawaiTetap');
    Route::get('/pegawai/create-pegawai-kontrak', [PegawaiController::class, 'createPegawaiKontrak'])->name('createPegawaiKontrak');
    Route::get('/pegawai/create-pegawai-magang', [PegawaiController::class, 'createPegawaiMagang'])->name('createPegawaiMagang');
    Route::post('/pegawai/store', [PegawaiController::class, 'store'])->name('storePegawai');
    Route::get('/pegawai/show/{id}', [PegawaiController::class, 'show'])->name('showPegawai');
    Route::post('/pegawai/store-riwayat-pendidikan', [PegawaiController::class, 'storeRiwayatPendidikan'])->name('storeRiwayatPendidikan');
    Route::post('/pegawai/store-riwayat-jabatan', [PegawaiController::class, 'storeRiwayatJabatan'])->name('storeRiwayatJabatan');
    Route::get('/pegawai/edit/{id}', [PegawaiController::class, 'edit'])->name('editPegawai');
    Route::put('/pegawai/update/{id}', [PegawaiController::class, 'update'])->name('updatePegawai');
    Route::put('/pegawai/update-riwayat-pendidikan/{id}', [PegawaiController::class, 'updateRiwayatPendidikan'])->name('updateRiwayatPendidikan');
    Route::put('/pegawai/update-riwayat-jabatan/{id}', [PegawaiController::class, 'updateRiwayatJabatan'])->name('updateRiwayatJabatan');
    Route::post('/pegawai/store-berkas', [PegawaiController::class, 'storeBerkas'])->name('storeBerkas');
    Route::delete('/pegawai/destroy-berkas/{id}', [PegawaiController::class, 'destroyBerkas'])->name('destroyBerkas');
    Route::get('/export/pegawai/', [PegawaiController::class, 'export'])->name('exportPegawai');
    Route::post('/import/pegawai/', [PegawaiController::class, 'import'])->name('importPegawai');
    Route::get('/report/pegawai/', [PegawaiController::class, 'report']);
    // Data Golongan
    Route::resource('/golongan', GolonganController::class);
    Route::get('/export/golongan/', [GolonganController::class, 'export']);
    Route::post('/import/golongan/', [GolonganController::class, 'import'])->name('import-golongan');
    // Data Bidang
    Route::resource('/bidang', BidangController::class);
    Route::get('/export/bidang/', [BidangController::class, 'export']);
    Route::post('/import/bidang/', [BidangController::class, 'import'])->name('import-bidang');
    // Data Jabatan
    Route::resource('/jabatan', JabatanController::class);
    Route::get('/export/jabatan/', [JabatanController::class, 'export']);
    Route::post('/import/jabatan/', [JabatanController::class, 'import'])->name('import-jabatan');
    // Route Presensi
    Route::get('/aturan-presensi', [PresensiController::class, 'aturanPresensi'])->name('aturanPresensi');
    Route::put('/aturan-presensi/update/{id}', [PresensiController::class, 'updateAturanPresensi'])->name('updateAturanPresensi');
    Route::get('/rekap-presensi', [PresensiController::class, 'rekapPresensi'])->name('rekapPresensi');
    // Route Perjalanan Dinas
    Route::get('/perjalanan-dinas', [PerjalananDinasController::class, 'index'])->name('perjalananDinas');
    Route::post('/perjalanan-dinas/store', [PerjalananDinasController::class, 'store'])->name('storePerjalananDinas');
    Route::delete('/perjalanan-dinas/destroy/{id}', [PerjalananDinasController::class, 'destroy'])->name('destroyPerjalananDinas');
    // Route Pelatihan
    Route::get('/pelatihan', [PelatihanController::class, 'index'])->name('pelatihan');
    Route::post('/pelatihan/store', [PelatihanController::class, 'storePelatihan'])->name('storePelatihan');
    Route::delete('/pelatihan/destroy/{id}', [PelatihanController::class, 'destroyPelatihan'])->name('destroyPelatihan');
    // Route Reward & Punishment
    Route::get('/reward-punishment', [RewardPunishmentController::class, 'index'])->name('reward');
    Route::post('/reward-punishment/store', [RewardPunishmentController::class, 'store'])->name('storeRewardPunishment');
    Route::delete('/reward-punishment/destroy/{id}', [RewardPunishmentController::class, 'destroy'])->name('destroyRewardPunishment');
    // Route Data Pengguna
    Route::resource('/user', UserController::class);
});

// All routing javascript
Route::post('/cari-pegawai', [FunctionController::class, 'cariPegawai'])->name('cariPegawai');
Route::post('/cari-jabatan', [FunctionController::class, 'cariJabatan'])->name('cariJabatan');
Route::post('/cari-golongan', [FunctionController::class, 'cariGolongan'])->name('cariGolongan');
Route::post('/cari-kota', [FunctionController::class, 'cariKota'])->name('cariKota');
Route::post('/cari-kecamatan', [FunctionController::class, 'cariKecamatan'])->name('cariKecamatan');
Route::post('/cari-desa', [FunctionController::class, 'cariDesa'])->name('cariDesa');
Route::post('/cari-kode-pos', [FunctionController::class, 'cariKodePos'])->name('cariKodePos');
// All routing karyawan
Route::group(['middleware' => ['auth', 'checkRole:admin,user']], function () {
    // Route Dashboard
    Route::get('/', [DashboardController::class, 'index']);
    Route::group(['middleware' => ['auth', 'checkRole:user']], function () {
        // Route Profil
        Route::get('/profil', [KaryawanController::class, 'profil'])->name('profil');
        Route::get('/profil/edit/{id}', [KaryawanController::class, 'editProfil'])->name('editProfil');
        Route::put('/profil/update/{id}', [KaryawanController::class, 'updateProfil'])->name('updateProfil');
        // Route Pemberkasan
        Route::get('/pemberkasan', [KaryawanController::class, 'pemberkasan'])->name('pemberkasan');
        Route::post('/pemberkasan/store', [KaryawanController::class, 'storePemberkasan'])->name('storePemberkasan');
        Route::delete('/pemberkasan/destroy/{id}', [KaryawanController::class, 'destroyPemberkasan'])->name('destroyPemberkasan');
        // Route Prensensi
        Route::group(['middleware' => ['auth', 'checkIP']], function () {
            Route::get('/presensi', [KaryawanController::class, 'presensi'])->name('presensi');
            Route::post('/presensi/absen-masuk', [KaryawanController::class, 'absenMasuk'])->name('absenMasuk');
            Route::put('/presensi/absen-pulang', [KaryawanController::class, 'absenPulang'])->name('absenPulang');
        });
    });
});
