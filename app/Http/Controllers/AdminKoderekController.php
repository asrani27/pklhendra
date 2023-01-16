<?php

namespace App\Http\Controllers;

use App\Models\M_koderek;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminKoderekController extends Controller
{
    public function index()
    {
        $data = M_koderek::paginate(15);

        return view('admin.data.koderek.index', compact('data'));
    }

    public function create()
    {
        return view('admin.data.koderek.create');
    }

    public function delete($id)
    {
        M_koderek::find($id)->delete();
        Session::flash('success', 'Berhasil Dihapus');
        return back();
    }

    public function edit($id)
    {
        $data = M_koderek::find($id);
        return view('admin.data.koderek.edit', compact('data'));
    }

    public function store(Request $req)
    {
        M_koderek::create($req->all());
        Session::flash('success', 'Berhasil DiSimpan');
        return redirect('/admin/data/koderek');
    }

    public function update(Request $req, $id)
    {
        M_koderek::find($id)->update($req->all());
        Session::flash('success', 'Berhasil Diupdate');
        return redirect('/admin/data/koderek');
    }
}
