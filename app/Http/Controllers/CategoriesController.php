<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CategoriesRequest;
use App\Http\Requests\CategoriesUpdateRequest;
use App\Repositories\Categories\CategoriesRepositoryInterface;

class CategoriesController extends Controller
{
    protected $categoriesRepository;

    public function __construct(CategoriesRepositorysitoryInterface $categoriesRepository)
    {
        $this->categoriesRepository = $categoriesRepository;
    }

    public function index()
    {
        $categories = $this->categoriesRepository->paginate(10);
        return view("admin.categories.index", compact('categories'));
    }

    public function create()
    {
        $html = view('admin.categories.add')->render();
        return response()->json($html);
    }

    public function edit($id)
    {
        $categories = $this->categoriesRepository->show($id);
        $html = view('admin.categories.edit', compact('categories'))->render();
        return response()->json($html);
    }

    public function store(CategoriesRequest $request)
    {
        $this->categoriesRepository->create($request->all());
        $categories = $this->categoriesRepository->paginate(10);
        $html = view('admin.categories.list', compact('categories'))->render();
        return response()->json($html);
    }

    public function update(CategoriesUpdateRequest $request)
    {
        $this->categoriesRepository->update($request->all(), $request->id);
        $categoriess = $this->categoriesRepository->paginate(10);
        $html = view('admin.categories.list', compact('categoriess'))->render();
        return response()->json($html);
    }

    public function destroy($id)
    {
        $this->categoriesRepository->delete($id);
        return redirect()->back()->with('success', config('common.alert_messages.success'));
    }
}
