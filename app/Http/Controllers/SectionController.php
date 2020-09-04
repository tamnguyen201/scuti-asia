<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Http\Requests\SectionRequest;
// use App\Http\Requests\SectionUpdateRequest;
use App\Services\SectionService;

class SectionController extends Controller
{
    protected $SectionService;

    public function __construct(SectionService $SectionService) {
        $this->SectionService = $SectionService;
    }

    public function index()
    {
        $sections = $this->SectionService->paginate();

        return view('admin.section.index', compact('sections'));
    }

    public function create()
    {
        return view('admin.section.add');
    }

    public function store(Request $request)
    {
        $this->SectionService->create($request->all());

        return redirect()->route('sections.index')->with('success', trans('custom.alert_messages.success'));
    }

    public function edit($id)
    {
        $section = $this->SectionService->show($id);

        return view('admin.section.edit', compact('section'));
    }

    public function update(Request $request, $id)
    {
        $this->SectionService->update($request->all(), $id);

        return redirect()->route('sections.index')->with('success', trans('custom.alert_messages.success'));
    }

    public function destroy($id)
    {
        $this->SectionService->delete($id);

        return redirect()->route('sections.index')->with('success', trans('custom.alert_messages.success'));
    }

}
