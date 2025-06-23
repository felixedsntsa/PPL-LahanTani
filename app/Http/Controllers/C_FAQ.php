<?php

namespace App\Http\Controllers;

use App\Models\FAQ;
use Illuminate\Http\Request;

class C_FAQ extends Controller
{
    public function index()
    {
        $faqs = FAQ::simplePaginate(10);
        return view('admin.faq', compact('faqs'));
    }

    public function create() { return view('admin.tambahfaq'); }

    public function store(Request $request)
    {
        $request->validate(['question' => 'required', 'answer' => 'required']);
        FAQ::create($request->only('question', 'answer'));
        return redirect()->route('admin.faq.index');
    }

    public function edit($id)
    {
        $faq = FAQ::findOrFail($id);
        return view('admin.editfaq', compact('faq'));
    }

    public function update(Request $request, $id)
    {
        $faq = FAQ::findOrFail($id);
        $faq->update($request->only('question', 'answer'));
        return redirect()->route('admin.faq.index');
    }

    public function destroy($id)
    {
        FAQ::findOrFail($id)->delete();
        return redirect()->route('admin.faq.index');
    }
}
