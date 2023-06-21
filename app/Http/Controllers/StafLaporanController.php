<?php

namespace App\Http\Controllers;

use App\Models\T_spj;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StafLaporanController extends Controller
{
    public function spj()
    {
        $data = T_spj::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->paginate(15);
        return view('staf.laporan.spj', compact('data'));
    }
    public function bku()
    {
        $data = T_spj::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->paginate(15);
        return view('staf.laporan.bku', compact('data'));
    }
    public function npd()
    {
        $data = T_spj::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->paginate(15);
        return view('staf.laporan.npd', compact('data'));
    }
    public function sptjb()
    {
        $data = T_spj::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->paginate(15);
        return view('staf.laporan.sptjb', compact('data'));
    }
    public function kwitansi()
    {
        $data = T_spj::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->paginate(15);
        return view('staf.laporan.kwitansi', compact('data'));
    }
    public function jkn()
    {
        $data = T_spj::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->paginate(15);
        return view('staf.laporan.jkn', compact('data'));
    }
    public function jkk()
    {
        $data = T_spj::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->paginate(15);
        return view('staf.laporan.jkk', compact('data'));
    }
    public function jkm()
    {
        $data = T_spj::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->paginate(15);
        return view('staf.laporan.jkm', compact('data'));
    }
    public function nodin()
    {
        $data = T_spj::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->paginate(15);
        return view('staf.laporan.nodin', compact('data'));
    }
}
