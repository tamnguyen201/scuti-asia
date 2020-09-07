<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
        $data['candidate_finish'] = \DB::table('user_job')->count();
        $data['candidate_failed'] = \DB::table('user_job')->count();
        $data['new_candidate'] = \DB::table('users')
                                    ->whereMonth('created_at', '=', \Carbon\Carbon::now()->month)
                                    ->get()
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
