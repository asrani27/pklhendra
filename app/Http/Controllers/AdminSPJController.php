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
