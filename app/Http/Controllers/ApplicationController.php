<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Application;
use App\Models\Sop;
use App\Models\User;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    public function index()
    {
        $data = [
            'menuApplications' => 'active',
            'title' => 'Data Permohonan',
            'applications' => Application::with(['sop', 'user'])->get(),
        ];
        return view('application.index', $data);
    }

    public function create()
    {
        $data = [
            'menuApplications' => 'active',
            'title' => 'Tambah data permohonan',
            'sop' => Sop::get(),
        ];
        return view('application.create', $data);
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'name_applicant' => 'required|string|max:255',
            'sop_id' => 'required',
            'name' => 'required|string|max:255',
            'documents' => 'nullable|file',
        ]);

        // Simpan data permohonan baru
        $application = new Application();
        $application->name = $request->input('name');
        $application->name_applicant = $request->input('name_applicant');
        $application->address_application = $request->input('address_application');
        $application->sop_id = $request->input('sop_id');
        $application->link_file = $request->input('link_file');

        // date_application processing
        if ($request->has('date_application')) {
            $application->date_application = date('Y-m-d', strtotime($request->input('date_application')));
        }

        // date_deadline processing 14 weekdays after date_application
        if ($request->has('date_application')) {
            $date = strtotime($request->input('date_application'));
            $weekdaysAdded = 0;
            while ($weekdaysAdded < 14) {
                $date = strtotime("+1 day", $date);
                // Skip weekends
                if (date('N', $date) < 6) {
                    $weekdaysAdded++;
                }
            }
            $application->date_deadline = date('Y-m-d', $date);
        }
        
        $application->save();

        return redirect()->route('applications.index')->with('success', 'Permohonan berhasil ditambahkan');
    }

    public function viewApplication()
    {
        $data = [
            'menuApplicationsView' => 'active',
            'title' => 'Review Permohonan Baru',
            'applications' => Application::whereNull('user_id')->with(['sop', 'user'])->get(),
        ];

        return view('application.view', $data);
    }

    public function reviewApplication($id)
    {
        $data = [
            'menuApplicationsCheck' => 'active',
            'title' => 'Review Permohonan',
            'application' => Application::where('id', $id)->with(['sop', 'user'])->first(),
            'evaluators' => User::where('level', 'Evaluator')->get(),
        ];

        return view('application.review', $data);
    }

    public function assign(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'user_id' => 'required|exists:users,id',
        ]);

        // Update aplikasi dengan evaluator yang ditugaskan
        $application = Application::findOrFail($id);
        $application->user_id = $request->input('user_id');
        $application->status_1 = 1;
        $application->save();

        return redirect()->route('applications.check')->with('success', 'Permohonanberhasil ditugaskan ke Evaluator');
    }
}
