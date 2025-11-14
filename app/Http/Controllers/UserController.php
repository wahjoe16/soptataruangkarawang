<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {   
        $data = [
            'menuUser' => 'active',
            'title' => 'Manajemen User',
            'user' => User::get(),
        ];
        return view('admin.user.index', $data);
    }

    public function create()
    {
        $data = [
            'menuUser' => 'active',
            'title' => 'Tambah Data User'
        ];
        return view('admin.user.create', $data);
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'nip' => 'required|string|max:10',
            'level' => 'required',
        ]);

        // Simpan data user baru
        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->nip = $request->input('nip');
        $user->level = $request->input('level');
        $user->password = bcrypt($user->nip); // Set password default atau generate secara acak
        $user->save();

        return redirect()->route('users.index')->with('success', 'User berhasil ditambahkan');
    }

    public function view($id)
    {
        $data = [
            'title' => 'Detail User',
            'user' => User::find($id),
            'menuUser' => 'active',
        ];

        return view('admin.user.view', $data);
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Edit User',
            'user' => User::find($id),
            'menuUser' => 'active',
        ];

        return view('admin.user.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->name = $request['name'];
        $user->nip = $request['nip'];
        $user->email = $request['email'];
        $user->level = $request['level'];
        $user->status = $request['status'];
        $user->save();

        return redirect()->route('users.index')->with('success', 'Data user berhasil diupdate!');
    }

    public function resetPassword($id)
    {
        $user = User::find($id);
        $user->password = Hash::make($user->nip);
        $user->save();

        return back()->with('success', 'Password user berhasil direset');
    }

    public function delete($id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect()->back()->with('success', 'User berhasil dihapus!');
    }
}
