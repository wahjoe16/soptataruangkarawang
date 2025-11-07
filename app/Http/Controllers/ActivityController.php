<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Sop;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    public function index()
    {
        $data = [
            'menuActivity' => 'active',
            'title' => 'Manajemen Kegiatan SOP',
            'activity' => Activity::get(),
        ];
        return view('activity.index', $data);
    }

    public function create()
    {
        $data = [
            'menuActivity' => 'active',
            'title' => 'Tambah Data Kegiatan SOP',
            'sop' => Sop::get(),
        ];

        return view('activity.create', $data);
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'sop_id' => 'required',
            'name' => 'required|string|max:255',
        ]);

        // Simpan data kegiatan SOP baru
        $activity = new Activity();
        $activity->sop_id = $request->input('sop_id');
        $activity->name = $request->input('name');
        $activity->save();

        return redirect()->route('activity.index')->with('success', 'Kegiatan SOP berhasil ditambahkan');
    }
}
