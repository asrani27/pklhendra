<?php

namespace App\Http\Controllers;

use App\Models\T_spj;
use Illuminate\Http\Request;

class VerifikatorSPJController extends Controller
{
    public function index()
    {
        $data = T_spj::where('status_verifikator', 1)->paginate(15);

        return view('verifikator.transaksi.spj.index', compact('data'));
    }
}
