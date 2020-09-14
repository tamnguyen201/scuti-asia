<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\BenefitRequest;
use App\Http\Requests\BenefitUpdateRequest;
use App\Repositories\Company\BenefitRepositoryInterface;

class BenefitController extends Controller
{
    protected $BenefitRepository;

    public function __construct(BenefitRepositoryInterface $BenefitRepository)
    {
        $this->BenefitRepository = $BenefitRepository;
    }

    public function index()
    {
        $Benefit = $this->BenefitRepository->paginate();

        return view("admin.benefit.index", compact('Benefit'));
    }

    public function create()
    {
        return view("admin.benefit.add");
    }

    public function store(BenefitRequest $request)
    {
        $this->BenefitRepository->create($request->all());

        return redirect()->route('new_spaper.index')->with('success', trans('custom.alert_messages.success'));
    }

    public function edit($id)
    {
        $Benefit = $this->BenefitRepository->show($id);

        return view("admin.benefit.edit", compact('Benefit'));
    }

    public function update(BenefitUpdateRequest $request, $id)
    {
        $this->BenefitRepository->update($request->all(), $id);
        
        return rederect()->route("new_spaper.index")->with('success', trans('custom.alert_messages.success'));;
    }

    public function destroy($id)
    {
        $this->BenefitRepository->delete($id);

        return redirect()->route("new_spaper.index")->with('success', trans('custom.alert_messages.success'));
    }
}
