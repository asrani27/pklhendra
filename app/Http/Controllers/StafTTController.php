<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\T_bku_rekening_detail;
use Illuminate\Support\Facades\Session;

class StafTTController extends Controller
{
    public function billing(Request $req)
    {
        T_bku_rekening_detail::find($req->bku_rekening_detail_id)->update([
            'id_billing' => $req->id_billing
        ]);
        Session::flash('success', 'Berhasil Disimpan');
        return back();
    }
}
