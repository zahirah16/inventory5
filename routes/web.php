<?php

use App\Models\Categories;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\RentController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ItemRentController;
use App\Http\Controllers\MenuUserController;
use App\Http\Controllers\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view ('welcome');
});


Route::middleware('only_guest')->group(function() {
    Route::get('login', [AuthController::class, 'login'])->name('login');
    Route::post('login', [AuthController::class, 'authenticating']);
    Route::get('register', [AuthController::class, 'register']);
    Route::post('register', [AuthController::class, 'RegisterProses']);

});

Route::middleware('auth')->group(function() {
    Route::get('logout', [AuthController::class, 'logout']);
    Route::get('profile', [UserController::class, 'profile'])->middleware(['only_client']);


    Route::get('dashboard', [DashboardController::class, 'index'])->middleware(['only_admin']);

    Route::get('barang', [BarangController::class, 'index']);
    Route::get('barang-add', [BarangController::class, 'add']);
    Route::post('barang-add', [BarangController::class, 'office']);
    Route::get('barang-edit/{slug}', [BarangController::class, 'edit']);
    Route::post('barang-edit/{slug}', [BarangController::class, 'update']);
    Route::get('barang-delete/{slug}', [BarangController::class, 'delete']);
    Route::get('barang-destroy/{slug}', [BarangController::class, 'destroy']);
    Route::get('barang-deleted', [BarangController::class, 'barangDeleted']);
    Route::get('barang-restore/{slug}', [BarangController::class, 'restore']);

    Route::get('categories', [CategoryController::class, 'index']);
    Route::get('category-add', [CategoryController::class, 'add']);
    Route::post('category-add', [CategoryController::class, 'store']);
    Route::get('category-edit/{slug}', [CategoryController::class, 'edit']);
    Route::put('category-edit/{slug}', [CategoryController::class, 'update']);
    Route::get('category-delete/{slug}', [CategoryController::class, 'delete']);
    Route::get('category-destroy/{slug}', [CategoryController::class, 'destroy']);
    Route::get('category-deleted', [CategoryController::class, 'categoryDeleted']);
    Route::get('category-restore/{slug}', [CategoryController::class, 'restore']);

    Route::get('guru', [GuruController::class, 'index']);
    Route::get('guru-add', [GuruController::class, 'add']);
    Route::post('guru-add', [GuruController::class, 'office']);

    Route::get('siswa', [SiswaController::class, 'index']);
    Route::get('siswa-delete/{slug}', [SiswaController::class, 'delete']);
    Route::get('siswa-destroy/{slug}', [SiswaController::class, 'destroy']);
    Route::get('siswa-deleted', [SiswaController::class, 'siswaDeleted']);
    Route::get('siswa-add', [SiswaController::class, 'add']);
    Route::post('siswa-add', [SiswaController::class, 'office']);

    Route::get('/get-kelas/{nama}', [SiswaController::class, 'getKelas']);


    Route::get('user', [UserController::class, 'index']);
    Route::get('registered-user', [UserController::class, 'registeredUser']);
    // Route::get('user-detail/{slug}', [UserController::class, 'show']);
    Route::get('user-approve/{slug}', [UserController::class, 'approve']);
    Route::get('approved/{slug}', [UserController::class, 'sure']);
    Route::get('user-delete/{slug}', [UserController::class, 'delete']);
    Route::get('user-destroy/{slug}', [UserController::class, 'destroy']);
    Route::get('user-deleted', [UserController::class, 'userDeleted']);
    Route::get('user-restore/{slug}', [UserController::class, 'restore']);

    Route::get('item-rent', [ItemRentController::class, 'index']);
    Route::post('item-rent', [ItemRentController::class, 'office']);

    // Route::get('back', [ItemRentController::class, 'kembali']);
    // Route::post('back', [ItemRentController::class, 'simpan']);

    Route::get('back/{slug}', [ItemRentController::class, 'kembali']);
    Route::post('back/{slug}', [ItemRentController::class, 'simpan']);

    Route::post('/pinjam-barang', [ItemRentController::class, 'pinjamBarang']);

    Route::get('rent', [RentController::class, 'index']);


});

if(Auth::user()){
    return redirect()->Route('dashboard');
} 
