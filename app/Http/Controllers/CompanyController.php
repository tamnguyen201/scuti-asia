<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CompanyRequest;
use App\Http\Requests\CompanyUpdateRequest;
use App\Repositories\Company\CompanyRepositoryInterface;

class CompanyController extends Controller
{
    protected $companyRepository;

    public function __construct(CompanyRepositoryInterface $companyRepository) {
        $this->companyRepository = $companyRepository;
    }

    public function index()
    {
        $company = $this->companyRepository->first();

        return view('admin.company.index', compact('company'));
    }

    public function create()
    {
        if($this->companyRepository->count()) {
            return redirect()->route('companies.index')->with('warning', trans('custom.alert_messages.warning'));
        }

        return view('admin.company.add');
    }

    public function store(CompanyRequest $request)
    {
        $this->roleRepository->create($request->all());
        $roles = $this->roleRepository->paginate(10);
        $html = view('admin.role.list', compact('roles'))->render();
        return response()->json($html);
    }

    public function edit($id)
    {
        $company = $this->companyRepository->show($id);

        return view('admin.company.edit', compact('company'));
    }

    public function update(CompanyUpdateRequest $request, $id)
    {
        
        $this->companyRepository->update($request->all(), $id);

        return redirect()->view('admin.company.index')->with('success', config('common.success'));
    }

}
