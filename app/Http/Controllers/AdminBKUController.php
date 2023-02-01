<?php

namespace App\Http\Controllers;

use App\Models\M_koderek;
use App\Models\T_bku;
use App\Models\T_bku_rekening;
use App\Models\T_bku_rekening_detail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminBKUController extends Controller
{
    public function index()
    {
        $data = T_bku::paginate(15);
        return view('admin.transaksi.bku.index', compact('data'));
    }
    public function create()
    {
        return view('admin.transaksi.bku.create');
    }
    public function store(Request $req)
    {
        T_bku::create($req->all());
        Session::flash('success', 'Berhasil DiSimpan');
        return redirect('/admin/transaksi/bku');
    }

    public function edit($id)
    {
        $data = T_bku::find($id);
        return view('admin.transaksi.bku.edit', compact('data'));
    }

    public function delete($id)
    {
        $data = T_bku::find($id)->delete();
        //dd($data);
        Session::flash('success', 'Berhasil Dihapus');
        return back();
    }
    public function update(Request $req, $id)
    {
        T_bku::find($id)->update($req->all());
        Session::flash('success', 'Berhasil Diupdate');
        return redirect('/admin/transaksi/bku');
    }

    public function detail($id)
    {
        $data = T_bku::find($id);
        $rekening = T_bku_rekening::where('t_bku_id', $id)->get();
        $total = T_bku_rekening_detail::where('t_bku_id', $id)->get();
        return view('admin.transaksi.bku.rekening', compact('data', 'rekening', 'id', 'total'));
    }
    public function addRekening($id)
    {
        $data = M_koderek::get();
        return view('admin.transaksi.bku.addrekening', compact('id', 'data'));
    }
    public function storeRekening(Request $req, $id)
    {
        $data = $req->all();
        $data['t_spj_id'] = $id;

        T_bku_rekening::create($data);
        Session::flash('success', 'Berhasil Disimpan');

        return redirect('/admin/transaksi/detail/' . $id . '/bku');
    }

    public function deleteRekening($id)
    {
        T_bku_rekening::find($id)->delete();
        Session::flash('success', 'Berhasil Dihapus');
        return back();
    }

    public function deleteDetailRekening($id)
    {
        T_bku_rekening_detail::find($id)->delete();
        Session::flash('success', 'Berhasil Dihapus');
        return back();
    }

    public function simpanUraian(Request $req, $id)
    {
        $data = $req->all();
        $data['t_spj_id'] = $id;
        $data['t_bku_rekening_id'] = $req->bku_rekening_id;

        T_bku_rekening_detail::create($data);
        Session::flash('success', 'Berhasil Disimpan');
        return back();
    }
    public function updateUraian(Request $req, $id)
    {
        T_bku_rekening_detail::find($req->bku_rekening_detail_id)->update($req->all());
        Session::flash('success', 'Berhasil Diupdate');
        return back();
    }
}
