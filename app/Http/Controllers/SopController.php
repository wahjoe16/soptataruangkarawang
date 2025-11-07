<?php

namespace App\Http\Controllers;

use App\Models\Sop;
use Illuminate\Http\Request;

class SopController extends Controller
{
    public function index()
    {
        $data = [
            'menuSop' => 'active',
            'title' => 'Manajemen SOP',
            'sop' => Sop::get(),
        ];
        return view('sop.index', $data);
    }

    public function create()
    {
        $data = [
            'menuSop' => 'active',
            'title' => 'Tambah Data SOP'
        ];
        return view('sop.create', $data);
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'code' => 'required'
        ]);

        // Simpan data kategori tugas baru
        $sop = new Sop();
        $sop->code = $request->input('code');
        $sop->name = $request->input('name');
        $sop->save();

        return redirect()->route('sop.index')->with('success', 'SOP berhasil ditambahkan');
    }
}
