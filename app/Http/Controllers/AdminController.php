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
        $data['users'] = \App\Model\User::all();
        $data['candidate_evaluated'] = \DB::table('user_job')
                                        ->where('status', '=', 0)
                                        ->where('result', '=', 0)
                                        ->count();
        $data['candidate_accept'] = \DB::table('user_job')
                                        ->where('status', '=', 1)
                                        ->where('result', '=', 1)
                                        ->count();
        $data['candidate_failed'] = \DB::table('user_job')
                                        ->where('status', '=', 1)
                                        ->where('result', '=', 0)
                                        ->count();

        for ($i=5; $i >= 0; $i--) { 
            $arrMonth[] = \Carbon\Carbon::now()->subMonths($i)->format('F');
        }

        $data['listMonth'] = $arrMonth;

        foreach($arrMonth as $month){
            $data['candidateByMonth'][] = \DB::table('users')
                                            ->whereMonth('created_at', '=', \Carbon\Carbon::parse($month)->month)
                                            ->get()
                                            ->count();
        }
        

        return view('admin.pages.dashboard', compact('data'));
    }

    
}
