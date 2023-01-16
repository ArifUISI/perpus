<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\PinjamController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('logout', function ()
{
    auth()->logout();
    Session()->flush();

    return Redirect::to('/');
})->name('logout');

//Admin
Route::get('admin', [HomeController::class, 'admin'])->name('admin')->middleware('roleuser');
Route::get('changepassword', [HomeController::class, 'ganti_password'])->middleware('roleuser');
Route::post('change', [HomeController::class, 'update'])->name('change')->middleware('roleuser');

//UserManagement Siswa
Route::get('datasiswa', [AdminController::class, 'siswa'])->name('datasiswa')->middleware('roleuser');
Route::get('edit/siswa/{id}', [AdminController::class, 'show'])->middleware('roleuser');
Route::get('send/siswa/{id}', [AdminController::class, 'send'])->middleware('roleuser');
Route::POST('import/siswa', [AdminController::class, 'import'])->middleware('roleuser');
Route::POST('save/siswa', [AdminController::class, 'store'])->middleware('roleuser');
Route::POST('update/siswa', [AdminController::class, 'update'])->middleware('roleuser');
Route::get('detail/siswa/{id}', [AdminController::class, 'detail'])->middleware('roleuser');
Route::get('delete/siswa/{id}', [AdminController::class, 'destroy'])->middleware('roleuser');
Route::get('deleteall/siswa', [AdminController::class, 'destroy_siswa_all'])->middleware('roleuser');

//Buku
Route::get('databuku', [BukuController::class, 'index'])->name('databuku')->middleware('roleuser');
Route::get('edit/buku/{id}', [BukuController::class, 'show'])->middleware('roleuser');
Route::POST('import/buku', [BukuController::class, 'import'])->middleware('roleuser');
Route::POST('save/buku', [BukuController::class, 'store'])->middleware('roleuser');
Route::POST('update/buku', [BukuController::class, 'update'])->middleware('roleuser');
Route::get('detail/buku/{id}', [BukuController::class, 'detail'])->middleware('roleuser');
Route::get('delete/buku/{id}', [BukuController::class, 'destroy'])->middleware('roleuser');
Route::get('deleteall/buku', [BukuController::class, 'destroy_buku_all'])->middleware('roleuser');

//Pinjam
Route::get('datapinjam', [PinjamController::class, 'index'])->name('datapinjam')->middleware('roleuser');
Route::get('edit/pinjam/{id}', [PinjamController::class, 'show'])->middleware('roleuser');
Route::POST('save/pinjam', [PinjamController::class, 'store'])->middleware('roleuser');
Route::POST('update/pinjam', [PinjamController::class, 'update'])->middleware('roleuser');
Route::get('detail/pinjam/{id}', [PinjamController::class, 'detail'])->middleware('roleuser');
Route::get('delete/pinjam/{id}', [PinjamController::class, 'destroy'])->middleware('roleuser');
Route::get('deleteall/pinjam', [PinjamController::class, 'destroy_pinjam_all'])->middleware('roleuser');

//Siswa
Route::get('tentang', function () { 
    return view('siswa.tentang'); 
})->name('tentang');
//Siswa
Route::get('peminjaman', [PinjamController::class, 'peminjaman'])->name('peminjaman');
Route::POST('save/peminjaman', [PinjamController::class, 'save_peminjaman']);
Route::get('getDataNisn', [PinjamController::class, 'getDataNisn']);
Route::get('print/{id}', [PinjamController::class, 'print']);