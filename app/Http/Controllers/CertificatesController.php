<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CertificatesController extends Controller
{
    public function pageCertificates()
    {
        return view('grupos.dashboard');
    }
}
