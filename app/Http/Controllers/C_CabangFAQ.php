<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FAQ;

class C_CabangFAQ extends Controller
{
    public function index()
    {
        $faqs = FAQ::simplePaginate(10);
        return view('cabang.faq', compact('faqs'));
    }
}
