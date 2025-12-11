<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Sop;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        // data permohonan on progress untuk katim dan kabid
        $applicationKatim = Application::with('sop', 'user')->where('status', 0)->whereNotNull('user_id')->orderBy('id', 'desc')->get();
        
        // data histori permohonan
        $historyApplication = Application::with('sop', 'user')->where('status', 1)->orWhere('status', 2)->orderBy('id', 'desc')->get();

        // data evaluator beserta jumlah permohonan yang ditugaskan
        $evaluator = User::with('applications')->where([
            'level' => 'Evaluator'
        ])->get();

        // data sop untuk dashboard
        $sop = Sop::get();

        // Permohonan SOP 1 yang sudah 3 bulan dari tanggal disahkan
        // $applications3months = Application::where('sop_id', 1)
        //     ->with(['sop', 'user'])
        //     ->where('status', 1)
        //     ->get()
        //     ->filter(function ($application) {
        //         $dateApproved = \Carbon\Carbon::parse($application->date_deadline);
        //         // $expirationDate = $dateApproved->copy()->addMonths(3)->addDays(10);
        //         $expirationDate = $dateApproved->copy()->addMonths(3);
        //         return \Carbon\Carbon::now()->greaterThan($expirationDate);
        //     });

        $applications3months = Application::where('sop_id', 1)
            ->with(['sop', 'user'])
            ->where('status', 1)
            ->whereDate('date_deadline', '<=', Carbon::now()->subMonths(3))
            ->get();
        
        // permohonan SOP 1 yang lebih dari 3 bulan dan kurang dari 3 bulan 10 hari
        $applications3months10days = $applications3months->filter(function ($application) {
            $dateApproved = \Carbon\Carbon::parse($application->date_deadline);
            $expirationDateStart = $dateApproved->copy()->addMonths(3);
            $expirationDateEnd = $dateApproved->copy()->addMonths(3)->addDays(10);
            return \Carbon\Carbon::now()->greaterThan($expirationDateStart) || \Carbon\Carbon::now()->lessThanOrEqualTo($expirationDateEnd);
        });

        // dd($applications3months);

        // untuk menampilkan line cart permohonan perbulan selama 12 bulan terakhir
        $months = [];
        $dataApp = [];
        $dataSop1 = [];
        $dataSop2 = [];
        $dataSop3 = [];
        $dataSop4 = [];
        $dataSop5 = [];
        $dataSop6 = [];
        $dataSop7 = [];

        for ($i = 11; $i >= 0; $i--) {
            $date = Carbon::now()->subMonths($i);
            $monthsName = $date->format('M Y');
            $months[] = $monthsName;

            $dataCount = Application::whereYear('date_application', $date->year)
                ->whereMonth('date_application', $date->month)
                ->count();
            
            $dataCountSop1 = Application::whereYear('date_application', $date->year)
                ->whereMonth('date_application', $date->month)
                ->where('sop_id', 1)
                ->count();
            
            $dataCountSop2 = Application::whereYear('date_application', $date->year)
                ->whereMonth('date_application', $date->month)
                ->where('sop_id', 2)
                ->count();

            $dataCountSop3 = Application::whereYear('date_application', $date->year)
                ->whereMonth('date_application', $date->month)
                ->where('sop_id', 3)
                ->count();

            $dataCountSop4 = Application::whereYear('date_application', $date->year)
                ->whereMonth('date_application', $date->month)
                ->where('sop_id', 4)
                ->count();

            $dataCountSop5 = Application::whereYear('date_application', $date->year)
                ->whereMonth('date_application', $date->month)
                ->where('sop_id', 5)
                ->count();

            $dataCountSop6 = Application::whereYear('date_application', $date->year)
                ->whereMonth('date_application', $date->month)
                ->where('sop_id', 6)
                ->count();

            $dataCountSop7 = Application::whereYear('date_application', $date->year)
                ->whereMonth('date_application', $date->month)
                ->where('sop_id', 7)
                ->count();

            $dataApp[] = $dataCount;
            $dataSop1[] = $dataCountSop1;
            $dataSop2[] = $dataCountSop2;
            $dataSop3[] = $dataCountSop3;
            $dataSop4[] = $dataCountSop4;
            $dataSop5[] = $dataCountSop5;
            $dataSop6[] = $dataCountSop6;
            $dataSop7[] = $dataCountSop7;
        }

        // menampilkan distribusi permohonan setiap evaluator
        $evaluatorName = User::where('level', 'Evaluator')->pluck('name');
        $userIds = User::where('level', 'Evaluator')->pluck('id')->toArray();
        $userIdsCount = count($userIds);
        $sopIds = Sop::pluck('id')->toArray();

        $results = [];
        foreach ($userIds as $uid) {
            $user = User::find($uid);

            foreach ($sopIds as $sid) {
                $count = $user->applications()
                              ->where('sop_id', $sid)
                              ->count();

                $results[$uid][$sid] = $count;
            }
        }

        $distribusiData = [];
        // for ($i = 0; $i < $userIdsCount; $i++) {
        //     $rowIndex = $i + 6; // karena results mulai dari index 6

        //     $distribusiData[] = [
        //         'name' => $evaluatorName[$i],
        //         'values' => array_slice($results[$rowIndex], 0, 7)
        //     ];
        // }
        foreach ($userIds as $index => $uid) {
            $distribusiData[] = [
                'name' => $evaluatorName[$index],
                'values' => array_values($results[$uid]), // Menggunakan array_values untuk menghindari masalah indeks
                'status' => User::find($uid)->status,
            ];
        }

        $data = [
            'title' => 'Beranda',
            'menuDashboard' => 'active',
            'applicationKatim' => $applicationKatim,
            'historyApplication' => $historyApplication,
            'months' => $months,
            'dataApp' => $dataApp,
            'dataSop1' => $dataSop1,
            'dataSop2' => $dataSop2,
            'dataSop3' => $dataSop3,
            'dataSop4' => $dataSop4,
            'dataSop5' => $dataSop5,
            'dataSop6' => $dataSop6,
            'dataSop7' => $dataSop7,
            'evaluatorName' => $evaluatorName,
            'sop' => $sop,
            'evaluator' => $evaluator,
            'distribusiData' => $distribusiData,
            'applications3months10days' => $applications3months10days,
            'applications3months' => $applications3months
        ];
        
        return view('dashboard', $data);
    }

    public function info()
    {
        $data = [
            'title' => 'Information Center',
        ];   
        return view('info', $data);
    }
}
