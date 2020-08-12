<?php

namespace App\Http\Controllers;

use App\Model\Locations;
use Illuminate\Http\Request;


class LocationController extends Controller
{
    private $locations;

    public function __construct(Locations $location)
    {
        $this->locations = $locations;
    }

    public function index()
    {
        
    }

    public function edit($id)
    {
        
    }

    public function store(LocationRequest $request)
    {
        
    }

    public function update(LocationUpdateRequest $request)
    {
        
    }

    public function destroy($id)
    {
       
    }

}
