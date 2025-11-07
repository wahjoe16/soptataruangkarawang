<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

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
}
