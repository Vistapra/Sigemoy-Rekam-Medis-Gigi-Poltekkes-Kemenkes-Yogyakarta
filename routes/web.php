<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IcdController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\TogaController;
use App\Http\Controllers\RekamController;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\EdukasiController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\OpsiViewController;
use App\Http\Controllers\TindakanController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KuisionerController;
use App\Http\Controllers\RekamGigiController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\NamaKondisiGigiController;
use App\Http\Controllers\PengeluaranObatController;
use App\Http\Controllers\RekamMedisKaderController;
use App\Http\Controllers\RekamPemeriksaanController;



route::get('/', [FrontendController::class, 'sigemoy'])->name('sigemoy');

Route::get('/multilogin', [AuthController::class, 'page_login'])->name('login');
Route::get('/loginkader', [AuthController::class, 'kader_kesehatan'])->name('login_kader_kesehatan');
Route::get('/loginterapis', [AuthController::class, 'terapis_gigi'])->name('login_terapis_gigi');


Route::post('/login', [AuthController::class, 'auth'])->name('login.auth');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/loaddata', [RekamPemeriksaanController::class, 'insertToTableNew'])->name('loaddata');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/getDokter', [DokterController::class, 'getDokter'])->name('getDokter');

    Route::get('/dokter', [DokterController::class, 'index'])->name('dokter');
    Route::post('/dokter/store', [DokterController::class, 'store'])->name('dokter.store');
    Route::post('/dokter/{id}/update', [DokterController::class, 'update'])->name('dokter.update');
    Route::get('/dokter/{id}/delete', [DokterController::class, 'delete'])->name('dokter.delete');
    Route::post('/dokter/{id}/gantipassword', [DokterController::class, 'updatepassword'])->name('dokter.gantipassword');

    Route::post('/gantipassword/{id}', [AuthController::class, 'updatepassword'])->name('gantipassword');
    Route::get('/petugas', [PetugasController::class, 'index'])->name('petugas');
    Route::post('/petugas/store', [PetugasController::class, 'store'])->name('petugas.store');
    Route::post('/petugas/{id}/update', [PetugasController::class, 'update'])->name('petugas.update');
    Route::delete('/petugas/{id}/delete', [PetugasController::class, 'delete'])->name('petugas.delete');

    Route::get('/getNoRM', [PasienController::class, 'getLastRM'])->name('getNoRM');

    Route::get('/pasien', [PasienController::class, 'index'])->name('pasien');
    Route::get('/pasien/add', [PasienController::class, 'add'])->name('pasien.add');
    Route::get('/pasien/{id}/edit', [PasienController::class, 'edit'])->name('pasien.edit');
    Route::get('/pasien/{id}/delete', [PasienController::class, 'delete'])->name('pasien.delete');
    Route::get('/pasien/json', [PasienController::class, 'json'])->name('pasien.json');
    Route::get('/pasien/{id}/file', [PasienController::class, 'file'])->name('pasien.file');

    Route::post('/pasien/store', [PasienController::class, 'store'])->name('pasien.store');
    Route::post('/pasien/{id}/update', [PasienController::class, 'update'])->name('pasien.update');

    Route::get('/pembayaran', [PembayaranController::class, 'index'])->name('pembayaran');

    Route::get('/obat/json', [ObatController::class, 'data'])->name('obat.data');
    Route::get('/obat', [ObatController::class, 'index'])->name('obat');
    Route::post('/obat/store', [ObatController::class, 'store'])->name('obat.store');
    Route::post('/obat/{id}/update', [ObatController::class, 'update'])->name('obat.update');
    Route::get('/obat/{id}/delete', [ObatController::class, 'delete'])->name('obat.delete');

    Route::get('/icd', [IcdController::class, 'index'])->name('icd.index');
    Route::get('/icd/data', [IcdController::class, 'data'])->name('icd.data');
    Route::post('/icd', [IcdController::class, 'store'])->name('icd.store');
    Route::put('/icd/{code}', [IcdController::class, 'update'])->name('icd.update');
    Route::delete('/icd/{code}', [IcdController::class, 'destroy'])->name('icd.destroy');

    Route::get('/tindakan', [TindakanController::class, 'index'])->name('tindakan.index');
    Route::get('/tindakan/data', [TindakanController::class, 'data'])->name('tindakan.data');
    Route::post('/tindakan', [TindakanController::class, 'store'])->name('tindakan.store');
    Route::get('/tindakan/{id}/edit', [TindakanController::class, 'edit'])->name('tindakan.edit');
    Route::put('/tindakan/{id}', [TindakanController::class, 'update'])->name('tindakan.update');
    Route::delete('/tindakan/{id}', [TindakanController::class, 'destroy'])->name('tindakan.destroy');

    Route::get('/rekam', [RekamController::class, 'index'])->name('rekam');
    Route::get('/rekam/add', [RekamController::class, 'add'])->name('rekam.add');
    Route::get('/rekam/{pasienid}/tambah', [RekamController::class, 'tambah'])->name('rekam.tambah');
    Route::get('/rekam/{id}/edit', [RekamController::class, 'edit'])->name('rekam.edit');

    Route::post('/rekam/pasie/store', [RekamController::class, 'store'])->name('rekam.store');
    Route::get('/rekam/pasien/{id}', [RekamController::class, 'detail'])->name('rekam.detail');

    Route::get('/rekam/{id}/delete', [RekamController::class, 'delete'])->name('rekam.delete');
    Route::post('/rekam/pasien/{id}/update', [RekamController::class, 'update'])->name('rekam.update');

    Route::prefix('rekam/gigi')->name('rekam.gigi.')->group(function () {
        Route::get('/{pasienId}', [RekamGigiController::class, 'index'])->name('add');
        Route::post('/{pasienId}/store', [RekamGigiController::class, 'store'])->name('store');
        Route::get('/{pasienId}/odontogram', [RekamGigiController::class, 'odontogram'])->name('odontogram');
        Route::get('/{pasienid}/edit', [RekamGigiController::class, 'edit'])->name('edit');
        Route::put('/{pasienid}', [RekamGigiController::class, 'update'])->name('update');
        Route::delete('/{id}', [RekamGigiController::class, 'delete'])->name('delete');
    });

    Route::post('/rekam/pemeriksaan/update', [RekamPemeriksaanController::class, 'pemeriksaan'])->name('pemeriksaan.update');
    Route::post('/rekam/tindakan/update', [RekamPemeriksaanController::class, 'tindakan'])->name('tindakan.update');
    Route::post('/rekam/diagnosa/update', [RekamPemeriksaanController::class, 'diagnosa'])->name('diagnosa.update');
    Route::post('/rekam/resep-obat/update', [RekamPemeriksaanController::class, 'resep'])->name('resep.update');

    Route::get('/rekam/diagnosa/delete/{id}', [RekamPemeriksaanController::class, 'diagnosa_delete'])->name('rekam.diagnosa.delete');



    Route::get('/rekam/pasien/resep', [RekamController::class, 'detail'])->name('rekam.upload');

    Route::get('/obat/resep', [PengeluaranObatController::class, 'resep'])->name('obat.resep');
    Route::get('/obat/resep/pengeluaran/{id}', [PengeluaranObatController::class, 'pengeluaran'])->name('obat.pengeluaran');
    Route::post('/obat/pengeluaran/store', [PengeluaranObatController::class, 'store'])->name('obat.pengeluaran.store');
    Route::get('/obat/riwayat', [PengeluaranObatController::class, 'riwayat'])->name('obat.riwayat');


    Route::get('/rekam/file/{id}/{type}', [RekamPemeriksaanController::class, 'file'])->name('pem.file');

    //toga
    Route::prefix('toga')->name('toga.')->group(function () {
        Route::get('/', [TogaController::class, 'index'])->name('index');
        Route::get('/create', [TogaController::class, 'create'])->name('create');
        Route::post('/', [TogaController::class, 'store'])->name('store');
        Route::get('/{toga}', [TogaController::class, 'show'])->name('show');
        Route::get('/{toga}/edit', [TogaController::class, 'edit'])->name('edit');
        Route::put('/{toga}', [TogaController::class, 'update'])->name('update');
        Route::delete('/{toga}', [TogaController::class, 'destroy'])->name('destroy');
    });

    //Edukasi
    Route::prefix('edukasi')->name('edukasi.')->group(function () {
        Route::get('/edukasi', [EdukasiController::class, 'index'])->name('index');
        Route::get('/create', [EdukasiController::class, 'create'])->name('create');
        Route::post('/store', [EdukasiController::class, 'store'])->name('store');
        Route::get('/{edukasi}', [EdukasiController::class, 'show'])->name('show');
        Route::get('/{edukasi}/edit', [EdukasiController::class, 'edit'])->name('edit');
        Route::put('/{edukasi}', [EdukasiController::class, 'update'])->name('update');
        Route::delete('/{edukasi}', [EdukasiController::class, 'destroy'])->name('destroy');
    });

    // NamaKondisiGigi routes
    Route::prefix('rekammediskader')->name('rekammediskader.')->group(function () {
        Route::get('/', [NamaKondisiGigiController::class, 'index'])->name('index');
        Route::post('/rekammediskader', [NamaKondisiGigiController::class, 'store'])->name('store');
        Route::put('/rekamediskader/{id}', [NamaKondisiGigiController::class, 'update'])->name('update');
        Route::delete('/rekammediskader/{id}', [NamaKondisiGigiController::class, 'destroy'])->name('destroy');
    });

    //kuisioner
    Route::group(['prefix' => 'kuisioner', 'as' => 'kuisioner.'], function () {
        Route::get('/', [KuisionerController::class, 'index'])->name('index');

        // Kategori
        Route::get('/create', [KuisionerController::class, 'create'])->name('create');
        Route::post('/store', [KuisionerController::class, 'store'])->name('store');
        Route::get('/kategori/edit/{id}', [KuisionerController::class, 'editKategori'])->name('editKategori');
        Route::put('/kategori/update/{id}', [KuisionerController::class, 'updateKategori'])->name('updateKategori');
        Route::delete('/kategori/delete/{id}', [KuisionerController::class, 'deleteKategori'])->name('deleteKategori');

        // Pertanyaan
        Route::get('/{kategori_id}/create-pertanyaan', [KuisionerController::class, 'createPertanyaan'])->name('createPertanyaan');
        Route::post('/{kategori_id}/store-pertanyaan', [KuisionerController::class, 'storePertanyaan'])->name('storePertanyaan');
        Route::get('/pertanyaan/edit/{id}', [KuisionerController::class, 'editPertanyaan'])->name('editPertanyaan');
        Route::put('/pertanyaan/update/{id}', [KuisionerController::class, 'updatePertanyaan'])->name('updatePertanyaan');
        Route::delete('/pertanyaan/delete/{id}', [KuisionerController::class, 'deletePertanyaan'])->name('deletePertanyaan');

        // Opsi Jawaban
        Route::get('/{pertanyaan_id}/create-opsi-jawaban', [KuisionerController::class, 'createOpsiJawaban'])->name('createOpsiJawaban');
        Route::post('/{pertanyaan_id}/store-opsi-jawaban', [KuisionerController::class, 'storeOpsiJawaban'])->name('storeOpsiJawaban');
        Route::get('/opsi-jawaban/edit/{id}', [KuisionerController::class, 'editOpsiJawaban'])->name('editOpsiJawaban');
        Route::put('/opsi-jawaban/update/{id}', [KuisionerController::class, 'updateOpsiJawaban'])->name('updateOpsiJawaban');
        Route::delete('/opsi-jawaban/delete/{id}', [KuisionerController::class, 'deleteOpsiJawaban'])->name('deleteOpsiJawaban');


        // Jawaban Kuisioner
        Route::get('/{pasien_id}/jawab', [KuisionerController::class, 'jawabKuisioner'])->name('jawabKuisioner');
        Route::post('/{pasien_id}/simpan-jawaban', [KuisionerController::class, 'simpanJawaban'])->name('simpanJawaban');
    });

    Route::prefix('rekammediskaderkesehatan')->name('rekammediskaderkesehatan.')->group(function () {
        Route::get('/', [RekamMedisKaderController::class, 'index'])->name('index');
        Route::get('/export', [RekamMedisKaderController::class, 'export'])->name('export');
        Route::get('/create/{pasien_id}', [RekamMedisKaderController::class, 'create'])->name('create');
        Route::post('/', [RekamMedisKaderController::class, 'store'])->name('store');
        Route::get('/{rekamMedisKader}', [RekamMedisKaderController::class, 'show'])->name('show');
        Route::get('/{rekamMedisKader}/edit', [RekamMedisKaderController::class, 'edit'])->name('edit');
        Route::put('/{rekamMedisKader}', [RekamMedisKaderController::class, 'update'])->name('update');
        Route::delete('/{rekamMedisKader}', [RekamMedisKaderController::class, 'destroy'])->name('destroy');
    });

    Route::prefix('opsiview')->name('opsiview.')->group(function () {
        Route::get('/opsiedukasi', [OpsiViewController::class, 'opsiedukasi'])->name('opsiedukasi');
        Route::get('/opsisetelahedukasi', [OpsiViewController::class, 'opsisetelahedukasi'])->name('opsisetelahedukasi');
        Route::get('/opsirujukan', [OpsiViewController::class, 'opsirujukan'])->name('opsirujukan');
    });
});