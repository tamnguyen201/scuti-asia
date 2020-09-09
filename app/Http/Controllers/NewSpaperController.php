<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\NewSpaperRequest;
use App\Http\Requests\NewSpaperUpdateRequest;
use App\Repositories\Company\NewSpaperRepositoryInterface;

class NewSpaperController extends Controller
{
    protected $NewSpaperRepository;

    public function __construct(NewSpaperRepositoryInterface $NewSpaperRepository)
    {
        $this->NewSpaperRepository = $NewSpaperRepository;
    }

    public function index()
    {
        $NewSpaper = $this->NewSpaperRepository->paginate();

        return view("admin.NewSpaper.index", compact('NewSpaper'));
    }

    public function create()
    {
        return view("admin.NewSpaper.add");
    }

    public function store(NewSpaperRequest $request)
    {
        $this->NewSpaperRepository->create($request->all());

        return redirect()->route('new_spaper.index')->with('success', trans('custom.alert_messages.success'));
    }

    public function edit($id)
    {
        $NewSpaper = $this->NewSpaperRepository->show($id);

        return view("admin.NewSpaper.edit", compact('NewSpaper'));
    }

    public function update(NewSpaperUpdateRequest $request, $id)
    {
        $this->NewSpaperRepository->update($request->all(), $id);
        
        return rederect()->route("new_spaper.index")->with('success', trans('custom.alert_messages.success'));;
    }

    public function destroy($id)
    {
        $this->NewSpaperRepository->delete($id);

        return redirect()->route("new_spaper.index")->with('success', trans('custom.alert_messages.success'));
    }
}
