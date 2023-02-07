<?php

namespace App\Http\Controllers;

use App\Models\T_spj;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminKuitansiController extends Controller
{
    public function edit($id)
    {
        $data = T_spj::find($id);
        return view('admin.transaksi.kuitansi.edit', compact('id', 'data'));
    }
    public function update(Request $req, $id)
    {
        $data = T_spj::find($id)->update($req->all());
        Session::flash('success', 'Berhasil Diupdate');
        return redirect('/admin/transaksi/detail/' . $id . '/kuitansisatu');
    }
}
