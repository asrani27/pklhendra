<?php

namespace App\Http\Controllers;

use App\Models\T_bku_rekening;
use App\Models\T_bku_rekening_detail;
use App\Models\T_spj;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class StafSPTJBController extends Controller
{
    public function edit($id)
    {
        $data = T_spj::find($id);
        return view('admin.transaksi.sptjb.edit', compact('id', 'data'));
    }
    public function update(Request $req, $id)
    {
        $data = T_spj::find($id)->update($req->all());
        Session::flash('success', 'Berhasil Diupdate');
        return redirect('/admin/transaksi/detail/' . $id . '/sptjb');
    }

    public function penerima(Request $req, $id)
    {
        $data = T_bku_rekening_detail::find($req->bku_rekening_detail_id)->update([
            'penerima' => $req->penerima
        ]);
        Session::flash('success', 'Berhasil Diupdate');
        return back();
    }
}
