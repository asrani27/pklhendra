<?php

namespace App\Http\Controllers;

use App\Models\T_spj;
use App\Models\M_koderek;
use App\Models\T_spj_detail;
use Illuminate\Http\Request;
use App\Models\T_spj_penerimaan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class StafSPJController extends Controller
{
    public function index()
    {
        $data = T_spj::paginate(15);

        return view('staf.transaksi.spj.index', compact('data'));
    }
    public function create()
    {
        return view('staf.transaksi.spj.create');
    }
    public function adduraian($id)
    {
        $data = M_koderek::get();
        return view('staf.transaksi.spj.adduraian', compact('id', 'data'));
    }

    public function storeuraian(Request $req, $id)
    {
        $new = new T_spj_detail();
        $new->t_spj_id = $id;
        $new->m_koderek_id = $req->m_koderek_id;
        $new->save();
        Session::flash('success', 'Berhasil DiSimpan');
        return redirect('/staf/transaksi/spj/detail/' . $id);
    }

    public function store(Request $req)
    {

        $param = $req->all();
        $param['user_id'] =  Auth::user()->id;
        $spj = T_spj::create($param);

        $n = 8;
        for ($i = 1; $i <= $n; $i++) {
            $p = new T_spj_penerimaan();
            $p->t_spj_id = $spj->id;
            if ($i == 1) {
                $p->jenis = 'sp2d';
            }
            if ($i == 2) {
                $p->jenis = 'pp';
            }
            if ($i == 3) {
                $p->jenis = 'ppn';
            }
            if ($i == 4) {
                $p->jenis = 'pph21';
            }
            if ($i == 5) {
                $p->jenis = 'pph22';
            }
            if ($i == 6) {
                $p->jenis = 'pph23';
            }
            if ($i == 7) {
                $p->jenis = 'pph4';
            }
            if ($i == 8) {
                $p->jenis = 'lain';
            }
            $p->save();
        }


        Session::flash('success', 'Berhasil DiSimpan');
        return redirect('/staf/transaksi/spj');
    }

    public function edit($id)
    {
        $data = T_spj::find($id);
        return view('staf.transaksi.spj.edit', compact('data'));
    }

    public function storeDetail(Request $req)
    {
        $data = T_spj_detail::find($req->detail_id);
        if ($req->kolom == 3) {
            $data->ja = $req->angka;
            $data->sisa = $data->ja - $data->jumlah;
            $data->save();
            Session::flash('success', 'Berhasil Diupdate');
        }
        if ($req->kolom == 4) {
            $data->ls_gaji1 = $req->angka;
            $data->ls_gaji3 = $data->ls_gaji1 + $data->ls_gaji2;
            $data->jumlah = $data->ls_gaji3 + $data->ls_bj3 + $data->gu3;
            $data->sisa = $data->ja - $data->jumlah;
            $data->save();
            Session::flash('success', 'Berhasil Diupdate');
        }
        if ($req->kolom == 5) {
            $data->ls_gaji2 = $req->angka;
            $data->ls_gaji3 = $data->ls_gaji1 + $data->ls_gaji2;
            $data->jumlah = $data->ls_gaji3 + $data->ls_bj3 + $data->gu3;
            $data->sisa = $data->ja - $data->jumlah;
            $data->save();
            Session::flash('success', 'Berhasil Diupdate');
        }

        if ($req->kolom == 7) {
            $data->ls_bj1 = $req->angka;
            $data->ls_bj3 = $data->ls_bj1 + $data->ls_bj2;
            $data->jumlah = $data->ls_gaji3 + $data->ls_bj3 + $data->gu3;
            $data->sisa = $data->ja - $data->jumlah;
            $data->save();
            Session::flash('success', 'Berhasil Diupdate');
        }

        if ($req->kolom == 8) {
            $data->ls_bj2 = $req->angka;
            $data->ls_bj3 = $data->ls_bj1 + $data->ls_bj2;
            $data->jumlah = $data->ls_gaji3 + $data->ls_bj3 + $data->gu3;
            $data->sisa = $data->ja - $data->jumlah;
            $data->save();
            Session::flash('success', 'Berhasil Diupdate');
        }

        if ($req->kolom == 10) {
            $data->gu1 = $req->angka;
            $data->gu3 = $data->gu1 + $data->gu2;
            $data->jumlah = $data->ls_gaji3 + $data->ls_bj3 + $data->gu3;
            $data->sisa = $data->ja - $data->jumlah;
            $data->save();
            Session::flash('success', 'Berhasil Diupdate');
        }

        if ($req->kolom == 11) {
            $data->gu2 = $req->angka;
            $data->gu3 = $data->gu1 + $data->gu2;
            $data->jumlah = $data->ls_gaji3 + $data->ls_bj3 + $data->gu3;
            $data->sisa = $data->ja - $data->jumlah;
            $data->save();
            Session::flash('success', 'Berhasil Diupdate');
        }

        return back();
    }
    public function detail($id)
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

    public function deleteDetail($id)
    {
        $data = T_spj_detail::find($id)->delete();
        Session::flash('success', 'Berhasil Dihapus');
        return back();
    }

    public function delete($id)
    {
        $data = T_spj::find($id)->delete();
        Session::flash('success', 'Berhasil Dihapus');
        return back();
    }

    public function update(Request $req, $id)
    {
        T_spj::find($id)->update($req->all());
        Session::flash('success', 'Berhasil Diupdate');
        return redirect('/staf/transaksi/spj');
    }

    public function kirimKeVerifikator($id)
    {
        T_spj::find($id)->update(['status_verifikator' => 1]);
        Session::flash('success', 'Berhasil Dikirim ke verifikator');
        return back();
    }
}
