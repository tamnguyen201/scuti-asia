<?php

namespace App\Http\Controllers;

use App\Model\Locations;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\LocationRequest;
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
        
    }

    public function store(LocationRequest $request)
    {
        $results = $this->locationRepo->create([
            'name' => $request->name,
            'slug' => Str::slug($request->name)
        ]);
        return response()->json($results);
    }

   

}