<?php

namespace App\Http\Controllers;

use App\Model\Locations;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\LocationRequest;
use App\Http\Requests\LocationUpdateRequest;
use App\Repositories\Locations\LocationRepositoryInterface;

class LocationController extends Controller
{
    protected $locationRepo;

    public function __construct(LocationRepositoryInterface $locationRepo)
    {
        $this->locationRepo = $locationRepo;
    }

    public function index()
    {
        $locations = $this->locationRepo->paginate(10);
        return view("admin.location.index", compact('locations'));
    }

    public function edit($id)
    {
        $location = $this->locationRepo->show($id);
        $html = view('admin.location.edit', compact('location'))->render();
        return response()->json($html);
    }

    public function create()
    {
        $html = view('admin.location.add')->render();
        return response()->json($html);
    }

    public function store(LocationRequest $request)
    {
        $this->locationRepo->create($request->all());
        $locations = $this->locationRepo->paginate(10);
        $html = view('admin.location.list', compact('locations'))->render();
        return response()->json($html);
    }

    public function update(LocationUpdateRequest $request)
    {
        $this->locationRepo->update($request->all(), $request->id);
        $locations = $this->locationRepo->paginate(10);
        $html = view('admin.location.list', compact('locations'))->render();
        return response()->json($html);
    }

    public function destroy($id)
    {
        $this->locationRepo->delete($id);
        return redirect()->back()->with('success', config('common.alert_messages.success'));
    }
}
