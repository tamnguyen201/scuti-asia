<?php

namespace App\Http\Controllers;

use App\Model\User;
use Illuminate\Http\Request;
use App\Http\Requests\AdminRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $toDay = \Carbon\Carbon::now('Asia/Ho_Chi_Minh');
        $tomorrow = \Carbon\Carbon::tomorrow('Asia/Ho_Chi_Minh');
        $nextDay = \Carbon\Carbon::now('Asia/Ho_Chi_Minh')->addDays(2);

        $data['events']['Today'] = \App\Model\Event::whereDate('start', '=', $toDay)
                                                ->whereTime('start', '>=', $toDay->format('H:i:s'))
                                                ->get();
        $data['events']['Tomorrow'] = \App\Model\Event::whereDate('start', '=', $tomorrow)
                            ->get();
        $data['events']['NextDay'] = \App\Model\Event::whereDate('start', '=', $nextDay)
                            ->get();
                            

        $data['candidate_new'] = \App\Model\UserJob::where('status', 0)
                                        ->withCount('process')
                                        ->get()
                                        ->where('process_count', 0)
                                        ->count();
        $data['candidate_evaluated'] = \App\Model\UserJob::where('status', '=', 0)
                                        ->where('result', '=', 0)
                                        ->withCount('process')
                                        ->get()
                                        ->where('process_count', '>', 0)
                                        ->count();
        $data['candidate_accept'] = \App\Model\UserJob::where('status', '=', 1)
                                        ->where('result', '=', 1)
                                        ->count();
        $data['candidate_failed'] = \App\Model\UserJob::where('status', '=', 1)
                                        ->where('result', '=', 0)
                                        ->count();
        $data['jobs'] = \App\Model\Job::where('status', '=', 1)->paginate(10);

        for ($i=5; $i >= 0; $i--) { 
            $arrMonth[] = \Carbon\Carbon::now()->subMonths($i)->format('F');
        }

        $data['listMonth'] = $arrMonth;

        foreach($arrMonth as $month){
            $data['userByMonth'][] = \App\Model\User::whereMonth('created_at', '=', \Carbon\Carbon::parse($month)->month)
                                            ->get()
                                            ->count();
        }

        foreach($arrMonth as $month){
            $data['candidateByMonth'][] = \App\Model\UserJob::whereMonth('created_at', '=', \Carbon\Carbon::parse($month)->month)
                                            ->get()
                                            ->count();
        }
        

        return view('admin.pages.dashboard', compact('data'));
    }

    public function search(Request $request)
    {
        $jobs = \App\Model\Job::where('name', 'like', '%'.$request->keyword.'%')
                                    ->where('status', '=', 1)
                                    ->paginate(10);
        $html = view('admin.pages.searchDashboard', compact('jobs'))->render();

        return response()->json($html);
    }

    
}
