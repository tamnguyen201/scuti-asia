<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use Alert;
use App\Repositories\User\UserRepositoryInterface;

class UserController extends Controller
{
    protected $userRepo;

    public function __construct(UserRepositoryInterface $userRepo)
    {
        $this->userRepo = $userRepo;
    }
    
    public function index()
    {
        $users = $this->userRepo->paginate(10);
        return view('admin.user.index', compact('users'));

    }

    public function show($id)
    {
        $user = $this->userRepo->show($id);
        return response()->json($user);
    }

}
