<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FasilitatorController;
use App\Http\Controllers\NilaiPesertaController;
use App\Http\Controllers\PesertaController;
use App\http\Controllers\HalamanController;
use App\http\Controllers\TampilanController;
use App\http\Controllers\DashboradController;
use Illuminate\Support\Facades\Mail;
use App\http\Controllers\UserController;
use App\Http\Controllers\ForgotController;



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
    return view('welcome');
});
//
//Route::resource('/fasilitator',FasilitatorController::class);
//menampilkan daftar (indeks) fasilitator
Route::get('/fasilitator', [FasilitatorController::class, 'index'])->name('fasilitator.index');
//Route::get('/fasilitator', 'FasilitatorController@index')->name('fasilitator.index');

//TAMBAH DATA
//menampilkan formulir dan mengirimkan data formulir
Route::get('/fasilitator/create', [FasilitatorController::class, 'create'])->name('fasilitator.create');
Route::post('/fasilitator/insertdata', [FasilitatorController::class, 'insertdata'])->name('fasilitator.insertdata');
//menampilkan detail dari fasilitator tertentu berdasarkan ID (Read DATA)
Route::get('/fasilitator/show/{fasilitator}', [FasilitatorController::class, 'show'])->name('fasilitator.show');
//EDIT DATA
Route::get('/fasilitator/edit/{id}', [FasilitatorController::class, 'edit'])->name('fasilitator.edit');
Route::post('/fasilitator/updatedata/{id}', [FasilitatorController::class, 'updatedata'])->name('fasilitator.updatedata');
//HAPUS DATA
Route::delete('/fasilitator/delete/{id}', [FasilitatorController::class, 'delete'])->name('fasilitator.delete');



Route::get('/peserta', [PesertaController::class, 'index'])->name('peserta.datapeserta');;
Route::post('/peserta/insertdata', [PesertaController::class, 'insertdata'])->name('peserta.insertdata');

Route::get('/peserta/tambahpeserta', [PesertaController::class, 'tambahpeserta'])->name('peserta.tambahpeserta');
Route::get('/peserta/tampilkandata/{id}', [PesertaController::class, 'tampilkandata'])->name('peserta.tampilkandata');

Route::get('/peserta/editdata/{id}', [PesertaController::class, 'editdata'])->name('peserta.editdata');
Route::put('/peserta/updatedata/{id}', [PesertaController::class, 'updatedata'])->name('peserta.updatedata');

Route::get('/peserta/delete/{id}', [PesertaController::class, 'delete'])->name('peserta.delete');





Route::get('/nilai_peserta', [NilaiPesertaController::class, 'index'])->name('nilai_peserta.index');
Route::get('/nilai_peserta/create', [NilaiPesertaController::class, 'create'])->name('nilai_peserta.create');
Route::post('/nilai_peserta', [NilaiPesertaController::class, 'store'])->name('nilai_peserta.store');

// Rute untuk menampilkan detail data
Route::get('/nilai_peserta/show/{id}', [NilaiPesertaController::class, 'show'])->name('nilai_peserta.view');

// Rute untuk menampilkan halaman edit data
Route::get('/nilai_peserta/edit/{id}', [NilaiPesertaController::class, 'edit'])->name('nilai_peserta.edit');

// Rute untuk mengupdate data setelah proses edit
Route::put('/nilai_peserta/update{id}', [NilaiPesertaController::class, 'update'])->name('nilai_peserta.update');

// Rute untuk menghapus data
Route::delete('/nilai_peserta/delete{id}', [NilaiPesertaController::class, 'destroy'])->name('nilai_peserta.delete');

Route::get('/halaman/index', [HalamanController::class, 'index']);
Route::post('/halaman/login', [HalamanController::class, 'login']);

Route::get('/halaman/logout', [HalamanController::class, 'logout']);

Route::get('/register', [HalamanController::class, 'register']);
Route::post('/halaman/create', [HalamanController::class, 'create']);

Route::get('/halaman/forgot', [HalamanController::class, 'forgot']);

Route::get('/halaman/utama', [HalamanController::class, 'utama']);
// Rute untuk menampilkan halaman dasboard
Route::get('/menu/menuutama',[TampilanController::class, 'menuutama',]);

Route::get('dashboard', function(){
    return view('dashboard');
})->name('dashboard');

// Route::get('/fasil/dashboard', function(){
//     return view('fasilitator.dashboard');
// })->name('fasilitator.dashboard');

Route::get('/dashboard', [App\Http\Controllers\DashboradController::class, 'index'])->name('dashboard');
// ADMIN
/*Route::get('/admin/dashboard', [AdminDashboradController::class, 'index']);
//halaman peserta admin
Route::post('/admin/peserta', [AdminPesertaController::class, 'insertdata']);
Route::get('/admin/peserta', [AdminPesertaController::class, 'index']);
Route::get('/admin/peserta/create', [AdminPesertaController::class, 'create']);
Route::post('/admin/peserta/insertdata', [AdminPesertaController::class, 'insertdata'])->name('admin.peserta.insertdata');
Route::get('/admin/peserta/tampilkandata/{id}', [AdminPesertaController::class, 'tampilkandata'])->name('peserta.tampilkandata');
Route::get('/admin/peserta/delete/{id}', [AdminPesertaController::class, 'delete']);
Route::get('/admin/peserta/edit/{id}', [AdminPesertaController::class, 'editdata'])->name('admin.peserta.edit');
Route::put('/admin/peserta/updatedata/{id}', [AdminPesertaController::class, 'updatedata'])->name('peserta.updatedata');
// Route::put('/admin/peserta/{id}', [AdminPesertaController::class, 'updatedata']);



// admin fasil
Route::get('/admin/fasilitator', [AdminFasilitatorController::class, 'index']);
// Route::get('/admin/fasilitator/create', [AdminFasilitatorController::class, 'create']);
Route::get('/admin/fasilitator/create',[AdminFasilitatorController::class, 'create']);

//aaaa
Route::post('/admin/fasilitator', [AdminFasilitatorController::class, 'insertdata']);
//menampilkan detail dari fasilitator tertentu berdasarkan ID (Read DATA)
Route::get('/admin/fasilitator/show/{fasilitator}', [AdminFasilitatorController::class, 'show']);
//EDIT DATA
Route::get('/admin/fasilitator/edit/{id}', [AdminFasilitatorController::class, 'edit'])->name('fasilitator.edit');
Route::post('/admin/fasilitator/updatedata/{id}', [AdminFasilitatorController::class, 'updatedata']);
//HAPUS DATA
Route::delete('/admin/fasilitator/delete/{id}', [AdminFasilitatorController::class, 'delete'])->name('fasilitator.delete');
// Route::get('/fasilitatorr/show/{fasilitator}', [AdminFasilitatorController::class, 'show'])->name('fasilitator.show');

Route::get('/admin/fasilitator/show', [AdminFasilitatorController::class, 'show']);
*/

//route login
Route::get('/halaman/index', [HalamanController::class, 'index']);
Route::post('/halaman/login', [HalamanController::class, 'login']);
//route logout
Route::get('/halaman/logout', [HalamanController::class, 'logout']);
//route regis peserta
Route::get('/register', [HalamanController::class, 'register']);
Route::post('/halaman/create', [HalamanController::class, 'create']);
//route regis fasilitator
Route::get('/fasilitatorr', [HalamanController::class, 'fasilitator']);
Route::post('/halaman/create1', [HalamanController::class, 'create1']);
//route regis superadmin
Route::get('/superadmin', [HalamanController::class, 'superadmin']);
Route::post('/halaman/create2', [HalamanController::class, 'create2']);
//route forgot
Route::get('/forgot', [ForgotController::class, 'forgot']);
Route::post('/halaman/create3', [ForgotController::class, 'create3']);
//route reset password
Route::get('/reset/{token}', [ForgotController::class, 'reset'])->name('reset.password');
Route::post('/reset-password', [ForgotController::class, 'passwordpost']);
//route halaman utama
Route::get('/softskill/ump', [HalamanController::class, 'utama']);
// Rute untuk menampilkan halaman dasboard
Route::get('/menu/menuutama',[TampilanController::class, 'menuutama',]);

Route::get('/profile', [HalamanController::class, 'profile'])->name('profile');
