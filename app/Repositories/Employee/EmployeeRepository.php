<?php
namespace App\Repositories\Employee;

use App\Repositories\Repository;
use Symfony\Component\HttpFoundation\Request;
use Illuminate\Support\Facades\DB;
use App\Repositories\User\UserRepositoryInterface;

class EmployeeRepository extends Repository implements EmployeeRepositoryInterface
{
    protected $userRepository;

    public function __construct(userRepositoryInterface $userRepository) {
        $this->userRepository = $userRepository;
        parent::__construct();
    }

    public function getModel()
    {
        return \App\Model\Manager::class;
    }
    
    public function paginate($perPage = 15, $columns = array('*'))
    {
        return $this->model->with(['user','role'])->paginate($perPage, $columns);
    }

    public function show($id)
    {
        return $this->model->with(['user', 'role'])->findOrFail($id);
    }

    public function store($data)
    {
        DB::beginTransaction();
        try {
            $data['password'] = \Str::random(8);
            $member = $this->userRepository->create($data);
            $manager = ['user_id' => $member->id, 'role_id' => $data['role_id']];
            $this->create($manager);
            
            DB::commit();
            $this->sendMail($data['email'], $data['password']);

        } catch (Exception $e) {
            DB::rollBack();
            
            throw new Exception($e->getMessage());
        }
    }

    public function sendMail($user, $password)
    {
        $details = [
            'title' => 'Mail from Scuti-asia.com',
            'body' => 'Bạn vừa được tạo tài khoản thành viên quản trị website!',
            'user_name' => $user,
            'password' => $password,
        ];
    
        \Mail::to($user)->send(new \App\Mail\AdminAccountMail($details));
    }

}
