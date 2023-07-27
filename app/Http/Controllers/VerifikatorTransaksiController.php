<?php

namespace App\Http\Controllers;

use App\Models\T_spj;
use App\Models\T_spj_detail;
use Illuminate\Http\Request;
use App\Models\T_bku_rekening;
use App\Models\T_bku_rekening_detail;
use App\Models\T_jkn;
use Illuminate\Support\Facades\Session;

class VerifikatorTransaksiController extends Controller
{
    public function index($id)
    {
        return view('verifikator.transaksi.index', compact('id'));
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

        return view('verifikator.transaksi.spj.detail', compact('data', 'id', 'detail', 'penerimaan', 'sp2d', 'pp', 'ppn', 'pph21', 'pph22', 'pph23', 'pph4', 'lain'));
    }
    public function bku($id)
    {
        $data = T_spj::find($id);
        $rekening = T_bku_rekening::where('t_spj_id', $id)->get();
        $total = T_bku_rekening_detail::where('t_spj_id', $id)->get();
        return view('verifikator.transaksi.bku.rekening', compact('data', 'rekening', 'id', 'total'));
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

        return view('verifikator.transaksi.npd.index', compact('id', 'data', 'detail'));
    }
    public function sptjb($id)
    {
        $ttd = T_spj::find($id);
        $data = T_bku_rekening_detail::where('t_spj_id', $id)->where('pajak', 0)->get();
        return view('verifikator.transaksi.sptjb.index', compact('id', 'data', 'ttd'));
    }
    public function kuitansisatu($id)
    {
        $ttd = T_spj::find($id);
        $data = T_bku_rekening_detail::where('t_spj_id', $id)->where('pajak', 0)->get();
        return view('verifikator.transaksi.kuitansi.index', compact('id', 'data', 'ttd'));
    }

    public function comment_spj(Request $req)
    {
        T_spj_detail::find($req->detail_id)->update(['comment_verifikator' => $req->comment_verifikator]);
        Session::flash('success', 'Berhasil Diupdate');
        return back();
    }

    public function comment_bku(Request $req)
    {
        T_bku_rekening::find($req->detail_id)->update(['comment_verifikator' => $req->comment_verifikator]);
        Session::flash('success', 'Berhasil Diupdate');
        return back();
    }

    public function tt($id)
    {
        $ttd = T_spj::find($id);
        $rekening = T_bku_rekening_detail::where('t_spj_id', $id)->get();
        return view('verifikator.transaksi.tt.index', compact('id', 'rekening', 'ttd'));
    }
    public function jkn($id)
    {
        $ttd = T_spj::find($id);
        $data = T_jkn::where('t_spj_id', $id)->paginate(15);
        return view('verifikator.transaksi.jkn.index', compact('id', 'data', 'ttd'));
    }
    public function jkk($id)
    {
        $ttd = T_spj::find($id);
        $data = T_jkn::where('t_spj_id', $id)->paginate(15);
        return view('verifikator.transaksi.jkk.index', compact('id', 'data', 'ttd'));
    }
    public function jkm($id)
    {
        $ttd = T_spj::find($id);
        $data = T_jkn::where('t_spj_id', $id)->paginate(15);
        return view('verifikator.transaksi.jkm.index', compact('id', 'data', 'ttd'));
    }
}
