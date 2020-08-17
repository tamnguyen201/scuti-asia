<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Company\PartnerCompaniesRepositoryInterface;

class PartnerCompaniesController extends Controller
{
    protected $partnerCompaniesRepository;

    public function __construct(partnerCompaniesRepositoryInterface $partnerCompaniesRepository)
    {
        $this->partnerCompaniesRepository = $partnerCompaniesRepository;
    }

    public function index()
    {
        $partners = $this->partnerCompaniesRepository->paginate(10);

        return view("admin.partnerCompanies.index", compact('partners'));
    }

    public function create()
    {
        return view("admin.partnerCompanies.add");
    }

    public function store(partnersRequest $request)
    {
        $this->partnerCompaniesRepository->create($request->all());

        return view('admin.partnerCompanies.index')->with('success', trans('custom.alert_messages.success'));
    }

    public function edit($id)
    {
        $partner = $this->partnerCompaniesRepository->show($id);

        return view("admin.partnerCompanies.edit", compact('partner'));
    }

    public function update(PartnersUpdateRequest $request, $id)
    {
        $this->partnerCompaniesRepository->update($request->all(), $id);
        
        return rederect()->route("partnerCompanies.index")->with('success', trans('custom.alert_messages.success'));;
    }

    public function destroy($id)
    {
        $this->partnerCompaniesRepository->delete($id);

        return redirect()->route("partner_companies.index")->with('success', trans('custom.alert_messages.success'));
    }
}
