<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OpsiViewController extends Controller
{
    public function opsiedukasi()
    {
        return view('opsiview.opsiedukasi');
    }

    public function opsirujukan()
    {
        return view('opsiview.opsirujukan');
    }

    public function opsisetelahedukasi()
    {
        return view('opsiview.opsisetelahedukasi');
    }
}
