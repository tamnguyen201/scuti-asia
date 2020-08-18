<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Manager;
use Illuminate\Support\Str;
use App\Http\Requests\ManagerRequest;
use App\Repositories\Manager\ManagerRepositoryInterface;

class ProfileController extends Controller
{
    protected $managerRepository;

    public function __construct(ManagerRepositoryInterface $managerRepository)
    {
        $this->managerRepository = $managerRepository;
    }
    
    public function showInformation()
    {
        $data = $this->managerRepository->all()->where('user_id', auth()->id());
        return view('admin.user.profile', compact('data'));
    }

    public function editInformation($id)
    {
        $user_name = $this->managerRepository->show(1)->user->name;
        $user_id = $this->managerRepository->show(1)->user->id;
        $informations = $this->managerRepository->show($id);
        return view('admin.user.edit', compact('informations', 'user_name', 'user_id'));
    }

    public function updateInformation(ManagerRequest $request, $id)
    {
        $this->managerRepository->update($request->all(), $id);
        return redirect()->route('admin.information');
    }
}
