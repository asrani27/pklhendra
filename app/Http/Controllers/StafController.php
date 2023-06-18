<?php

namespace App\Http\Controllers;

use App\Models\T_bku_rekening;
use App\Models\T_bku_rekening_detail;
use App\Models\T_spj;
use Illuminate\Http\Request;

class StafController extends Controller
{
    public function index()
    {
        return view('verifikator.home');
    }
}
