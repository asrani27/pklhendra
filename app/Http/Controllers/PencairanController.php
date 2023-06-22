<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PencairanController extends Controller
{
    public function index()
    {
        return view('pencairan.home');
    }
}
