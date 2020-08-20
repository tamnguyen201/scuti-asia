<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CompanyRequest;
use App\Http\Requests\CompanyUpdateRequest;
use App\Services\CompanyService;

class CompanyController extends Controller
{
    protected $CompanyService;

    public function __construct(CompanyService $CompanyService) {
        $this->CompanyService = $CompanyService;
    }

    public function index()
    {
        $company = $this->CompanyService->index();

        return view('admin.company.index', compact('company'));
    }

    public function create()
    {
        if($this->CompanyService->count()) {
            return redirect()->route('companies.index')->with('warning', trans('custom.alert_messages.warning'));
        }

        return view('admin.company.add');
    }

    public function store(CompanyRequest $request)
    {
        $this->CompanyService->create($request->all());

        return redirect()->route('companies.index')->with('success', trans('custom.alert_messages.success'));
    }

    public function edit($id)
    {
        $company = $this->CompanyService->show($id);

        return view('admin.company.edit', compact('company'));
    }

    public function update(CompanyUpdateRequest $request, $id)
    {
        $this->CompanyService->update($request->all(), $id);

        return redirect()->route('companies.index')->with('success', trans('custom.alert_messages.success'));
    }

}
