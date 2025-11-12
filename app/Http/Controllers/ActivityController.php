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

    public function edit($id)
    {
        $data = [
            'title' => 'Edit Activity SOP',
            'sop' => Sop::get(),
            'activity' => Activity::find($id),
            'menuAct' => 'active',
        ];

        return view('activity.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $activity = Activity::find($id);
        $activity->sop_id = $request['sop_id'];
        $activity->name = $request['name'];
        $activity->status = $request['status'];
        $activity->save();

        return redirect()->route('activity.index')->with('success', 'Kegiatan SOP berhasil diupdate!');
    }
}
