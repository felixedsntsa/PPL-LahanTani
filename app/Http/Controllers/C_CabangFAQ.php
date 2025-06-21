<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FAQ;

class C_CabangFAQ extends Controller
{
    public function index()
    {
        $faqs = FAQ::all();
        return view('cabang.faq', compact('faqs'));
    }
}
