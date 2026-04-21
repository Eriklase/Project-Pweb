<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// Route Login Manual
Route::get('/login', [App\Http\Controllers\LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [App\Http\Controllers\LoginController::class, 'login']);

Route::get('/register', [App\Http\Controllers\RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [App\Http\Controllers\RegisterController::class, 'register']);


Route::post('/logout', [App\Http\Controllers\LoginController::class, 'logout'])->name('logout');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/profile', [App\Http\Controllers\HomeController::class, 'profile'])->name('profile');
Route::get('/settings', [App\Http\Controllers\HomeController::class, 'settings'])->name('settings');
Route::get('/about', [App\Http\Controllers\HomeController::class, 'about'])->name('about');

// Admin Routes
Route::middleware(['auth', 'role:admin'])->prefix('admin')->group(function () {
    Route::get('/', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.dashboard');
    
    // Mahasiswa CRUD
    Route::get('/mahasiswa', [App\Http\Controllers\AdminController::class, 'mahasiswas'])->name('admin.mahasiswa');
    Route::get('/mahasiswa/create', [App\Http\Controllers\AdminController::class, 'createMahasiswa'])->name('admin.mahasiswa.create');
    Route::post('/mahasiswa/store', [App\Http\Controllers\AdminController::class, 'storeMahasiswa'])->name('admin.mahasiswa.store');
    Route::get('/mahasiswa/edit/{id}', [App\Http\Controllers\AdminController::class, 'editMahasiswa'])->name('admin.mahasiswa.edit');
    Route::put('/mahasiswa/update/{id}', [App\Http\Controllers\AdminController::class, 'updateMahasiswa'])->name('admin.mahasiswa.update');
    Route::delete('/mahasiswa/delete/{id}', [App\Http\Controllers\AdminController::class, 'deleteMahasiswa'])->name('admin.mahasiswa.delete');

    // Dosen CRUD
    Route::get('/dosen', [App\Http\Controllers\AdminController::class, 'dosens'])->name('admin.dosen');
    Route::get('/dosen/create', [App\Http\Controllers\AdminController::class, 'createDosen'])->name('admin.dosen.create');
    Route::post('/dosen/store', [App\Http\Controllers\AdminController::class, 'storeDosen'])->name('admin.dosen.store');
    Route::get('/dosen/edit/{id}', [App\Http\Controllers\AdminController::class, 'editDosen'])->name('admin.dosen.edit');
    Route::put('/dosen/update/{id}', [App\Http\Controllers\AdminController::class, 'updateDosen'])->name('admin.dosen.update');
    Route::delete('/dosen/delete/{id}', [App\Http\Controllers\AdminController::class, 'deleteDosen'])->name('admin.dosen.delete');

    // Matakuliah CRUD
    Route::get('/matakuliah', [App\Http\Controllers\AdminController::class, 'matakuliah'])->name('admin.matakuliah');
    Route::get('/matakuliah/create', [App\Http\Controllers\AdminController::class, 'createMatakuliah'])->name('admin.matakuliah.create');
    Route::post('/matakuliah/store', [App\Http\Controllers\AdminController::class, 'storeMatakuliah'])->name('admin.matakuliah.store');
    Route::get('/matakuliah/edit/{id}', [App\Http\Controllers\AdminController::class, 'editMatakuliah'])->name('admin.matakuliah.edit');
    Route::put('/matakuliah/update/{id}', [App\Http\Controllers\AdminController::class, 'updateMatakuliah'])->name('admin.matakuliah.update');
    Route::delete('/matakuliah/delete/{id}', [App\Http\Controllers\AdminController::class, 'deleteMatakuliah'])->name('admin.matakuliah.delete');
});

// Dosen Routes
Route::middleware(['auth', 'role:dosen'])->prefix('dosen')->group(function () {
    Route::get('/', [App\Http\Controllers\DosenController::class, 'index'])->name('dosen.dashboard');
    Route::get('/nilai/{jadwal_id}', [App\Http\Controllers\DosenController::class, 'inputNilai'])->name('dosen.nilai.input');
});

// Mahasiswa Routes
Route::middleware(['auth', 'role:mahasiswa'])->prefix('mahasiswa')->group(function () {
    Route::get('/', [App\Http\Controllers\MahasiswaController::class, 'index'])->name('mahasiswa.dashboard');
    Route::get('/krs', [App\Http\Controllers\MahasiswaController::class, 'krs'])->name('mahasiswa.krs');
    Route::get('/khs', [App\Http\Controllers\MahasiswaController::class, 'khs'])->name('mahasiswa.khs');
});
