<?php

namespace App\Http\Controllers;

use App\Models\T_bku_rekening_detail;
use App\Models\T_spj;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PencairanSPJController extends Controller
{
    public function spj_disetujui()
    {
        $id_spj = T_spj::where('status_pengeluaran', 2)->pluck('id');
        if ($id_spj->count() == 0) {
            Session::flash('info', 'Belum ada SPJ yang disetujui');
            return back();
        }

        $rekening = T_bku_rekening_detail::whereIn('t_spj_id', $id_spj->toArray())->get();

        $data = T_spj::where('status_pengeluaran', 2)->orderBy('tanggal', 'ASC')->get();
        // $total = T_bku_rekening_detail::where('t_spj_id', $id)->get();
        return view('pencairan.disetujui', compact('rekening', 'data'));
    }
    public function ntpn(Request $req)
    {
        T_bku_rekening_detail::find($req->bku_rekening_detail_id)->update([
            'ntpn' => $req->ntpn
        ]);
        return back();
    }
    public function keterangan(Request $req)
    {

        T_bku_rekening_detail::find($req->bku_rekening_detail_id)->update([
            'keterangan' => $req->keterangan
        ]);
        return back();
    }
}
