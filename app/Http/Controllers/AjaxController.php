<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Application;
use App\Models\Sop;
use App\Models\User;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AjaxController extends Controller
{
    public function userData()
    {
        // Logic to fetch and return user data for DataTables
        $user = User::get();

        return datatables()->of($user)
            ->addIndexColumn()
            ->addColumn('name', function($user){
                return '<p class="text-muted">'.$user->name.'</p>';
            })
            ->addColumn('level', function($user){
                return '<p class="text-muted">'.$user->level.'</p>';
            })
            ->addColumn('email', function($user){
                return '<p class="text-muted">'.$user->email.'</p>';
            })
            ->addColumn('status', function($user){
                if ($user->status == 1) {
                    return '<p style="text-align:center;"><span class="text-muted badge bg-success">Aktif</span></p>';
                } elseif ($user->status == 0) {
                    return '<p style="text-align:center;"><span class="text-muted badge bg-danger">Non Aktif</span></p>';
                }
            })
            ->addColumn('action', function($user){
                $deleteUrl = route('users.delete', $user->id);
                $btn = '
                            <a href="'.route('users.view', $user->id).'" class="btn btn-outline-primary btn-sm"><i class="mdi mdi-magnify"></i>&nbsp;</a>
                            <a href="'.route('users.edit', $user->id).'" class="btn btn-outline-warning btn-sm"><i class="icon-pencil"></i></a>
                            <a href="javascript:void(0)" data-url="'.$deleteUrl.'" data-id="'. $user->id .'" class="btn btn-outline-danger btn-sm confirmDelete"><i class="icon-trash"></i></a>
                        ';
                    
                return $btn;
            })
            ->rawColumns(['name', 'email', 'level', 'status', 'action'])
            ->make(true);
    }

    public function sopData()
    {
        // Logic to fetch and return SOP data for DataTables
        $sop = Sop::get();

        return datatables()->of($sop)
            ->addIndexColumn()
            ->addColumn('code', function($sop){
                return '<p class="text-muted">'.$sop->code.'</p>';
            })
            ->addColumn('name', function($sop){
                return '<p class="text-muted">'.$sop->name.'</p>';
            })
            ->addColumn('status', function($sop){
                if ($sop->status == 1) {
                    return '<span class="text-muted badge bg-success">Aktif</span>';
                } elseif ($sop->status == 0) {
                    return '<span class="text-muted badge bg-danger">Non Aktif</span>';
                }
            })
            ->addColumn('action', function($sop){
                $btn = '
                            <a href="'.route('sop.edit', $sop->id).'" class="btn btn-outline-warning btn-sm"><i class="icon-pencil"></i></a>
                       ';
                return $btn;
            })
            ->rawColumns(['code', 'name', 'status', 'action'])
            ->make(true);
    }

    public function activityData()
    {
        // Logic to fetch and return Activity data for DataTables
        $activity = Activity::get();

        return datatables()->of($activity)
            ->addIndexColumn()
            ->addColumn('code', function($activity){
                return '<p class="text-muted">'.$activity->sop->code.'</p>';
            })
            ->addColumn('name', function($activity){
                return '<p class="text-muted">'.$activity->name.'</p>';
            })
            ->addColumn('status', function($activity){
                if ($activity->status == 1) {
                    return '<span class="text-muted badge bg-success">Aktif</span>';
                } elseif ($activity->status == 0) {
                    return '<span class="text-muted badge bg-danger">Non Aktif</span>';
                }
            })
            ->addColumn('action', function($activity){
                $btn = '
                            <a href="'.route('activity.edit', $activity->id).'" class="btn btn-outline-warning btn-sm"><i class="icon-pencil"></i></a>
                       ';
                return $btn;
            })
            ->rawColumns(['code', 'name', 'status', 'action'])
            ->make(true);
    }

    public function applicationData()
    {
        $application = Application::with('sop', 'user')->orderBy('id', 'desc')->get();

        return datatables()->of($application)
            ->addIndexColumn()
            ->addColumn('name', function($application){
                return '<p class="text-muted">'.$application->name.'</p>';
            })
            ->addColumn('code', function($application){
                return '<p class="text-muted" title="'.$application->sop->name.'">'.$application->sop->code.'</p>';
            })
            ->addColumn('name_applicant', function($application){
                return '<p class="text-muted">'.$application->name_applicant.'</p>';
            })
            ->addColumn('user_id', function($application){
                if (is_null($application->user_id)) {
                    return '<span class="badge bg-warning text-muted">Not Assign</span>';
                } else {
                    return '<p class="text-muted">'.$application->user->name.'</p>';
                }
            })
            ->addColumn('status', function($application){
                

                if ($application->status == 0) {
                    return '<span class="badge bg-success text-white">On Progress</span>';
                } elseif ($application->status == 1) {
                    return '<span class="badge bg-info text-white">Selesai</span>';
                } else {
                    return '<span class="badge bg-danger text-white">Ditolak / Dibatalkan</span>';
                }

            })
            ->addColumn('action', function($application){
                $btn = '
                            <a href="'.route('applications.edit', $application->id).'" class="btn btn-outline-warning btn-sm"><i class="icon-pencil"></i></a>
                       ';
                return $btn;
            })
            ->rawColumns(['name', 'code', 'name_applicant', 'user_id', 'status', 'action'])
            ->make(true);
    }

    public function evaluatorApplicationData()
    {
        $applicationEvaluator = Application::with('sop')->where(['user_id' => Auth::user()->id, 'status' => 0])->get();

        return datatables()->of($applicationEvaluator)
            ->addIndexColumn()
            ->addColumn('name', function($applicationEvaluator){
                return '<p class="text-muted">'.$applicationEvaluator->name.'</p>';
            })
            ->addColumn('code', function($applicationEvaluator){
                return '<p class="text-muted" title="'.$applicationEvaluator->sop->name.'">'.$applicationEvaluator->sop->code.'</p>';
            })
            ->addColumn('name_applicant', function($applicationEvaluator){
                return '<p class="text-muted">'.$applicationEvaluator->name_applicant.'</p>';
            })
            ->addColumn('date_application', function($applicationEvaluator){
                return '<p class="text-muted">'.date('d M Y', strtotime($applicationEvaluator->date_application)).'</p>';
            })
            ->addColumn('date_deadline', function($applicationEvaluator){
                return '<p class="text-muted">'.date('d M Y', strtotime($applicationEvaluator->date_deadline)).'</p>';
            })
            ->addColumn('sisa_waktu', function($applicationEvaluator){
                $start = new DateTime();
                $end = new DateTime($applicationEvaluator['date_deadline']);
                // $sisaWaktu = date_diff($start, $end);
                $sisaWaktu = $start->diff($end);

                $weekDay = 0;
                $day = clone $start;

                while($day <= $end) {
                    $thisDay = $day->format('N');
                    if ($thisDay >= 1 && $thisDay <=5) {
                        $weekDay++;
                    }
                    $day->modify('+1 day');
                }

                if ($weekDay >= 8) {
                    return '<span class="badge bg-success text-white">'.$weekDay.'&nbsp;Hari</span>';
                } elseif ($weekDay > 4) {
                    return '<span class="badge bg-warning text-white">'.$weekDay.'&nbsp;Hari</span>';
                } else {
                    return '<span class="badge bg-danger text-white">'.$weekDay.'&nbsp;Hari</span>';
                }
                
            })
            ->addColumn('action', function($applicationEvaluator){
                $btn = '
                            <a href="'.route('applications.evaluator.detail', $applicationEvaluator->id).'" class="btn btn-outline-primary btn-sm"><i class="mdi mdi-magnify"></i>&nbsp;</a>
                       ';
                return $btn;
            })
            ->rawColumns(['name', 'code', 'name_applicant', 'date_application', 'date_deadline', 'sisa_waktu', 'action'])
            ->make(true);
    }

    public function applicationViewData()
    {
        $applicationView = Application::with('sop', 'user')->whereNull('user_id')->get();

        return datatables()->of($applicationView)
            ->addIndexColumn()
            ->addColumn('name', function($applicationView){
                return '<p class="text-muted">'.$applicationView->name.'</p>';
            })
            ->addColumn('code', function($applicationView){
                return '<p class="text-muted" title="'.$applicationView->sop->name.'">'.$applicationView->sop->code.'</p>';
            })
            ->addColumn('name_applicant', function($applicationView){
                return '<p class="text-muted">'.$applicationView->name_applicant.'</p>';
            })
            ->addColumn('user_id', function($applicationView){
                if ($applicationView->user_id != null) {
                    return '<p class="text-muted">'.$applicationView->user->name.'</p>';
                } else
                    return '<span class="badge bg-warning text-muted">Not Assign</span>';
            })
            ->addColumn('date_application', function($applicationView){
                return '<p class="text-muted">'.date('d M Y', strtotime($applicationView->date_application)).'</p>';
            })
            ->addColumn('date_deadline', function($applicationView){
                return '<p class="text-muted">'.date('d M Y', strtotime($applicationView->date_deadline)).'</p>';
            })
            ->addColumn('sisa_waktu', function($applicationView){
                $start = new DateTime();
                $end = new DateTime($applicationView['date_deadline']);
                // $sisaWaktu = date_diff($start, $end);
                $sisaWaktu = $start->diff($end);
                $weekDay = 0;
                $day = clone $start;
                while($day <= $end) {
                    $thisDay = $day->format('N');
                    if ($thisDay >= 1 && $thisDay <=5) {
                        $weekDay++;
                    }
                    $day->modify('+1 day');
                }
                if ($weekDay >= 8) {
                    return '<span class="badge bg-success text-white">'.$weekDay.'&nbsp;Hari</span>';
                } elseif ($weekDay > 4) {
                    return '<span class="badge bg-warning text-white">'.$weekDay.'&nbsp;Hari</span>';
                } else {
                    return '<span class="badge bg-danger text-white">'.$weekDay.'&nbsp;Hari</span>';
                }
            })
            ->addColumn('action', function($applicationView){
                $btn = '
                            <a href="'.route('applications.review', $applicationView->id).'" class="btn btn-outline-info btn-sm"><i class="icon-user"></i>&nbsp;</a>
                       ';
                return $btn;
            })
            ->rawColumns(['name', 'code', 'name_applicant', 'user_id', 'date_application', 'date_deadline', 'sisa_waktu', 'action'])
            ->make(true);
    }

    public function applicationActiveData()
    {
        $applicationKatim = Application::with('sop', 'user')->where('status', 0)->whereNotNull('user_id')->orderBy('id', 'desc')->get();

        return datatables()->of($applicationKatim)
            ->addIndexColumn()
            ->addColumn('name', function($applicationKatim){
                return '<p class="text-muted">'.$applicationKatim->name.'</p>';
            })
            ->addColumn('code', function($applicationKatim){
                return '<p class="text-muted" title="'.$applicationKatim->sop->name.'">'.$applicationKatim->sop->code.'</p>';
            })
            ->addColumn('name_applicant', function($applicationKatim){
                return '<p class="text-muted">'.$applicationKatim->name_applicant.'</p>';
            })
            ->addColumn('user_id', function($applicationKatim){
                return '<p class="text-muted">'.$applicationKatim->user->name.'</p>';
            })
            ->addColumn('sisa_waktu', function($applicationKatim){
                $start = new DateTime();
                $end = new DateTime($applicationKatim['date_deadline']);
                // $sisaWaktu = date_diff($start, $end);
                $sisaWaktu = $start->diff($end);

                $weekDay = 0;
                $day = clone $start;

                while($day <= $end) {
                    $thisDay = $day->format('N');
                    if ($thisDay >= 1 && $thisDay <=5) {
                        $weekDay++;
                    }
                    $day->modify('+1 day');
                }

                if ($weekDay >= 8) {
                    return '<span class="badge bg-success text-white">'.$weekDay.'&nbsp;Hari</span>';
                } elseif ($weekDay > 4) {
                    return '<span class="badge bg-warning text-white">'.$weekDay.'&nbsp;Hari</span>';
                } else {
                    return '<span class="badge bg-danger text-white">'.$weekDay.'&nbsp;Hari</span>';
                }
                
            })
            ->addColumn('action', function($applicationKatim){
                $btn = '
                            <a href="'.route('applications.detail', $applicationKatim->id).'" class="btn btn-outline-primary btn-sm"><i class="mdi mdi-magnify"></i>&nbsp;</a>
                       ';
                return $btn;
            })
            ->rawColumns(['name', 'code', 'name_applicant', 'user_id', 'sisa_waktu', 'action'])
            ->make(true);

    }

    public function historyApplicationData()
    {
        $historyApplication = Application::with('sop', 'user')->where('status', 1)->orWhere('status', 2)->orderBy('id', 'desc')->get();

        return datatables()->of($historyApplication)
            ->addIndexColumn()
            ->addColumn('name', function($historyApplication){
                return '<p class="text-muted">'.$historyApplication->name.'</p>';
            })
            ->addColumn('code', function($historyApplication){
                return '<p class="text-muted" title="'.$historyApplication->sop->name.'">'.$historyApplication->sop->code.'</p>';
            })
            ->addColumn('name_applicant', function($historyApplication){
                return '<p class="text-muted">'.$historyApplication->name_applicant.'</p>';
            })
            ->addColumn('user_id', function($historyApplication){
                return '<p class="text-muted">'.$historyApplication->user->name.'</p>';
            })
            ->addColumn('status', function($historyApplication){
                if ($historyApplication->status == 1) {
                    return '<span class="badge bg-info text-white">Selesai</span>';
                } else {
                    return '<span class="badge bg-danger text-white">Ditolak / Dibatalkan</span>';
                }
            })
            ->addColumn('action', function($historyApplication){
                $btn = '
                            <a href="'.route('applications.detail', $historyApplication->id).'" class="btn btn-outline-primary btn-sm"><i class="mdi mdi-magnify"></i>&nbsp;</a>
                       ';
                return $btn;
            })
            ->rawColumns(['name', 'code', 'name_applicant', 'user_id', 'status', 'action'])
            ->make(true);
    }

    public function historyEvaluatorApplicationData($id)
    {
        $historyEvaluatorApplication = Application::with('sop')->whereNot('status', 0)->where('sop_id', $id)->where('user_id', Auth::user()->id)->get();

        return datatables()->of($historyEvaluatorApplication)
            ->addIndexColumn()
            ->addColumn('name', function($historyEvaluatorApplication){
                return '<p class="text-muted">'.$historyEvaluatorApplication->name.'</p>';
            })
            ->addColumn('address_application', function($historyEvaluatorApplication){
                return '<p class="text-muted">'.$historyEvaluatorApplication->address_application.'</p>';
            })
            ->addColumn('sop.code', function($historyEvaluatorApplication){
                return '<p class="text-muted" title="'.$historyEvaluatorApplication->sop->name.'">'.$historyEvaluatorApplication->sop->code.'</p>';
            })
            ->addColumn('name_applicant', function($historyEvaluatorApplication){
                return '<p class="text-muted">'.$historyEvaluatorApplication->name_applicant.'</p>';
            })
            ->addColumn('date_application', function($historyEvaluatorApplication){ 
                return '<p class="text-muted">'.date('d M Y', strtotime($historyEvaluatorApplication->date_application)).'</p>';
            })
            ->addColumn('status', function($historyEvaluatorApplication){
                if ($historyEvaluatorApplication->status == 1) {
                    return '<span class="badge bg-info text-white">Selesai</span>';
                } else {
                    return '<span class="badge bg-danger text-white">Ditolak / Dibatalkan</span>';
                }
            })
            ->addColumn('action', function($applicationEvaluator){
                $btn = '
                            <a href="'.route('applications.evaluator.detail', $applicationEvaluator->id).'" class="btn btn-outline-primary btn-sm"><i class="mdi mdi-magnify"></i>&nbsp;</a>
                       ';
                return $btn;
            })
            ->rawColumns(['name', 'sop.code', 'address_application' , 'name_applicant', 'date_application', 'status', 'action'])
            ->make(true);
    }

    public function historyEvaluatorProfileApplicationData()
    {
        $applications = Application::with('sop')->whereNot('status', 0)->where('user_id', Auth::user()->id)->get();

        return datatables()->of($applications)
            ->addIndexColumn()
            ->addColumn('name', function($applications){
                return '<p class="text-muted">'.$applications->name.'</p>';
            })
            ->addColumn('address_application', function($applications){
                return '<p class="text-muted">'.$applications->address_application.'</p>';
            })
            ->addColumn('sop.code', function($applications){
                return '<p class="text-muted" title="'.$applications->sop->name.'">'.$applications->sop->code.'</p>';
            })
            ->addColumn('name_applicant', function($applications){
                return '<p class="text-muted">'.$applications->name_applicant.'</p>';
            })
            ->addColumn('date_application', function($applications){ 
                return '<p class="text-muted">'.date('d M Y', strtotime($applications->date_application)).'</p>';
            })
            ->addColumn('status', function($applications){
                if ($applications->status == 1) {
                    return '<span class="badge bg-info text-white">Selesai</span>';
                } else {
                    return '<span class="badge bg-danger text-white">Ditolak / Dibatalkan</span>';
                }
            })
            ->rawColumns(['name', 'sop.code', 'address_application' , 'name_applicant', 'date_application', 'status'])
            ->make(true);
    }

    public function viewEvaluatorData($id)
    {
        $user = User::where('name', $id)->first();

        $evaluatorApplication = $user->applications()->with('sop')->get();

        return datatables()->of($evaluatorApplication)
            ->addIndexColumn()
            ->addColumn('name', function($evaluatorApplication){
                return '<p class="text-muted">'.$evaluatorApplication->name.'</p>';
            })
            ->addColumn('code', function($evaluatorApplication){
                return '<p class="text-muted" title="'.$evaluatorApplication->sop->name.'">'.$evaluatorApplication->sop->code.'</p>';
            })
            ->addColumn('name_applicant', function($evaluatorApplication){
                return '<p class="text-muted">'.$evaluatorApplication->name_applicant.'</p>';
            })
            ->addColumn('address_application', function($evaluatorApplication){
                return '<p class="text-muted">'.$evaluatorApplication->address_application.'</p>';
            })
            ->addColumn('date_application', function($evaluatorApplication){
                return '<p class="text-muted">'.date('d M Y', strtotime($evaluatorApplication->date_application)).'</p>';
            })
            ->addColumn('date_deadline', function($evaluatorApplication){
                return '<p class="text-muted">'.date('d M Y', strtotime($evaluatorApplication->date_deadline)).'</p>';
            })
            ->addColumn('sisa_waktu', function($evaluatorApplication){
                $start = new DateTime();
                $end = new DateTime($evaluatorApplication['date_deadline']);
                // $sisaWaktu = date_diff($start, $end);
                $sisaWaktu = $start->diff($end);

                $weekDay = 0;
                $day = clone $start;

                while($day <= $end) {
                    $thisDay = $day->format('N');
                    if ($thisDay >= 1 && $thisDay <=5) {
                        $weekDay++;
                    }
                    $day->modify('+1 day');
                }

                if ($weekDay >= 8) {
                    return '<span class="badge bg-success text-white">'.$weekDay.'&nbsp;Hari</span>';
                } elseif ($weekDay > 4) {
                    return '<span class="badge bg-warning text-white">'.$weekDay.'&nbsp;Hari</span>';
                } else {
                    return '<span class="badge bg-danger text-white">'.$weekDay.'&nbsp;Hari</span>';
                }
                
            })
            ->rawColumns(['name', 'code', 'name_applicant', 'address_application', 'date_application', 'date_deadline', 'sisa_waktu'])
            ->make(true);

    }

}
