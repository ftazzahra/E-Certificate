<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\evController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PrintController;
use App\Http\Controllers\dataController;

// use App\Http\Controllers\ProfilController;
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

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', function () {
    return redirect()->route('event');
    // dd('hello');
})->name('home')->middleware('auth');

Route::resource('users', \App\Http\Controllers\UserController::class)
    ->middleware('auth');

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/admin/dataSertif', [App\Http\Controllers\SiswaController::class, 'index'])->name('sertif');
Route::get('/admin/tambah-data', [SiswaController::class, 'create'])->name('tambah-data');
Route::post('/admin/simpan-data', [SiswaController::class, 'store'])->name('simpan-data');
Route::get('/admin/{id}/edit', [SiswaController::class, 'edit'])->name('edit');
Route::post('/admin/{id}/update', [SiswaController::class, 'update']);
Route::get('/admin/{id}/hapus', [SiswaController::class, 'destroy'])->name('hapus');
Route::get('/admin/cari', [SiswaController::class, 'cari'])->name('cari');
Route::get('/admin/import-file', [SiswaController::class, 'import'])->name('import');
Route::get('/admin/print', [PrintController::class, 'print'])->name('print');

Route::get('/admin/template', [PostController::class, 'index'])->name('template');
Route::get('/admin/tambahtemplate', [PostController::class, 'create'])->name('tambahtplt');
Route::post('/admin/simpan-template', [PostController::class, 'store'])->name('simpan-template');
Route::get('/admin/{id}/editTemplate', [PostController::class, 'editT'])->name('editT');
Route::post('/admin/{id}/updateTemplate', [PostController::class, 'updateT'])->name('updateTemplate');
Route::get('/admin/{id}/hapusTemplate', [PostController::class, 'destroy'])->name('hapusT');
Route::get('/admin/cari-template', [PostController::class, 'search'])->name('search');


Route::get('/admin/event', [HomeController::class, 'index'])->name('event');
// Route::get('/admin/tambah-event', [evController::class, 'createE'])->name('tambah-event');
Route::post('/admin/simpan-event', [HomeController::class, 'storeE'])->name('simpan-event');
Route::get('/admin/{id}/editEvent', [HomeController::class, 'editE'])->name('editE');
Route::post('/admin/{id}/updateEvent', [HomeController::class, 'updateE'])->name('updateE');
Route::get('/admin/{id}/hapusEvent', [HomeController::class, 'destroyE'])->name('hapusE');

Route::get('/admin/img-template', [evController::class, 'show'])->name('lihat');
Route::get('/admin/img', [PrintController::class, 'index'])->name('lihatT');
Route::get('/sertifikat/{siswa}', [PrintController::class, 'sertifikat'])->name('siswa.sertifikat');
Route::get('/data', [dataController::class, 'index'])->name('data');
Route::get('/totaldata', [HomeController::class, 'index'])->name('totaldata');
Route::get('/totaltemplate', [HomeController::class, 'index'])->name('totaltemplate');

