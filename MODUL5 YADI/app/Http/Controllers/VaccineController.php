<?php

namespace App\Http\Controllers;

use App\Models\vaccine;
use Illuminate\Http\Request;

class VaccineController extends Controller
{
    public function index()
    {
        $vaccines = vaccine::get();
        return view('vaccine', compact('vaccines'));
    }

    public function store()
    {
        $attr = request()->validate([
            'name' => 'required',
            'price' => 'required|regex:/^\d+(\.\d{1,2})?$/',
            'description' => 'required'
        ]);

        vaccine::create($atr);

        return redirect()->back()->with('success', 'BERHASIL TAMBAH VAKSIN!');
    }

    public function update(vaccine $vaccine)
    {
        $attr = request()->validate([
            'name' => 'required',
            'price' => 'required|regex:/^\d+(\.\d{1,2})?$/',
            'description' => 'required'
        ]);

        $vaccine->update($attr);
        return redirect()->back()->with('success', 'BERHASIL UPDATE VAKSIN!');
    }

    public function destroy(vaccine $vaccine)
    {
        $vaccine->delete();
        return redirect()->back()->with('success', 'BERHASIL HAPUS VAKSIN!');
    }
}
