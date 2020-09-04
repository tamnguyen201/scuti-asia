<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CompanyImagesRequest;
use App\Http\Requests\CompanyImagesUpdateRequest;
use App\Repositories\Company\CompanyImagesRepositoryInterface;

class CompanyImagesController extends Controller
{
    protected $CompanyImagesRepository;

    public function __construct(CompanyImagesRepositoryInterface $CompanyImagesRepository)
    {
        $this->CompanyImagesRepository = $CompanyImagesRepository;
    }

    public function index()
    {
        $images = $this->CompanyImagesRepository->paginate();
        
        return view("admin.companyImages.index", compact('images'));
    }

    public function store(CompanyImagesRequest $request)
    {
        $this->CompanyImagesRepository->create($request->all());

        return redirect()->route('company_images.index')->with('success', trans('custom.alert_messages.success'));
    }

    public function edit($id)
    {
        $image = $this->CompanyImagesRepository->show($id);

        return view('admin.companyImages.edit', compact('image'));
    }

    public function update(CompanyImagesUpdateRequest $request, $id)
    {
        $this->CompanyImagesRepository->update($request->all(), $id);

        return redirect()->route('company_images.index')->with('success', trans('custom.alert_messages.success'));
    }

    public function destroy($id)
    {
        $this->CompanyImagesRepository->delete($id);

        return redirect()->route('company_images.index')->with('success', trans('custom.alert_messages.success'));
    }
}
