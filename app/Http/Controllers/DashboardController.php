<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Sop;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $applicationKatim = Application::with('sop', 'user')->where('status', 0)->whereNotNull('user_id')->orderBy('id', 'desc')->get();
        $evaluator = User::with('applications')->where([
            'level' => 'Evaluator'
        ])->get();
        $sop = Sop::get();
        // dd($sop);
        
        $userId1 = 6;
        $userId2 = 7;
        $userId3 = 8;
        $userId4 = 9;
        $userId5 = 10;
        $userId6 = 11;
        $userId7 = 12;
        $userId8 = 13;
        $userId9 = 14;
        $userId10 = 15;
        $userId11 = 16;
        $userId12 = 17;
        $userId13 = 18;

        $sopId1 = 1;
        $user1 = User::find($userId1);
        $sop1ev1 = $user1->applications()
                        ->where('sop_id', $sopId1)
                        ->count();

        $sopId2 = 2;
        $sop2ev1 = $user1->applications()
                        ->where('sop_id', $sopId2)
                        ->count();

        $sopId3 = 3;
        $sop3ev1 = $user1->applications()
                        ->where('sop_id', $sopId3)
                        ->count();
        
        $sopId4 = 4;
        $sop4ev1 = $user1->applications()
                        ->where('sop_id', $sopId4)
                        ->count();

        $sopId5 = 5;
        $sop5ev1 = $user1->applications()
                        ->where('sop_id', $sopId5)
                        ->count();

        $sopId6 = 6;
        $sop6ev1 = $user1->applications()
                        ->where('sop_id', $sopId6)
                        ->count();

        $sopId7 = 7;
        $sop7ev1 = $user1->applications()
                        ->where('sop_id', $sopId7)
                        ->count();

        $user2 = User::find($userId2);
        $sop1ev2 = $user2->applications()
                        ->where('sop_id', $sopId1)
                        ->count();
        $sop2ev2 = $user2->applications()
                        ->where('sop_id', $sopId2)
                        ->count();
        $sop3ev2 = $user2->applications()
                        ->where('sop_id', $sopId3)
                        ->count();
        $sop4ev2 = $user2->applications()
                        ->where('sop_id', $sopId4)
                        ->count();
        $sop5ev2 = $user2->applications()
                        ->where('sop_id', $sopId5)
                        ->count();
        $sop6ev2 = $user2->applications()
                        ->where('sop_id', $sopId6)
                        ->count();
        $sop7ev2 = $user2->applications()
                        ->where('sop_id', $sopId7)
                        ->count();

        $user3 = User::find($userId3);
        $sop1ev3 = $user3->applications()
                        ->where('sop_id', $sopId1)
                        ->count();
        $sop2ev3 = $user3->applications()
                        ->where('sop_id', $sopId2)
                        ->count();
        $sop3ev3 = $user3->applications()
                        ->where('sop_id', $sopId3)
                        ->count();
        $sop4ev3 = $user3->applications()
                        ->where('sop_id', $sopId4)
                        ->count();
        $sop5ev3 = $user3->applications()
                        ->where('sop_id', $sopId5)
                        ->count();
        $sop6ev3 = $user3->applications()
                        ->where('sop_id', $sopId6)
                        ->count();
        $sop7ev3 = $user3->applications()
                        ->where('sop_id', $sopId7)
                        ->count();

        $user4 = User::find($userId4);
        $sop1ev4 = $user4->applications()
                        ->where('sop_id', $sopId1)
                        ->count();
        $sop2ev4 = $user4->applications()
                        ->where('sop_id', $sopId2)
                        ->count();
        $sop3ev4 = $user4->applications()
                        ->where('sop_id', $sopId3)
                        ->count();
        $sop4ev4 = $user4->applications()
                        ->where('sop_id', $sopId4)
                        ->count();
        $sop5ev4 = $user4->applications()
                        ->where('sop_id', $sopId5)
                        ->count();
        $sop6ev4 = $user4->applications()
                        ->where('sop_id', $sopId6)
                        ->count();
        $sop7ev4 = $user4->applications()
                        ->where('sop_id', $sopId7)
                        ->count();

        $user5 = User::find($userId5);
        $sop1ev5 = $user5->applications()
                        ->where('sop_id', $sopId1)
                        ->count();
        $sop2ev5 = $user5->applications()
                        ->where('sop_id', $sopId2)
                        ->count();
        $sop3ev5 = $user5->applications()
                        ->where('sop_id', $sopId3)
                        ->count();
        $sop4ev5 = $user5->applications()
                        ->where('sop_id', $sopId4)
                        ->count();
        $sop5ev5 = $user5->applications()
                        ->where('sop_id', $sopId5)
                        ->count();
        $sop6ev5 = $user5->applications()
                        ->where('sop_id', $sopId6)
                        ->count();
        $sop7ev5 = $user5->applications()
                        ->where('sop_id', $sopId7)
                        ->count();

        $user6 = User::find($userId6);
        $sop1ev6 = $user6->applications()
                        ->where('sop_id', $sopId1)
                        ->count();
        $sop2ev6 = $user6->applications()
                        ->where('sop_id', $sopId2)
                        ->count();
        $sop3ev6 = $user6->applications()
                        ->where('sop_id', $sopId3)
                        ->count();
        $sop4ev6 = $user6->applications()
                        ->where('sop_id', $sopId4)
                        ->count();
        $sop5ev6 = $user6->applications()
                        ->where('sop_id', $sopId5)
                        ->count();
        $sop6ev6 = $user6->applications()
                        ->where('sop_id', $sopId6)
                        ->count();
        $sop7ev6 = $user6->applications()
                        ->where('sop_id', $sopId7)
                        ->count();

        $user7 = User::find($userId7);
        $sop1ev7 = $user7->applications()
                        ->where('sop_id', $sopId1)
                        ->count();
        $sop2ev7 = $user7->applications()
                        ->where('sop_id', $sopId2)
                        ->count();
        $sop3ev7 = $user7->applications()
                        ->where('sop_id', $sopId3)
                        ->count();
        $sop4ev7 = $user7->applications()
                        ->where('sop_id', $sopId4)
                        ->count();
        $sop5ev7 = $user7->applications()
                        ->where('sop_id', $sopId5)
                        ->count();
        $sop6ev7 = $user7->applications()
                        ->where('sop_id', $sopId6)
                        ->count();
        $sop7ev7 = $user7->applications()
                        ->where('sop_id', $sopId7)
                        ->count();

        $user8 = User::find($userId8);
        $sop1ev8 = $user8->applications()
                        ->where('sop_id', $sopId1)
                        ->count();
        $sop2ev8 = $user8->applications()
                        ->where('sop_id', $sopId2)
                        ->count();
        $sop3ev8 = $user8->applications()
                        ->where('sop_id', $sopId3)
                        ->count();
        $sop4ev8 = $user8->applications()
                        ->where('sop_id', $sopId4)
                        ->count();
        $sop5ev8 = $user8->applications()
                        ->where('sop_id', $sopId5)
                        ->count();
        $sop6ev8 = $user8->applications()
                        ->where('sop_id', $sopId6)
                        ->count();
        $sop7ev8 = $user8->applications()
                        ->where('sop_id', $sopId7)
                        ->count();

        $user9 = User::find($userId9);
        $sop1ev9 = $user9->applications()
                        ->where('sop_id', $sopId1)
                        ->count();
        $sop2ev9 = $user9->applications()
                        ->where('sop_id', $sopId2)
                        ->count();
        $sop3ev9 = $user9->applications()
                        ->where('sop_id', $sopId3)
                        ->count();
        $sop4ev9 = $user9->applications()
                        ->where('sop_id', $sopId4)
                        ->count();
        $sop5ev9 = $user9->applications()
                        ->where('sop_id', $sopId5)
                        ->count();
        $sop6ev9 = $user9->applications()
                        ->where('sop_id', $sopId6)
                        ->count();
        $sop7ev9 = $user9->applications()
                        ->where('sop_id', $sopId7)
                        ->count();

        $user10 = User::find($userId10);
        $sop1ev10 = $user10->applications()
                        ->where('sop_id', $sopId1)
                        ->count();
        $sop2ev10 = $user10->applications()
                        ->where('sop_id', $sopId2)
                        ->count();
        $sop3ev10 = $user10->applications()
                        ->where('sop_id', $sopId3)
                        ->count();
        $sop4ev10 = $user10->applications()
                        ->where('sop_id', $sopId4)
                        ->count();
        $sop5ev10 = $user10->applications()
                        ->where('sop_id', $sopId5)
                        ->count();
        $sop6ev10 = $user10->applications()
                        ->where('sop_id', $sopId6)
                        ->count();
        $sop7ev10 = $user10->applications()
                        ->where('sop_id', $sopId7)
                        ->count();

        $user11 = User::find($userId11);
        $sop1ev11 = $user11->applications()
                        ->where('sop_id', $sopId1)
                        ->count();
        $sop2ev11 = $user11->applications()
                        ->where('sop_id', $sopId2)
                        ->count();
        $sop3ev11 = $user11->applications()
                        ->where('sop_id', $sopId3)
                        ->count();
        $sop4ev11 = $user11->applications()
                        ->where('sop_id', $sopId4)
                        ->count();
        $sop5ev11 = $user11->applications()
                        ->where('sop_id', $sopId5)
                        ->count();
        $sop6ev11 = $user11->applications()
                        ->where('sop_id', $sopId6)
                        ->count();
        $sop7ev11 = $user11->applications()
                        ->where('sop_id', $sopId7)
                        ->count();

        $user12 = User::find($userId12);
        $sop1ev12 = $user12->applications()
                        ->where('sop_id', $sopId1)
                        ->count();
        $sop2ev12 = $user12->applications()
                        ->where('sop_id', $sopId2)
                        ->count();
        $sop3ev12 = $user12->applications()
                        ->where('sop_id', $sopId3)
                        ->count();
        $sop4ev12 = $user12->applications()
                        ->where('sop_id', $sopId4)
                        ->count();
        $sop5ev12 = $user12->applications()
                        ->where('sop_id', $sopId5)
                        ->count();
        $sop6ev12 = $user12->applications()
                        ->where('sop_id', $sopId6)
                        ->count();
        $sop7ev12 = $user12->applications()
                        ->where('sop_id', $sopId7)
                        ->count();

        $user13 = User::find($userId13);
        $sop1ev13 = $user13->applications()
                        ->where('sop_id', $sopId1)
                        ->count();
        $sop2ev13 = $user13->applications()
                        ->where('sop_id', $sopId2)
                        ->count();
        $sop3ev13 = $user13->applications()
                        ->where('sop_id', $sopId3)
                        ->count();
        $sop4ev13 = $user13->applications()
                        ->where('sop_id', $sopId4)
                        ->count();
        $sop5ev13 = $user13->applications()
                        ->where('sop_id', $sopId5)
                        ->count();
        $sop6ev13 = $user13->applications()
                        ->where('sop_id', $sopId6)
                        ->count();
        $sop7ev13 = $user13->applications()
                        ->where('sop_id', $sopId7)
                        ->count();

        $data = [
            'title' => 'Beranda',
            'menuDashboard' => 'active',
            'applicationKatim' => $applicationKatim,
            'sop' => $sop,
            'evaluator' => $evaluator,
            'sop1ev1' => $sop1ev1,
            'sop2ev1' => $sop2ev1,
            'sop3ev1' => $sop3ev1,
            'sop4ev1' => $sop4ev1,
            'sop5ev1' => $sop5ev1,
            'sop6ev1' => $sop6ev1,
            'sop7ev1' => $sop7ev1,
            'sop1ev2' => $sop1ev2,
            'sop2ev2' => $sop2ev2,
            'sop3ev2' => $sop3ev2,
            'sop4ev2' => $sop4ev2,
            'sop5ev2' => $sop5ev2,
            'sop6ev2' => $sop6ev2,
            'sop7ev2' => $sop7ev2,
            'sop1ev3' => $sop1ev3,
            'sop2ev3' => $sop2ev3,
            'sop3ev3' => $sop3ev3,
            'sop4ev3' => $sop4ev3,
            'sop5ev3' => $sop5ev3,
            'sop6ev3' => $sop6ev3,
            'sop7ev3' => $sop7ev3,
            'sop1ev4' => $sop1ev4,
            'sop2ev4' => $sop2ev4,
            'sop3ev4' => $sop3ev4,
            'sop4ev4' => $sop4ev4,
            'sop5ev4' => $sop5ev4,
            'sop6ev4' => $sop6ev4,
            'sop7ev4' => $sop7ev4,
            'sop1ev5' => $sop1ev5,
            'sop2ev5' => $sop2ev5,
            'sop3ev5' => $sop3ev5,
            'sop4ev5' => $sop4ev5,
            'sop5ev5' => $sop5ev5,
            'sop6ev5' => $sop6ev5,
            'sop7ev5' => $sop7ev5,
            'sop1ev6' => $sop1ev6,
            'sop2ev6' => $sop2ev6,
            'sop3ev6' => $sop3ev6,
            'sop4ev6' => $sop4ev6,
            'sop5ev6' => $sop5ev6,
            'sop6ev6' => $sop6ev6,
            'sop7ev6' => $sop7ev6,
            'sop1ev7' => $sop1ev7,
            'sop2ev7' => $sop2ev7,
            'sop3ev7' => $sop3ev7,
            'sop4ev7' => $sop4ev7,
            'sop5ev7' => $sop5ev7,
            'sop6ev7' => $sop6ev7,
            'sop7ev7' => $sop7ev7,
            'sop1ev8' => $sop1ev8,
            'sop2ev8' => $sop2ev8,
            'sop3ev8' => $sop3ev8,
            'sop4ev8' => $sop4ev8,
            'sop5ev8' => $sop5ev8,
            'sop6ev8' => $sop6ev8,
            'sop7ev8' => $sop7ev8,
            'sop1ev9' => $sop1ev9,
            'sop2ev9' => $sop2ev9,
            'sop3ev9' => $sop3ev9,
            'sop4ev9' => $sop4ev9,
            'sop5ev9' => $sop5ev9,
            'sop6ev9' => $sop6ev9,
            'sop7ev9' => $sop7ev9,
            'sop1ev10' => $sop1ev10,
            'sop2ev10' => $sop2ev10,
            'sop3ev10' => $sop3ev10,
            'sop4ev10' => $sop4ev10,
            'sop5ev10' => $sop5ev10,
            'sop6ev10' => $sop6ev10,
            'sop7ev10' => $sop7ev10,
            'sop1ev11' => $sop1ev11,
            'sop2ev11' => $sop2ev11,
            'sop3ev11' => $sop3ev11,
            'sop4ev11' => $sop4ev11,
            'sop5ev11' => $sop5ev11,
            'sop6ev11' => $sop6ev11,
            'sop7ev11' => $sop7ev11,
            'sop1ev12' => $sop1ev12,
            'sop2ev12' => $sop2ev12,
            'sop3ev12' => $sop3ev12,
            'sop4ev12' => $sop4ev12,
            'sop5ev12' => $sop5ev12,
            'sop6ev12' => $sop6ev12,
            'sop7ev12' => $sop7ev12,
            'sop1ev13' => $sop1ev13,
            'sop2ev13' => $sop2ev13,
            'sop3ev13' => $sop3ev13,
            'sop4ev13' => $sop4ev13,
            'sop5ev13' => $sop5ev13,
            'sop6ev13' => $sop6ev13,
            'sop7ev13' => $sop7ev13,
        ];
        
        return view('dashboard', $data);
    }
}
