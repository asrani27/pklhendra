<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminSPTJBController extends Controller
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
}
