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
    protected $locationRepository;

    public function __construct(LocationRepositoryInterface $locationRepository)
    {
        $this->locationRepository = $locationRepository;
    }

    public function index()
    {
        $locations = $this->locationRepository->paginate();
        return view("admin.location.index", compact('locations'));
    }

    public function edit($id)
    {
        $location = $this->locationRepository->show($id);
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
        $this->locationRepository->create($request->all());
        $locations = $this->locationRepository->paginate();
        $html = view('admin.location.list', compact('locations'))->render();
        return response()->json($html);
    }

    public function update(LocationUpdateRequest $request)
    {
        $this->locationRepository->update($request->all(), $request->id);
        $locations = $this->locationRepository->paginate();
        $html = view('admin.location.list', compact('locations'))->render();
        return response()->json($html);
    }

    public function destroy($id)
    {
        $this->locationRepository->delete($id);
        return redirect()->back()->with('success', config('common.alert_messages.success'));
    }
}
