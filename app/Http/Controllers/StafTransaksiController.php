<?php

namespace App\Http\Controllers;

use App\Models\T_jkk;
use App\Models\T_jkm;
use App\Models\T_jkn;
use App\Models\T_spj;
use Illuminate\Http\Request;
use App\Models\T_bku_rekening;
use App\Models\T_bku_rekening_detail;
use Illuminate\Support\Facades\Session;

class StafTransaksiController extends Controller
{
    public function index($id)
    {
        return view('staf.transaksi.index', compact('id'));
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

        return view('staf.transaksi.spj.detail', compact('data', 'id', 'detail', 'penerimaan', 'sp2d', 'pp', 'ppn', 'pph21', 'pph22', 'pph23', 'pph4', 'lain'));
    }
    public function bku($id)
    {
        $data = T_spj::find($id);
        $rekening = T_bku_rekening::where('t_spj_id', $id)->get();
        $total = T_bku_rekening_detail::where('t_spj_id', $id)->get();
        return view('staf.transaksi.bku.rekening', compact('data', 'rekening', 'id', 'total'));
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

        return view('staf.transaksi.npd.index', compact('id', 'data', 'detail'));
    }

    public function sptjb($id)
    {
        $ttd = T_spj::find($id);
        $data = T_bku_rekening_detail::where('t_spj_id', $id)->where('pajak', 0)->get();
        return view('staf.transaksi.sptjb.index', compact('id', 'data', 'ttd'));
    }
    public function kuitansisatu($id)
    {
        $ttd = T_spj::find($id);
        $data = T_bku_rekening_detail::where('t_spj_id', $id)->where('pajak', 0)->get();
        return view('staf.transaksi.kuitansi.index', compact('id', 'data', 'ttd'));
    }
    public function tt($id)
    {
        $ttd = T_spj::find($id);
        $rekening = T_bku_rekening_detail::where('t_spj_id', $id)->get();
        return view('staf.transaksi.tt.index', compact('id', 'rekening', 'ttd'));
    }
    public function jkn($id)
    {
        $ttd = T_spj::find($id);
        $data = T_jkn::where('t_spj_id', $id)->paginate(15);
        return view('staf.transaksi.jkn.index', compact('id', 'data', 'ttd'));
    }
    public function add_jkn($id)
    {
        return view('staf.transaksi.jkn.create', compact('id'));
    }
    public function store_jkn(Request $req, $id)
    {
        $n = new T_jkn;
        $n->t_spj_id = $id;
        $n->nama = $req->nama;
        $n->jabatan = $req->jabatan;
        $n->honor = $req->honor;
        $n->umr = $req->umr;
        $n->potongan = $req->potongan;
        $n->jumlah = $req->jumlah;
        $n->save();
        Session::flash('success', 'Berhasil disimpan');
        return redirect('/staf/transaksi/detail/' . $id . '/jkn');
    }

    public function edit_jkn($id, $jkn_id)
    {
        $data = T_jkn::find($jkn_id);

        return view('staf.transaksi.jkn.edit', compact('id', 'data'));
    }
    public function update_jkn(Request $req, $id, $jkn_id)
    {
        $n = T_jkn::find($jkn_id);
        $n->t_spj_id = $id;
        $n->nama = $req->nama;
        $n->jabatan = $req->jabatan;
        $n->honor = $req->honor;
        $n->umr = $req->umr;
        $n->potongan = $req->potongan;
        $n->jumlah = $req->jumlah;
        $n->save();
        Session::flash('success', 'Berhasil diupdate');
        return redirect('/staf/transaksi/detail/' . $id . '/jkn');
    }
    public function delete_jkn($id, $jkn_id)
    {
        T_jkn::find($jkn_id)->delete();
        Session::flash('success', 'Berhasil dihapus');
        return redirect('/staf/transaksi/detail/' . $id . '/jkn');
    }
    public function jkk($id)
    {
        $ttd = T_spj::find($id);
        $data = T_jkn::where('t_spj_id', $id)->paginate(15);
        return view('staf.transaksi.jkk.index', compact('id', 'data', 'ttd'));
    }
    public function update_jkk(Request $req, $id)
    {

        $n = T_jkn::find($req->jkk_id);
        $n->iuran_jkk = $req->iuran;
        $n->save();
        Session::flash('success', 'Berhasil diupdate');
        return back();
    }
    public function jkm($id)
    {
        $ttd = T_spj::find($id);
        $data = T_jkn::where('t_spj_id', $id)->paginate(15);
        return view('staf.transaksi.jkm.index', compact('id', 'data', 'ttd'));
    }
    public function update_jkm(Request $req, $id)
    {

        $n = T_jkn::find($req->jkk_id);
        $n->iuran_jkm = $req->iuran;
        $n->save();
        Session::flash('success', 'Berhasil diupdate');
        return back();
    }
}
