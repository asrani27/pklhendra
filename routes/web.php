<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StafController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PrintController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\StafTTController;
use App\Http\Controllers\StafBKUController;
use App\Http\Controllers\StafNPDController;
use App\Http\Controllers\StafSPJController;
use App\Http\Controllers\AdminBKUController;
use App\Http\Controllers\AdminNPDController;
use App\Http\Controllers\AdminSPJController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\BendaharaController;
use App\Http\Controllers\PencairanController;
use App\Http\Controllers\StafSPTJBController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\AdminSPTJBController;
use App\Http\Controllers\PengeluaranController;
use App\Http\Controllers\StafLaporanController;
use App\Http\Controllers\VerifikatorController;
use App\Http\Controllers\AdminBerandaController;
use App\Http\Controllers\AdminKoderekController;
use App\Http\Controllers\LupaPasswordController;
use App\Http\Controllers\PencairanSPJController;
use App\Http\Controllers\StafKuitansiController;
use App\Http\Controllers\AdminKuitansiController;
use App\Http\Controllers\StafTransaksiController;
use App\Http\Controllers\PengeluaranSPJController;
use App\Http\Controllers\SuperadminSkpdController;
use App\Http\Controllers\VerifikatorSPJController;
use App\Http\Controllers\SuperadminBerandaController;
use App\Http\Controllers\VerifikatorTransaksiController;



Route::get('/', [LoginController::class, 'index']);

Route::get('login', [LoginController::class, 'index'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::get('lupa-password', [LupaPasswordController::class, 'index']);

Route::group(['middleware' => ['auth', 'role:superadmin']], function () {
    Route::prefix('superadmin')->group(function () {
        Route::get('beranda', [SuperadminBerandaController::class, 'index']);
        Route::get('skpd', [SuperadminSkpdController::class, 'index']);
        Route::get('skpd/createakun/{id}', [SuperadminSkpdController::class, 'createakun']);
        Route::get('skpd/resetakun/{id}', [SuperadminSkpdController::class, 'resetakun']);
    });
});

Route::group(['middleware' => ['auth', 'role:staf']], function () {
    Route::prefix('staf')->group(function () {
        Route::get('beranda', [StafController::class, 'index']);

        Route::get('transaksi/detail/{id}', [StafTransaksiController::class, 'index']);
        Route::get('transaksi/detail/{id}/spj', [StafTransaksiController::class, 'spj']);
        Route::get('transaksi/detail/{id}/bku', [StafTransaksiController::class, 'bku']);
        Route::get('transaksi/detail/{id}/npd', [StafTransaksiController::class, 'npd']);
        Route::get('transaksi/detail/{id}/sptjb', [StafTransaksiController::class, 'sptjb']);
        Route::get('transaksi/detail/{id}/kuitansisatu', [StafTransaksiController::class, 'kuitansisatu']);
        Route::get('transaksi/detail/{id}/tt', [StafTransaksiController::class, 'tt']);

        Route::get('transaksi/detail/{id}/jkn', [StafTransaksiController::class, 'jkn']);
        Route::get('transaksi/detail/{id}/jkn/add', [StafTransaksiController::class, 'add_jkn']);
        Route::post('transaksi/detail/{id}/jkn/add', [StafTransaksiController::class, 'store_jkn']);
        Route::get('transaksi/detail/{id}/jkn/edit/{jkn_id}', [StafTransaksiController::class, 'edit_jkn']);
        Route::post('transaksi/detail/{id}/jkn/edit/{jkn_id}', [StafTransaksiController::class, 'update_jkn']);
        Route::get('transaksi/detail/{id}/jkn/delete/{jkn_id}', [StafTransaksiController::class, 'delete_jkn']);

        Route::get('transaksi/detail/{id}/jkk', [StafTransaksiController::class, 'jkk']);
        Route::post('transaksi/detail/{id}/jkk', [StafTransaksiController::class, 'update_jkk']);
        Route::get('transaksi/detail/{id}/jkm', [StafTransaksiController::class, 'jkm']);
        Route::post('transaksi/detail/{id}/jkm', [StafTransaksiController::class, 'update_jkm']);

        Route::get('transaksi/spj', [StafSPJController::class, 'index']);
        Route::get('transaksi/spj/kirim/{id}', [StafSPJController::class, 'kirimKeVerifikator']);
        Route::get('transaksi/spj/add', [StafSPJController::class, 'create']);
        Route::post('transaksi/spj/add', [StafSPJController::class, 'store']);
        Route::get('transaksi/spj/edit/{id}', [StafSPJController::class, 'edit']);
        Route::post('transaksi/spj/edit/{id}', [StafSPJController::class, 'update']);
        Route::get('transaksi/spj/delete/{id}', [StafSPJController::class, 'delete']);
        Route::get('transaksi/spj/detail/{id}', [StafSPJController::class, 'detail']);
        Route::post('transaksi/spj/detail/simpan/angka', [StafSPJController::class, 'storeDetail']);
        Route::get('transaksi/spj/detail/delete/{id}', [StafSPJController::class, 'deleteDetail']);

        Route::get('transaksi/npd/edit/{id}', [StafNPDController::class, 'edit']);
        Route::post('transaksi/npd/edit/{id}', [StafNPDController::class, 'update']);

        Route::get('transaksi/kuitansi/edit/{id}', [StafKuitansiController::class, 'edit']);
        Route::post('transaksi/kuitansi/edit/{id}', [StafKuitansiController::class, 'update']);

        Route::get('transaksi/sptjb/edit/{id}', [StafSPTJBController::class, 'edit']);
        Route::post('transaksi/sptjb/edit/{id}', [StafSPTJBController::class, 'update']);

        Route::post('transaksi/sptjb/penerima/{id}', [StafSPTJBController::class, 'penerima']);

        Route::get('transaksi/spj/adduraian/{id}', [StafSPJController::class, 'adduraian']);
        Route::post('transaksi/spj/adduraian/{id}', [StafSPJController::class, 'storeuraian']);

        Route::get('transaksi/spj/print/{id}', [PrintController::class, 'spj']);
        Route::get('transaksi/bku/print/{id}', [PrintController::class, 'bku']);
        Route::get('transaksi/npd/print/{id}', [PrintController::class, 'npd']);
        Route::get('transaksi/sptjb/print/{id}', [PrintController::class, 'sptjb']);
        Route::get('transaksi/kuitansi/satu/print/{id}', [PrintController::class, 'kuitansi11']);

        Route::get('transaksi/bku', [StafBKUController::class, 'index']);
        Route::get('transaksi/bku/add', [StafBKUController::class, 'create']);
        Route::post('transaksi/bku/add', [StafBKUController::class, 'store']);
        Route::get('transaksi/bku/edit/{id}', [StafBKUController::class, 'edit']);
        Route::post('transaksi/bku/edit/{id}', [StafBKUController::class, 'update']);
        Route::get('transaksi/bku/delete/{id}', [StafBKUController::class, 'delete']);
        Route::get('transaksi/bku/detail/{id}', [StafBKUController::class, 'detail']);
        Route::get('transaksi/bku/addrekening/{id}', [StafBKUController::class, 'addRekening']);
        Route::post('transaksi/bku/addrekening/{id}', [StafBKUController::class, 'storeRekening']);
        Route::get('transaksi/bku/rekening/delete/{id}', [StafBKUController::class, 'deleteRekening']);
        Route::get('transaksi/bku/detailrekening/delete/{id}', [StafBKUController::class, 'deleteDetailRekening']);
        Route::post('transaksi/bku/detail/{id}/simpanuraian', [StafBKUController::class, 'simpanUraian']);
        Route::post('transaksi/bku/detail/{id}/updateuraian', [StafBKUController::class, 'updateUraian']);

        Route::get('laporan/spj', [StafLaporanController::class, 'spj']);
        Route::get('laporan/bku', [StafLaporanController::class, 'bku']);
        Route::get('laporan/npd', [StafLaporanController::class, 'npd']);
        Route::get('laporan/sptjb', [StafLaporanController::class, 'sptjb']);
        Route::get('laporan/kwitansi', [StafLaporanController::class, 'kwitansi']);
        Route::get('laporan/jkn', [StafLaporanController::class, 'jkn']);
        Route::get('laporan/jkk', [StafLaporanController::class, 'jkk']);
        Route::get('laporan/jkm', [StafLaporanController::class, 'jkm']);
        Route::get('laporan/nodin', [StafLaporanController::class, 'nodin']);

        Route::get('laporan/spj/cetak/{id}', [PrintController::class, 'spj']);
        Route::get('laporan/bku/cetak/{id}', [PrintController::class, 'bku']);
        Route::get('laporan/npd/cetak/{id}', [PrintController::class, 'npd']);
        Route::get('laporan/sptjb/cetak/{id}', [PrintController::class, 'sptjb']);
        Route::get('laporan/kwitansi/detail/{id}', [PrintController::class, 'kwitansi']);
        Route::get('laporan/jkn/cetak/{id}', [PrintController::class, 'jknCetak']);
        Route::get('laporan/jkk/cetak/{id}', [PrintController::class, 'jkkCetak']);
        Route::get('laporan/jkm/cetak/{id}', [PrintController::class, 'jkmCetak']);
        Route::get('laporan/nodin/cetak/{id}', [PrintController::class, 'nodin']);

        Route::post('billing', [StafTTController::class, 'billing']);
    });
});
Route::group(['middleware' => ['auth', 'role:verifikator']], function () {
    Route::prefix('verifikator')->group(function () {
        Route::get('beranda', [VerifikatorController::class, 'index']);
        Route::get('transaksi/spj', [VerifikatorSPJController::class, 'index']);


        Route::post('transaksi/spj/detail/simpan/comment', [VerifikatorTransaksiController::class, 'comment_spj']);
        Route::post('transaksi/bku/detail/simpan/comment', [VerifikatorTransaksiController::class, 'comment_bku']);

        Route::get('transaksi/spj/kirim/{id}', [VerifikatorSPJController::class, 'kirimKePengeluaran']);
        Route::get('transaksi/spj/tolak/{id}', [VerifikatorSPJController::class, 'tolakSPJ']);

        Route::get('transaksi/detail/{id}', [VerifikatorTransaksiController::class, 'index']);
        Route::get('transaksi/detail/{id}/spj', [VerifikatorTransaksiController::class, 'spj']);
        Route::get('transaksi/detail/{id}/bku', [VerifikatorTransaksiController::class, 'bku']);
        Route::get('transaksi/detail/{id}/npd', [VerifikatorTransaksiController::class, 'npd']);
        Route::get('transaksi/detail/{id}/sptjb', [VerifikatorTransaksiController::class, 'sptjb']);
        Route::get('transaksi/detail/{id}/kuitansisatu', [VerifikatorTransaksiController::class, 'kuitansisatu']);
        Route::get('transaksi/detail/{id}/tt', [VerifikatorTransaksiController::class, 'tt']);
        Route::get('transaksi/detail/{id}/jkk', [VerifikatorTransaksiController::class, 'jkk']);
        Route::get('transaksi/detail/{id}/jkm', [VerifikatorTransaksiController::class, 'jkm']);
        Route::get('transaksi/detail/{id}/jkn', [VerifikatorTransaksiController::class, 'jkn']);
    });
});
Route::group(['middleware' => ['auth', 'role:bendahara_pengeluaran']], function () {
    Route::prefix('bendahara/pengeluaran')->group(function () {
        Route::get('beranda', [PengeluaranController::class, 'index']);
        Route::get('spj/masuk', [PengeluaranSPJController::class, 'spj_masuk']);
        Route::get('spj/detail/{id}', [PengeluaranSPJController::class, 'spj_detail']);
        Route::post('spj/tolak/{id}', [PengeluaranSPJController::class, 'spj_revisi']);
        Route::post('spj/setujui/{id}', [PengeluaranSPJController::class, 'setuju']);
        Route::get('spj/disetujui', [PengeluaranSPJController::class, 'spj_disetujui']);
        Route::post('billing', [PengeluaranSPJController::class, 'billing']);
    });
});

Route::group(['middleware' => ['auth', 'role:bendahara_pencairan']], function () {
    Route::prefix('bendahara/pencairan')->group(function () {
        Route::get('beranda', [PencairanController::class, 'index']);
        Route::get('spj/disetujui', [PencairanSPJController::class, 'spj_disetujui']);
        Route::post('ntpn', [PencairanSPJController::class, 'ntpn']);
        Route::post('keterangan', [PencairanSPJController::class, 'keterangan']);
    });
});

Route::group(['middleware' => ['auth', 'role:admin']], function () {
    Route::prefix('admin')->group(function () {
        Route::get('beranda', [AdminBerandaController::class, 'index']);
        Route::get('data/koderek', [AdminKoderekController::class, 'index']);
        Route::get('data/koderek/add', [AdminKoderekController::class, 'create']);
        Route::post('data/koderek/add', [AdminKoderekController::class, 'store']);
        Route::get('data/koderek/edit/{id}', [AdminKoderekController::class, 'edit']);
        Route::post('data/koderek/edit/{id}', [AdminKoderekController::class, 'update']);
        Route::get('data/koderek/delete/{id}', [AdminKoderekController::class, 'delete']);

        Route::get('data/user', [AdminUserController::class, 'index']);
        Route::get('data/user/add', [AdminUserController::class, 'create']);
        Route::post('data/user/add', [AdminUserController::class, 'store']);
        Route::get('data/user/edit/{id}', [AdminUserController::class, 'edit']);
        Route::post('data/user/edit/{id}', [AdminUserController::class, 'update']);
        Route::get('data/user/delete/{id}', [AdminUserController::class, 'delete']);

        Route::get('transaksi/detail/{id}', [TransaksiController::class, 'index']);

        Route::get('transaksi/detail/{id}/spj', [TransaksiController::class, 'spj']);
        Route::get('transaksi/detail/{id}/bku', [TransaksiController::class, 'bku']);
        Route::get('transaksi/detail/{id}/npd', [TransaksiController::class, 'npd']);
        Route::get('transaksi/detail/{id}/sptjb', [TransaksiController::class, 'sptjb']);
        Route::get('transaksi/detail/{id}/kuitansisatu', [TransaksiController::class, 'kuitansisatu']);

        Route::get('transaksi/spj', [AdminSPJController::class, 'index']);
        Route::get('transaksi/spj/add', [AdminSPJController::class, 'create']);
        Route::post('transaksi/spj/add', [AdminSPJController::class, 'store']);
        Route::get('transaksi/spj/edit/{id}', [AdminSPJController::class, 'edit']);
        Route::post('transaksi/spj/edit/{id}', [AdminSPJController::class, 'update']);
        Route::get('transaksi/spj/delete/{id}', [AdminSPJController::class, 'delete']);
        Route::get('transaksi/spj/detail/{id}', [AdminSPJController::class, 'detail']);
        Route::post('transaksi/spj/detail/simpan/angka', [AdminSPJController::class, 'storeDetail']);
        Route::get('transaksi/spj/detail/delete/{id}', [AdminSPJController::class, 'deleteDetail']);

        Route::get('transaksi/npd/edit/{id}', [AdminNPDController::class, 'edit']);
        Route::post('transaksi/npd/edit/{id}', [AdminNPDController::class, 'update']);

        Route::get('transaksi/kuitansi/edit/{id}', [AdminKuitansiController::class, 'edit']);
        Route::post('transaksi/kuitansi/edit/{id}', [AdminKuitansiController::class, 'update']);

        Route::get('transaksi/sptjb/edit/{id}', [AdminSPTJBController::class, 'edit']);
        Route::post('transaksi/sptjb/edit/{id}', [AdminSPTJBController::class, 'update']);

        Route::post('transaksi/sptjb/penerima/{id}', [AdminSPTJBController::class, 'penerima']);

        Route::get('transaksi/spj/adduraian/{id}', [AdminSPJController::class, 'adduraian']);
        Route::post('transaksi/spj/adduraian/{id}', [AdminSPJController::class, 'storeuraian']);

        Route::get('transaksi/spj/print/{id}', [PrintController::class, 'spj']);
        Route::get('transaksi/bku/print/{id}', [PrintController::class, 'bku']);
        Route::get('transaksi/npd/print/{id}', [PrintController::class, 'npd']);
        Route::get('transaksi/sptjb/print/{id}', [PrintController::class, 'sptjb']);
        Route::get('transaksi/kuitansi/satu/print/{id}', [PrintController::class, 'kuitansi11']);

        Route::get('transaksi/bku', [AdminBKUController::class, 'index']);
        Route::get('transaksi/bku/add', [AdminBKUController::class, 'create']);
        Route::post('transaksi/bku/add', [AdminBKUController::class, 'store']);
        Route::get('transaksi/bku/edit/{id}', [AdminBKUController::class, 'edit']);
        Route::post('transaksi/bku/edit/{id}', [AdminBKUController::class, 'update']);
        Route::get('transaksi/bku/delete/{id}', [AdminBKUController::class, 'delete']);
        Route::get('transaksi/bku/detail/{id}', [AdminBKUController::class, 'detail']);
        Route::get('transaksi/bku/addrekening/{id}', [AdminBKUController::class, 'addRekening']);
        Route::post('transaksi/bku/addrekening/{id}', [AdminBKUController::class, 'storeRekening']);
        Route::get('transaksi/bku/rekening/delete/{id}', [AdminBKUController::class, 'deleteRekening']);
        Route::get('transaksi/bku/detailrekening/delete/{id}', [AdminBKUController::class, 'deleteDetailRekening']);
        Route::post('transaksi/bku/detail/{id}/simpanuraian', [AdminBKUController::class, 'simpanUraian']);
        Route::post('transaksi/bku/detail/{id}/updateuraian', [AdminBKUController::class, 'updateUraian']);
    });
});

// Route::group(['middleware' => ['auth', 'role:bidang']], function () {
//     Route::prefix('bidang')->group(function () {
//         Route::get('beranda', [BidangBerandaController::class, 'index']);
//         Route::get('beranda/tahun', [PencarianController::class, 'bTahun']);

//         //-------------------route perubahan--------------------------//
//         Route::get('perubahan/program', [BidangPerubahanController::class, 'program']);
//         Route::get('perubahan/program/kegiatan/{program_id}', [BidangPerubahanController::class, 'kegiatan']);
//         Route::get('perubahan/program/kegiatan/{program_id}/sub/{kegiatan_id}', [BidangPerubahanController::class, 'subKegiatan']);
//         Route::get('perubahan/program/kegiatan/{program_id}/sub/{kegiatan_id}/uraian/{subkegiatan_id}', [BidangPerubahanController::class, 'uraian']);
//         Route::get('perubahan/program/kegiatan/{program_id}/sub/{kegiatan_id}/uraian/{subkegiatan_id}/edit/{uraian_id}', [BidangPerubahanController::class, 'editUraian']);
//         Route::post('perubahan/program/kegiatan/{program_id}/sub/{kegiatan_id}/uraian/{subkegiatan_id}/edit/{uraian_id}', [BidangPerubahanController::class, 'updateUraian']);
//         Route::get('perubahan/program/angkas/{program_id}/{kegiatan_id}/{subkegiatan_id}/{uraian_id}', [BidangPerubahanController::class, 'editDPA']);
//         Route::post('perubahan/program/angkas/{program_id}/{kegiatan_id}/{subkegiatan_id}/{uraian_id}', [BidangPerubahanController::class, 'updateDPA']);

//         Route::get('perubahan/program/kegiatan/{program_id}/sub/{kegiatan_id}/uraian/{subkegiatan_id}/add', [BidangPerubahanController::class, 'addUraian']);
//         Route::post('perubahan/program/kegiatan/{program_id}/sub/{kegiatan_id}/uraian/{subkegiatan_id}/add', [BidangPerubahanController::class, 'storeUraian']);
//         //------------------------------------------------------------//

//         Route::get('program', [BidangProgramController::class, 'index']);
//         Route::get('program/add', [BidangProgramController::class, 'create']);
//         Route::post('program/add', [BidangProgramController::class, 'store']);
//         Route::get('program/edit/{id}', [BidangProgramController::class, 'edit']);
//         Route::post('program/edit/{id}', [BidangProgramController::class, 'update']);
//         Route::get('program/delete/{id}', [BidangProgramController::class, 'delete']);

//         Route::get('realisasi', [BidangRealisasiController::class, 'index']);
//         Route::post('realisasi', [BidangRealisasiController::class, 'store']);
//         Route::post('realisasifisik', [BidangRealisasiController::class, 'storeFisik']);
//         Route::get('realisasi/{tahun}', [BidangRealisasiController::class, 'tahun']);
//         Route::get('realisasi/{tahun}/{program_id}', [BidangRealisasiController::class, 'program']);
//         Route::get('realisasi/{tahun}/{program_id}/{kegiatan_id}', [BidangRealisasiController::class, 'kegiatan']);
//         Route::get('realisasi/{tahun}/{program_id}/{kegiatan_id}/{subkegiatan_id}', [BidangRealisasiController::class, 'subkegiatan']);

//         Route::get('laporanrfk', [BidangLaporanRFKController::class, 'index']);
//         Route::get('laporanrfk/{tahun}', [BidangLaporanRFKController::class, 'tahun']);
//         Route::get('laporanrfk/{tahun}/{bulan}', [BidangLaporanRFKController::class, 'bulan']);
//         Route::get('laporanrfk/{tahun}/{bulan}/{program_id}', [BidangLaporanRFKController::class, 'program']);
//         Route::get('laporanrfk/{tahun}/{bulan}/{program_id}/{kegiatan_id}', [BidangLaporanRFKController::class, 'kegiatan']);
//         Route::get('laporanrfk/{tahun}/{bulan}/{program_id}/{kegiatan_id}/{subkegiatan_id}', [BidangLaporanRFKController::class, 'subkegiatan']);

//         Route::get('laporanrfk/{tahun}/{bulan}/{program_id}/{kegiatan_id}/{subkegiatan_id}/srp', [BidangLaporanRFKController::class, 'srp']);
//         Route::get('laporanrfk/{tahun}/{bulan}/{program_id}/{kegiatan_id}/{subkegiatan_id}/rfk', [BidangLaporanRFKController::class, 'rfk']);
//         Route::get('laporanrfk/{tahun}/{bulan}/{program_id}/{kegiatan_id}/{subkegiatan_id}/pbj', [BidangLaporanRFKController::class, 'pbj']);
//         Route::get('laporanrfk/{tahun}/{bulan}/{program_id}/{kegiatan_id}/{subkegiatan_id}/st', [BidangLaporanRFKController::class, 'st']);
//         Route::get('laporanrfk/{tahun}/{bulan}/{program_id}/{kegiatan_id}/{subkegiatan_id}/m', [BidangLaporanRFKController::class, 'm']);
//         Route::get('laporanrfk/{tahun}/{bulan}/{program_id}/{kegiatan_id}/{subkegiatan_id}/v', [BidangLaporanRFKController::class, 'v']);
//         Route::get('laporanrfk/{tahun}/{bulan}/{program_id}/{kegiatan_id}/{subkegiatan_id}/fiskeu', [BidangLaporanRFKController::class, 'fiskeu']);
//         Route::get('laporanrfk/{tahun}/{bulan}/{program_id}/{kegiatan_id}/{subkegiatan_id}/input', [BidangLaporanRFKController::class, 'input']);
//         Route::post('laporanrfk/rfk_input', [BidangLaporanRFKController::class, 'storeInput']);
//         Route::post('laporanrfk/rfk_st', [BidangLaporanRFKController::class, 'storeSt']);
//         Route::get('laporanrfk-rfk_st/delete/{id}', [BidangLaporanRFKController::class, 'deleteSt']);

//         Route::get('program/kegiatan/{id}', [BidangKegiatanController::class, 'index']);
//         Route::get('program/kegiatan/{id}/add', [BidangKegiatanController::class, 'create']);
//         Route::post('program/kegiatan/{id}/add', [BidangKegiatanController::class, 'store']);
//         Route::get('program/kegiatan/{program_id}/edit/{kegiatan_id}', [BidangKegiatanController::class, 'edit']);
//         Route::post('program/kegiatan/{program_id}/edit/{kegiatan_id}', [BidangKegiatanController::class, 'update']);
//         Route::get('program/kegiatan/{program_id}/delete/{kegiatan_id}', [BidangKegiatanController::class, 'delete']);

//         Route::get('program/kegiatan/{program_id}/sub/{kegiatan_id}', [BidangSubkegiatanController::class, 'index']);
//         Route::get('program/kegiatan/{program_id}/sub/{kegiatan_id}/add', [BidangSubkegiatanController::class, 'create']);
//         Route::post('program/kegiatan/{program_id}/sub/{kegiatan_id}/add', [BidangSubkegiatanController::class, 'store']);
//         Route::get('program/kegiatan/{program_id}/sub/{kegiatan_id}/edit/{sub_id}', [BidangSubkegiatanController::class, 'edit']);
//         Route::post('program/kegiatan/{program_id}/sub/{kegiatan_id}/edit/{sub_id}', [BidangSubkegiatanController::class, 'update']);
//         Route::get('program/kegiatan/{program_id}/sub/{kegiatan_id}/delete/{sub_id}', [BidangSubkegiatanController::class, 'delete']);

//         Route::get('program/kegiatan/{program_id}/sub/{kegiatan_id}/uraian/{subkegiatan_id}', [BidangUraianController::class, 'index']);
//         Route::get('program/kegiatan/{program_id}/sub/{kegiatan_id}/uraian/{subkegiatan_id}/add', [BidangUraianController::class, 'create']);
//         Route::post('program/kegiatan/{program_id}/sub/{kegiatan_id}/uraian/{subkegiatan_id}/add', [BidangUraianController::class, 'store']);
//         Route::get('program/kegiatan/{program_id}/sub/{kegiatan_id}/uraian/{subkegiatan_id}/edit/{uraian_id}', [BidangUraianController::class, 'edit']);
//         Route::post('program/kegiatan/{program_id}/sub/{kegiatan_id}/uraian/{subkegiatan_id}/edit/{uraian_id}', [BidangUraianController::class, 'update']);
//         Route::get('program/kegiatan/{program_id}/sub/{kegiatan_id}/uraian/{subkegiatan_id}/delete/{uraian_id}', [BidangUraianController::class, 'delete']);

//         Route::get('program/angkas/{program_id}/{kegiatan_id}/{subkegiatan_id}/{uraian_id}', [BidangAngkasController::class, 'create']);
//         Route::post('program/angkas/{program_id}/{kegiatan_id}/{subkegiatan_id}/{uraian_id}', [BidangAngkasController::class, 'store']);

//         Route::get('skpd/bidang/pptk', [PPTKController::class, 'index']);
//         Route::get('skpd/bidang/pptk/add', [PPTKController::class, 'create']);
//         Route::post('skpd/bidang/pptk/add', [PPTKController::class, 'store']);
//         Route::get('skpd/bidang/pptk/edit/{id}', [PPTKController::class, 'edit']);
//         Route::post('skpd/bidang/pptk/edit/{id}', [PPTKController::class, 'update']);
//         Route::get('skpd/bidang/pptk/delete/{id}', [PPTKController::class, 'delete']);
//         Route::get('skpd/bidang/pptk/createuser/{id}', [PPTKController::class, 'createuser']);
//         Route::post('skpd/bidang/pptk/createuser/{id}', [PPTKController::class, 'storeuser']);
//         Route::get('skpd/bidang/pptk/resetpass/{id}', [PPTKController::class, 'resetpass']);


//         Route::get('skpd/bidang/program/kegiatan/{program_id}/sub/{kegiatan_id}/excel/{subkegiatan_id}', [ExcelController::class, 'index']);
//         Route::get('skpd/bidang/program/kegiatan/{program_id}/sub/{kegiatan_id}/excel/{subkegiatan_id}/{bulan}', [ExcelController::class, 'bulan']);
//         Route::get('skpd/bidang/program/kegiatan/{program_id}/sub/{kegiatan_id}/excel/{subkegiatan_id}/{bulan}/suratpengantar', [ExcelController::class, 'sp']);
//         Route::get('skpd/bidang/program/kegiatan/{program_id}/sub/{kegiatan_id}/excel/{subkegiatan_id}/{bulan}/rfk', [ExcelController::class, 'rfk']);
//         Route::get('skpd/bidang/program/kegiatan/{program_id}/sub/{kegiatan_id}/excel/{subkegiatan_id}/{bulan}/v', [ExcelController::class, 'v']);
//         Route::get('skpd/bidang/program/kegiatan/{program_id}/sub/{kegiatan_id}/excel/{subkegiatan_id}/{bulan}/fiskeu', [ExcelController::class, 'fiskeu']);

//         Route::get('skpd/bidang/program/kegiatan/{program_id}/sub/{kegiatan_id}/excel/{subkegiatan_id}/{bulan}/kppbj', [ExcelController::class, 'kppbj']);
//         Route::post('skpd/bidang/program/kegiatan/{program_id}/sub/{kegiatan_id}/excel/{subkegiatan_id}/{bulan}/kppbj', [ExcelController::class, 'storeKppbj']);
//         Route::get('skpd/bidang/program/kegiatan/{program_id}/sub/{kegiatan_id}/excel/{subkegiatan_id}/{bulan}/kppbj/delete/{m_id}', [ExcelController::class, 'deleteKppbj']);

//         Route::get('skpd/bidang/program/kegiatan/{program_id}/sub/{kegiatan_id}/excel/{subkegiatan_id}/{bulan}/m', [ExcelController::class, 'm']);
//         Route::post('skpd/bidang/program/kegiatan/{program_id}/sub/{kegiatan_id}/excel/{subkegiatan_id}/{bulan}/m', [ExcelController::class, 'storeM']);
//         Route::get('skpd/bidang/program/kegiatan/{program_id}/sub/{kegiatan_id}/excel/{subkegiatan_id}/{bulan}/m/delete/{m_id}', [ExcelController::class, 'deleteM']);

//         Route::get('skpd/bidang/program/kegiatan/{program_id}/sub/{kegiatan_id}/excel/{subkegiatan_id}/{bulan}/pbj', [ExcelController::class, 'pbj']);
//         Route::post('skpd/bidang/program/kegiatan/{program_id}/sub/{kegiatan_id}/excel/{subkegiatan_id}/{bulan}/pbj', [ExcelController::class, 'storePbj']);
//         Route::get('skpd/bidang/program/kegiatan/{program_id}/sub/{kegiatan_id}/excel/{subkegiatan_id}/{bulan}/pbj/delete/{pbj_id}', [ExcelController::class, 'deletePbj']);

//         Route::get('skpd/bidang/program/kegiatan/{program_id}/sub/{kegiatan_id}/excel/{subkegiatan_id}/{bulan}/st', [ExcelController::class, 'st']);
//         Route::post('skpd/bidang/program/kegiatan/{program_id}/sub/{kegiatan_id}/excel/{subkegiatan_id}/{bulan}/st', [ExcelController::class, 'storeSt']);
//         Route::get('skpd/bidang/program/kegiatan/{program_id}/sub/{kegiatan_id}/excel/{subkegiatan_id}/{bulan}/st/delete/{st_id}', [ExcelController::class, 'deleteSt']);


//         Route::get('skpd/bidang/program/kegiatan/{program_id}/sub/{kegiatan_id}/excel/{subkegiatan_id}/{bulan}/input', [ExcelController::class, 'input']);
//         Route::post('skpd/bidang/program/kegiatan/{program_id}/sub/{kegiatan_id}/excel/{subkegiatan_id}/{bulan}/input', [ExcelController::class, 'storeInput']);
//         Route::get('skpd/bidang/program/kegiatan/{program_id}/sub/{kegiatan_id}/excel/{subkegiatan_id}/{bulan}/input/delete/{input_id}', [ExcelController::class, 'deleteInput']);
//         Route::post('skpd/bidang/program/kegiatan/{program_id}/sub/{kegiatan_id}/excel/{subkegiatan_id}/{bulan}/updatepptk', [ExcelController::class, 'updatepptk']);


//         Route::get('skpd/bidang/program/kegiatan/{program_id}/sub/{kegiatan_id}/excel/{subkegiatan_id}/{bulan}/input/exportexcel/{t_pptk_id}', [ExportController::class, 'exportInput']);

//         Route::get('murni/{program_id}/{kegiatan_id}/{subkegiatan_id}/{uraian_id}', [MurniController::class, 'create']);
//         Route::post('murni/{program_id}/{kegiatan_id}/{subkegiatan_id}/{uraian_id}', [MurniController::class, 'store']);

//         Route::get('pergeseran/{program_id}/{kegiatan_id}/{subkegiatan_id}/{uraian_id}', [PergeseranController::class, 'create']);
//         Route::post('pergeseran/{program_id}/{kegiatan_id}/{subkegiatan_id}/{uraian_id}', [PergeseranController::class, 'store']);

//         Route::get('realisasi/{program_id}/{kegiatan_id}/{subkegiatan_id}/{uraian_id}', [RealisasiController::class, 'create']);
//         Route::post('realisasi/{program_id}/{kegiatan_id}/{subkegiatan_id}/{uraian_id}', [RealisasiController::class, 'store']);

//         Route::get('excel/sp/{program_id}/{kegiatan_id}/{subkegiatan_id}', [ExcelController::class, 'suratpengantar']);
//         Route::get('excel/rfk/{program_id}/{kegiatan_id}/{subkegiatan_id}', [ExcelController::class, 'rfk']);
//         Route::get('excel/fiskeu/{program_id}/{kegiatan_id}/{subkegiatan_id}', [ExcelController::class, 'fiskeu']);
//         Route::get('excel/input/{program_id}/{kegiatan_id}/{subkegiatan_id}', [ExcelController::class, 'input']);

//         Route::get('skpd/bidang/riwayat/kegiatan', [RiwayatKegiatanController::class, 'index']);
//         Route::get('skpd/bidang/riwayat/kegiatan/search', [RiwayatKegiatanController::class, 'tampilkan']);
//     });
// });

// Route::group(['middleware' => ['auth', 'role:bidang|pptk']], function () {
//     Route::get('berandapptk', [BerandaController::class, 'pptk']);

//     Route::get('skpd/bidang/program', [ProgramController::class, 'index']);
//     Route::get('skpd/bidang/program/add', [ProgramController::class, 'create']);
//     Route::post('skpd/bidang/program/add', [ProgramController::class, 'store']);
//     Route::get('skpd/bidang/program/edit/{id}', [ProgramController::class, 'edit']);
//     Route::post('skpd/bidang/program/edit/{id}', [ProgramController::class, 'update']);
//     Route::get('skpd/bidang/program/delete/{id}', [ProgramController::class, 'delete']);
// });

Route::group(['middleware' => ['auth', 'role:superadmin|admin|staf|verifikator|bendahara_pengeluaran|bendahara_pencairan']], function () {
    Route::get('/logout', [LogoutController::class, 'logout']);

    Route::get('gantipass', [GantiPassController::class, 'index']);
    Route::post('gantipass', [GantiPassController::class, 'update']);
});
