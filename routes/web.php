<?php

use App\Http\Controllers\AccessMenuController;
use App\Http\Controllers\AddUserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Jadwal10Controller;
use App\Http\Controllers\Jadwal11Controller;
use App\Http\Controllers\Jadwal12Controller;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\MatapelajaranController;
use App\Http\Controllers\MateriController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\NilaiController;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ResponseController;
use App\Http\Controllers\SubMenuController;
use App\Http\Controllers\TahunController;
use App\Http\Controllers\Ulangan10Controller;
use App\Http\Controllers\Ulangan11Controller;
use App\Http\Controllers\Ulangan12Controller;
use App\Http\Controllers\UsersiswaControlelr;
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

Route::get('/', function () {
    return view('home.index');
});

Route::middleware(['auth', 'admin'])->group(function () {
    
    Route::get('/menu', [MenuController::class,'index'])->name('menu');
    Route::post('/menu/edit', [MenuController::class, 'editMenu']);
    Route::post('/menu/store', [MenuController::class,'storeMenu']);
    Route::post('/menu/update/{menu}', [MenuController::class, 'updateMenu']);
    Route::delete('/menu/delete/{menu}', [MenuController::class, 'destroy']);
    
    Route::get('/submenu', [SubMenuController::class,'index'])->name('submenu');
    Route::post('/submenu/edit', [SubMenuController::class, 'editsubmenu']);
    Route::post('/submenu/store', [SubMenuController::class,'storesubmenu']);
    Route::post('/submenu/update/{subMenu}', [SubMenuController::class, 'updatesubmenu']);
    Route::delete('/submenu/delete/{subMenu}', [SubMenuController::class, 'destroy']);
    
    Route::get('/accessmenu', [AccessMenuController::class,'index'])->name('accessmenu');
    Route::post('/accessmenu/edit', [AccessMenuController::class, 'editAccessmenu']);
    Route::post('/accessmenu/store', [AccessMenuController::class,'storeAccessmenu']);
    Route::post('/accessmenu/update/{accessMenu}', [AccessMenuController::class, 'updateAccessmenu']);
    Route::delete('/accessmenu/delete/{accessMenu}', [AccessMenuController::class, 'destroy']);

    Route::get('/jadwal10', [Jadwal10Controller::class, 'index'])->name('jadwal10');
    Route::post('/jadwal10/edit', [Jadwal10Controller::class, 'editJadwal10']);
    Route::post('/jadwal10/store', [Jadwal10Controller::class, 'storeJadwal10']);
    Route::post('/jadwal10/update/{jadwal10}', [Jadwal10Controller::class, 'updateJadwal10']);
    Route::delete('/jadwal10/delete/{jadwal10}', [Jadwal10Controller::class, 'destroy']);
    
    Route::get('/jadwal11', [Jadwal11Controller::class, 'index'])->name('jadwal11');
    Route::post('/jadwal11/edit', [Jadwal11Controller::class, 'editJadwal11']);
    Route::post('/jadwal11/store', [Jadwal11Controller::class, 'storeJadwal11']);
    Route::post('/jadwal11/update/{jadwal11}', [Jadwal11Controller::class, 'updateJadwal11']);
    Route::delete('/jadwal11/delete/{jadwal11}', [Jadwal11Controller::class, 'destroy']);
    
    Route::get('/jadwal12', [Jadwal12Controller::class, 'index'])->name('jadwal12');
    Route::post('/jadwal12/edit', [Jadwal12Controller::class, 'editJadwal12']);
    Route::post('/jadwal12/store', [Jadwal12Controller::class, 'storeJadwal12']);
    Route::post('/jadwal12/update/{jadwal12}', [Jadwal12Controller::class, 'updateJadwal12']);
    Route::delete('/jadwal12/delete/{jadwal12}', [Jadwal12Controller::class, 'destroy']);
    
    Route::get('/ulangan10', [Ulangan10Controller::class, 'index'])->name('ulangan10');
    Route::post('/ulangan10/edit', [Ulangan10Controller::class, 'editUlangan10']);
    Route::post('/ulangan10/store', [Ulangan10Controller::class, 'storeUlangan10']);
    Route::post('/ulangan10/update/{ulangan10}', [Ulangan10Controller::class, 'updateUlangan10']);
    Route::delete('/ulangan10/delete/{ulangan10}', [Ulangan10Controller::class, 'destroy']);
    
    Route::get('/ulangan11', [Ulangan11Controller::class, 'index'])->name('ulangan11');
    Route::post('/ulangan11/edit', [Ulangan11Controller::class, 'editUlangan11']);
    Route::post('/ulangan11/store', [Ulangan11Controller::class, 'storeUlangan11']);
    Route::post('/ulangan11/update/{ulangan11}', [Ulangan11Controller::class, 'updateUlangan11']);
    Route::delete('/ulangan11/delete/{ulangan11}', [Ulangan11Controller::class, 'destroy']);
    
    Route::get('/ulangan12', [Ulangan12Controller::class, 'index'])->name('ulangan12');
    Route::post('/ulangan12/edit', [Ulangan12Controller::class, 'editUlangan12']);
    Route::post('/ulangan12/store', [Ulangan12Controller::class, 'storeUlangan12']);
    Route::post('/ulangan12/update/{ulangan12}', [Ulangan12Controller::class, 'updateUlangan12']);
    Route::delete('/ulangan12/delete/{ulangan12}', [Ulangan12Controller::class, 'destroy']);
    
    Route::get('/jurusan', [JurusanController::class, 'index'])->name('jurusan');
    Route::post('/jurusan/edit', [JurusanController::class, 'editJurusan']);
    Route::post('/jurusan/store', [JurusanController::class, 'storeJurusan']);
    Route::post('/jurusan/update/{jurusan}', [JurusanController::class, 'updateJurusan']);
    Route::delete('/jurusan/delete/{jurusan}', [JurusanController::class, 'destroy']);
    
    Route::get('/matapelajaran', [MatapelajaranController::class, 'index'])->name('matapelajaran');
    Route::post('/matapelajaran/edit', [MatapelajaranController::class, 'editMatapelajaran']);
    Route::post('/matapelajaran/store', [MatapelajaranController::class, 'storeMatapelajaran']);
    Route::post('/matapelajaran/update/{matapelajaran}', [MatapelajaranController::class, 'updateMatapelajaran']);
    Route::delete('/matapelajaran/delete/{matapelajaran}', [MatapelajaranController::class, 'destroy']);
    
    Route::get('/tahun', [TahunController::class, 'index'])->name('tahun');
    Route::post('/tahun/edit', [TahunController::class, 'editTahun']);
    Route::post('/tahun/store', [TahunController::class, 'storeTahun']);
    Route::post('/tahun/update/{tahun}', [TahunController::class, 'updateTahun']);
    Route::delete('/tahun/delete/{tahun}', [TahunController::class, 'destroy']);
    
    Route::get('/pendaftaran/show',[PendaftaranController::class,'ShowOfPendaftaran'])->name('showpendaftaran');
    Route::post('/pendaftaran/edit',[PendaftaranController::class,'editOfPendaftaran']);
    Route::post('/pendaftaran/update/{pendaftaran}',[PendaftaranController::class,'updateOfPendaftaran']);
    
    Route::get('/user', [AddUserController::class, 'ViewUser'])->name('user');
    Route::post('/user/edit', [AddUserController::class, 'editUser']);
    Route::post('/user/store', [AddUserController::class, 'create']);
    Route::post('/user/update/{user}', [AddUserController::class, 'updateUser']);
    Route::delete('/user/delete/{user}', [AddUserController::class, 'destroy']);
});

Route::middleware(['auth', 'guru'])->group(function () {
    
    Route::get('/materi', [MateriController::class,'index'])->name('materi');
    Route::post('/materi/edit', [MateriController::class, 'editMateri']);
    Route::post('/materi/store', [MateriController::class,'storeMateri']);
    Route::post('/materi/update/{materi}', [MateriController::class, 'updateMateri']);
    Route::delete('/materi/delete/{materi}', [MateriController::class, 'destroy']);

    Route::get('/inputnilai',[NilaiController::class,'index'])->name('nilai');
    Route::post('/inputnilai',[NilaiController::class,'storeNilai']);
    Route::post('/inputnilai/edit', [NilaiController::class, 'editNilai']);
    Route::post('/inputnilai/update/{nilai}', [NilaiController::class, 'updateNilai']);
    Route::delete('/inputnilai/delete/{nilai}', [NilaiController::class, 'destroy']);
});

Route::middleware(['auth', 'siswa'])->group(function () {
    
    Route::get('/nilai',[UsersiswaControlelr::class,'nilai']);
    Route::get('/ujian',[UsersiswaControlelr::class,'ujian']);
});

Route::middleware(['auth'])->group(function () {
    
    Route::get('/profile', [ProfileController::class,'index'])->name('myprofile');
    Route::patch('/profile', [ProfileController::class,'store']);
});

Route::get('/pendaftaran',[PendaftaranController::class,'ViewOfPendaftaran'])->name('pendaftaran');
Route::post('/pendaftaran',[PendaftaranController::class,'StoreOfPendaftaran']);
Route::post('/kabupaten',[ResponseController::class,'Kabupaten']);
Route::post('/kecamatan',[ResponseController::class,'Kecamatan']);

Route::get('/home',[HomeController::class,'index'])->name('home');