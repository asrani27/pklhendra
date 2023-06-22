<?php

namespace App\Http\Controllers;

use App\Models\T_spj;
use Illuminate\Http\Request;
use App\Models\T_bku_rekening;
use App\Models\T_bku_rekening_detail;
use Illuminate\Support\Facades\Session;

class PengeluaranSPJController extends Controller
{
    public function spj_masuk()
    {
        $data = T_spj::where('status_pengeluaran', 1)->paginate(15);

        return view('pengeluaran.transaksi.spj.index', compact('data'));
    }

    public function spj_detail($id)
    {
        $data = T_spj::find($id);
        $rekening = T_bku_rekening::where('t_spj_id', $id)->get();
        $total = T_bku_rekening_detail::where('t_spj_id', $id)->get();
        return view('pengeluaran.detail', compact('data', 'rekening', 'id', 'total'));
    }

    public function spj_revisi($id)
    {
    }

    public function setuju(Request $req, $id)
    {
        $data = T_spj::find($id);
        $data->tanggal = $req->tanggal;
        $data->status_pengeluaran = 2;
        $data->status_pencairan = 1;
        $data->save();

        //BKU
        $bku = T_bku_rekening::where('t_spj_id', $id)->get();
        foreach ($bku as $key => $item) {
            $item->update(['tanggal' => $req->tanggal]);
        }
        Session::flash('success', 'SPJ Disetujui, silahkan check di menu SPJ di setujui');
        return redirect('/bendahara/pengeluaran/spj/masuk');
    }

    public function spj_disetujui()
    {
        $id_spj = T_spj::where('status_pengeluaran', 2)->pluck('id');
        if ($id_spj->count() == 0) {
            Session::flash('info', 'Belum ada SPJ yang disetujui');
            return back();
        }

        $rekening = T_bku_rekening_detail::where('t_spj_id', $id_spj)->get();
        $data = T_spj::where('status_pengeluaran', 2)->orderBy('tanggal', 'ASC')->get();
        // $total = T_bku_rekening_detail::where('t_spj_id', $id)->get();
        return view('pengeluaran.disetujui', compact('rekening', 'data'));
    }
}
