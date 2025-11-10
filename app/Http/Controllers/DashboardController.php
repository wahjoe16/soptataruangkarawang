<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $applicationKatim = Application::with('sop', 'user')->where('user_id', '!=', null)->orderBy('id', 'desc')->get();

        $data = [
            'title' => 'Beranda',
            'menuDashboard' => 'active',
            'applicationKatim' => $applicationKatim,
        ];
        
        return view('dashboard', $data);
    }
}
