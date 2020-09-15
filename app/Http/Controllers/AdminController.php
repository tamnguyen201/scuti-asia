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
        $data['candidates'] = \App\Model\UserJob::count();
        $data['candidate_evaluated'] = \App\Model\UserJob::where('status', '=', 0)
                                        ->where('result', '=', 0)
                                        ->count();
        $data['candidate_accept'] = \App\Model\UserJob::where('status', '=', 1)
                                        ->where('result', '=', 1)
                                        ->count();
        $data['candidate_failed'] = \App\Model\UserJob::where('status', '=', 1)
                                        ->where('result', '=', 0)
                                        ->count();

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

    
}
