<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CVController extends Controller
{
    protected $CVService;

    public function __construct()
    {
        $this->CVService = 1;
    }

    public function create()
    {
        $CVlimit = 0;

        if (auth()->user()->cv->count() <= $CVlimit) {
            return view('client.page.upload_cv');
        }

        return response()->json(['warning' => trans('custom.alert_messages.warning_limit_cv')]);
    }

    public function store(Request $request)
    {
        $this->CVService->store($request->all());

        return response()->json([
            'message'   => trans('custom.alert_messages.success'),
            'class_name'  => 'success'
        ]);

        return response()->json(['success' => trans('custom.alert_messages.success')]);
    }

    public function destroy($id)
    {
        $this->CVService->delete($id);

        return back()->with('success', trans('custom.alert_messages.success'));
    }
}
