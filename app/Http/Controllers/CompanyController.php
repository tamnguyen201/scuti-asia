<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CompanyRequest;
use App\Repositories\Company\CompanyRepositoryInterface;

class CompanyController extends Controller
{
    protected $companyRepository;

    public function __construct(CompanyRepositoryInterface $companyRepository) {
        $this->companyRepository = $companyRepository;
    }

    public function index()
    {
        $company = $this->companyRepository->all();

        return view('admin.company.index', compact('company'));
    }

    public function edit($id)
    {
        $company = $this->companyRepository->show($id);

        return view('admin.company.edit', compact('company'));
    }

    public function update(CompanyRequest $request, $id)
    {
        $this->companyRepository->update($request->all(), $id);

        return redirect()->view('admin.company.index')->with('success', config('common.success'));
    }

}
