<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExtraController extends Controller
{
    public function swap()
    {
        return view('swapvariable', ['title' => 'Swap Variable']);
    }

    public function formatrupiah()
    {
        return view ('formatrupiah', ['title' => 'Format Rupiah']);
    }
}
