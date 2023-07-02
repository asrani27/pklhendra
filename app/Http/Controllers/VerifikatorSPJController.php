<?php

namespace App\Http\Controllers;

use App\Models\T_spj;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class VerifikatorSPJController extends Controller
{
    public function index()
    {
        $data = T_spj::where('status_verifikator', 1)->orWhere('status_verifikator', 2)->paginate(15);

        return view('verifikator.transaksi.spj.index', compact('data'));
    }

    public function tolakSPJ($id)
    {
        T_spj::find($id)->update([
            'status_verifikator' => 0
        ]);
        Session::flash('success', 'Dikembalikan ke staff');
        return back();
    }

    public function kirimKePengeluaran($id)
    {
        T_spj::find($id)->update([
            'status_pengeluaran' => 1,
            'status_verifikator' => 2
        ]);
        Session::flash('success', 'Berhasil Dikirim ke bendahara pengeluaran');
        return back();
    }
}
