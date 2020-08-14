<?php

namespace App\Http\Controllers;

use App\Model\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use App\Http\Requests\CategoryUpdateRequest;
use App\Repositories\Category\CategoryRepositoryInterface;

class CategoryController extends Controller
{
    protected $categoryRepository;

    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function index()
    {
        $categories = $this->categoryRepository->paginate(10);
        return view("admin.category.index", compact('categories'));
    }

    public function create()
    {
        $html = view('admin.category.add')->render();
        return response()->json($html);
    }

    public function store(CategoryRequest $request)
    {
        $this->categoryRepository->create([
            'category_name' => $request->name,
            'status'=> 0,
            'slug' => Str::slug($request->name),
            'user_id'=> auth()->id()
        ]);
        $categories = $this->categoryRepository->paginate(10);
        $html = view('admin.category.list', compact('categories'))->render();
        return response()->json($html);
    }

    public function changeStatus(Request $request)
    {
        $category = $this->categoryRepository->show($request->category_id);
        $category->status = $request->status;
        $category->save();
        return response()->json(['success' => config('common.alert_messages.success')]);
    }
}
