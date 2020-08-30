<?php

namespace App\Http\Controllers;

use App\Http\Requests\CVRequest;
use App\Http\Requests\CVUpdateRequest;
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
        $CVlimit = 3;

        if (auth()->user()->cv->count() < $CVlimit) {
            return view('client.page.upload_cv');
        }

        return response()->json(['warning' => trans('custom.alert_messages.warning_limit_cv')]);
    }

    public function store(CVRequest $request)
    {
        $this->CVService->create($request->all());
        $html = view('client.page.list_cv')->render();
        
        return response()->json($html);
    }

    public function edit($id)
    {
        $cv = $this->CVService->show($id);

        return view('client.page.edit_cv', compact('cv'));
    }

    public function update(CVUpdateRequest $request, $id)
    {
        $this->CVService->update($request->all(), $id);
        $html = view('client.page.list_cv')->render();
        
        return response()->json($html);
    }

    public function destroy($id)
    {
        $this->CVService->delete($id);

        return back()->with('success', trans('custom.alert_messages.success'));
    }
}
