<?php

namespace App\Http\Controllers;

use App\Models\T_bku;
use App\Models\T_bku_rekening;
use App\Models\T_bku_rekening_detail;
use App\Models\T_spj;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function index($id)
    {
        return view('admin.transaksi.index', compact('id'));
    }

    public function spj($id)
    {
        $data = T_spj::find($id);
        $detail = $data->detail;
        $penerimaan = $data->penerimaan;
        $sp2d = $penerimaan->where('jenis', 'sp2d')->first();
        $pp = $penerimaan->where('jenis', 'pp')->first();
        $ppn = $penerimaan->where('jenis', 'ppn')->first();
        $pph21 = $penerimaan->where('jenis', 'pph21')->first();
        $pph22 = $penerimaan->where('jenis', 'pph22')->first();
        $pph23 = $penerimaan->where('jenis', 'pph23')->first();
        $pph4 = $penerimaan->where('jenis', 'pph4')->first();
        $lain = $penerimaan->where('jenis', 'lain')->first();
        return view('admin.transaksi.spj.detail', compact('data', 'id', 'detail', 'penerimaan', 'sp2d', 'pp', 'ppn', 'pph21', 'pph22', 'pph23', 'pph4', 'lain'));
    }
    public function bku($id)
    {
        $data = T_spj::find($id);
        $rekening = T_bku_rekening::where('t_spj_id', $id)->get();
        $total = T_bku_rekening_detail::where('t_spj_id', $id)->get();
        return view('admin.transaksi.bku.rekening', compact('data', 'rekening', 'id', 'total'));
    }
    public function npd($id)
    {
        $data = T_spj::find($id);
        $detail = $data->detail;
        $detail->map(function ($item) {
            $item->aps = $item->ls_gaji1 + $item->ls_bj1 + $item->gu1;
            $item->psi = $item->ls_gaji2 + $item->ls_bj2 + $item->gu2;
            $item->sisa_npd = $item->ja - ($item->aps + $item->psi);
            return $item;
        });

        return view('admin.transaksi.npd.index', compact('id', 'data', 'detail'));
    }
    public function sptjb($id)
    {
        $ttd = T_spj::find($id);
        $data = T_bku_rekening_detail::where('t_spj_id', $id)->where('pajak', 0)->get();
        return view('admin.transaksi.sptjb.index', compact('id', 'data', 'ttd'));
    }
    public function kuitansisatu($id)
    {
        return view('admin.transaksi.index', compact('id'));
    }
}
