<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function sigemoy()
    {
        return view('Frontend.sigemoy');
    }
}
