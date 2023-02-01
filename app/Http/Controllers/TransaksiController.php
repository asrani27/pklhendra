<?php

namespace App\Http\Controllers;

use App\Models\T_bku;
use App\Models\T_bku_rekening;
use App\Models\T_bku_rekening_detail;
use App\Models\T_spj;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function index($id)
    {
        return view('admin.transaksi.index', compact('id'));
    }

    public function spj($id)
    {
        $data = T_spj::find($id);
        $detail = $data->detail;
        return view('admin.transaksi.spj.detail', compact('data', 'id', 'detail'));
    }
    public function bku($id)
    {
        $data = T_spj::find($id);
        $rekening = T_bku_rekening::where('t_spj_id', $id)->get();
        $total = T_bku_rekening_detail::where('t_spj_id', $id)->get();
        return view('admin.transaksi.bku.rekening', compact('data', 'rekening', 'id', 'total'));
    }
    public function npd($id)
    {
        return view('admin.transaksi.index', compact('id'));
    }
    public function sptjb($id)
    {
        return view('admin.transaksi.index', compact('id'));
    }
    public function kuitansisatu($id)
    {
        return view('admin.transaksi.index', compact('id'));
    }
}
