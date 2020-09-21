<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Alert;
use App\Http\Requests\UserUpdateRequest;
use App\Repositories\User\UserRepositoryInterface;

class UserController extends Controller
{
    protected $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }
    
    public function index()
    {
        $users = $this->userRepository->paginate();
        return view('admin.user.index', compact('users'));
    }

    public function show($id)
    {
        $user = $this->userRepository->show($id);
        $html = view('admin.user.view', compact('user'))->render();
        return response()->json($html);
    }

    public function update(UserUpdateRequest $request)
    {
        $this->userRepository->update($request->all(), auth()->user()->id);

        return response()->json(['status' => 'success', 'message' => trans('custom.alert_messages.success')]);
    }
}
