<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Application;
use App\Models\ApplicationActivity;
use App\Models\Sop;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    public function edit($id)
    {
        $data = [
            'menuApplications' => 'active',
            'title' => 'Edit data permohonan',
            'sop' => Sop::get(),
            'app' => Application::find($id)
        ];
        return view('application.edit', $data);
    }

    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'name_applicant' => 'required|string|max:255',
            'sop_id' => 'required',
            'name' => 'required|string|max:255',
            'documents' => 'nullable|file',
        ]);

        // Simpan data permohonan baru
        $application = Application::find($id);
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

        return redirect()->route('applications.index')->with('success', 'Permohonan berhasil diupdate!');
    }

    public function uploadArchive(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'link_archive' => 'max:255',
        ]);

        $application = Application::find($id);
        $application->link_archive = $request->input('link_archive');
        $application->save();
        
        return redirect()->route('applications.index')->with('success', 'Arsip berhasil diupload!');
    }

    public function viewApplication()
    {
        $data = [
            'menuApplicationsView' => 'active',
            'title' => 'Review Permohonan Baru',
            'applications' => Application::whereNull('user_id')->with(['sop', 'user'])->orderBy('id', 'desc')->get(),
        ];

        return view('application.view', $data);
    }

    public function reviewApplication($id)
    {
        $application = Application::where('id', $id)->with(['sop', 'user'])->first();

        $data = [
            'menuApplicationsCheck' => 'active',
            'title' => 'Review Permohonan',
            'application' => $application,
            'evaluators' => User::withCount('applications')->where('level', 'Evaluator')->get(),
            
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
        $application->save();

        $activity = Activity::where('sop_id', $application['sop_id'])->get();
        foreach($activity as $key => $value){
            $appActivity = new ApplicationActivity();
            $appActivity->application_id = $application['id'];
            $appActivity->activity_id = $value['id'];
            $appActivity->save();
        }

        return redirect()->route('applications.view')->with('success', 'Permohonanberhasil ditugaskan ke Evaluator');
    }

    public function applicationDetail($id)
    {
        $data = [
            'menuApplicationsView' => 'active',
            'title' => 'Detail Permohonan',
            'application' => Application::where('id', $id)->with(['sop', 'user'])->first(),
            'appActivity' => ApplicationActivity::where('application_id', $id)->get(),
        ];
        
        return view('application.application_detail', $data);
    }

    public function viewEvaluatorApplication()
    {
        $application = Application::with('sop')->where(['user_id' => Auth::user()->id, 'status' => 0])->get();

        $data = [
            'menuMyApplications' => 'active',
            'title' => 'List Permohonan',
            'application' => $application
        ];

        return view('application.evaluator_applications', $data);
    }

    public function evaluatorApplicationDetail($id)
    {
        $data = [
            'menuEvaluatorApplications' => 'active',
            'title' => 'Detail Permohonan',
            'application' => Application::where('id', $id)->with(['sop', 'user'])->first(),
            'appActivity' => ApplicationActivity::where('application_id', $id)->get(),
        ];
        
        return view('application.evaluator_application_detail', $data);
    }

    public function updateStatusApplication(Request $request, $id)
    {
        $progress = ApplicationActivity::find($id);

        if(!$progress){
            return response()->json(['error' => 'Item not found'], 404);
        }

        $progress->status = $request->input('status');
        $progress->save();

        return redirect()->back()->with('success', 'Status progress permohonan berhasil diupdate');
    }

    public function finishStatusApplication($id)
    {
        $application = Application::find($id);
        $application->status = 1;
        $application->save();

        return redirect()->route('evaluatorApplication.view')->with('success', 'Status Permohonan Telah Selesai!');
    }

    public function rejectStatusApplication($id)
    {
        $application = Application::find($id);
        $application->status = 2;
        $application->save();

        return redirect()->route('evaluatorApplication.view')->with('success', 'Status Permohonan Dibatalkan!');
    }
}
