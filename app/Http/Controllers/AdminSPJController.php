<?php

namespace App\Http\Controllers;

use App\Models\M_koderek;
use App\Models\T_spj;
use App\Models\T_spj_detail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminSPJController extends Controller
{
    public function index()
    {
        $data = T_spj::paginate(15);
        return view('admin.transaksi.spj.index', compact('data'));
    }
    public function create()
    {
        return view('admin.transaksi.spj.create');
    }
    public function adduraian($id)
    {
        $data = M_koderek::get();
        return view('admin.transaksi.spj.adduraian', compact('id', 'data'));
    }

    public function storeuraian(Request $req, $id)
    {
        $new = new T_spj_detail;
        $new->t_spj_id = $id;
        $new->m_koderek_id = $req->m_koderek_id;
        $new->save();
        Session::flash('success', 'Berhasil DiSimpan');
        return redirect('/admin/transaksi/spj/detail/' . $id);
    }

    public function store(Request $req)
    {
        T_spj::create($req->all());
        Session::flash('success', 'Berhasil DiSimpan');
        return redirect('/admin/transaksi/spj');
    }

    public function edit($id)
    {
        $data = T_spj::find($id);
        return view('admin.transaksi.spj.edit', compact('data'));
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
        dd($req->all());
    }
    public function detail($id)
    {
        $data = T_spj::find($id);
        return view('admin.transaksi.spj.detail', compact('data'));
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
        return redirect('/admin/transaksi/spj');
    }
}
