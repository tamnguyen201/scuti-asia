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
        $range = \Carbon\Carbon::now()->subMonth(6);
        $data['candidateMonth'] = \DB::table('users')
                        ->select(\DB::raw('Month(created_at) as getMonth'), \DB::raw('COUNT(*) as value'))
                        ->where('created_at', '>=', $range)
                        ->groupBy('getMonth')
                        ->orderBy('getMonth', 'ASC')
                        ->get()
                        ->toJSON();
        $arrMonth = [];
        $month = date('m');
        $day = date('d');
        $year = date('Y');
        for ($i=1; $i <= 12; $i++) { 
            $time = mktime(12,0,0, $i, $day, $year);
            if(date('m', $time) >= $month - 6 && date('m', $time) < $month){
                $arrMonth[] = date('M', $time);
            }
        }
        // dd($arrMonth);
        $data['listMonth'] = json_encode($arrMonth);
        $data = 1;

        return view('admin.pages.dashboard', compact('data'));
    }

    
}
