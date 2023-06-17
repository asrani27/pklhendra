<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VerifikatorController extends Controller
{

    public function index()
    {
        return view('verifikator.home');
    }
}
