<?php
namespace App\Repositories\Employee;

use App\Repositories\Repository;

class EmployeeRepository extends Repository implements EmployeeRepositoryInterface
{
    protected $EmployeeRole;

    public function __construct()
    {
        $this->EmployeeRole = [
            config('common.role.Administrator'),
            config('common.role.Interviewer'),
            config('common.role.BackOffice'),
        ];
        return parent::__construct();
    }

    public function getModel()
    {
        return \App\Model\Manager::class;
    }

    public function all()
    {
        return $this->model->with(['user','role'])->all();
    }
    
    public function paginate($perPage = 15, $columns = array('*'))
    {
        return $this->model->with(['user','role'])->paginate($perPage, $columns);
    }

    public function show($id)
    {
        return $this->model->with(['user', 'role'])->findOrFail($id);
    }

    public function FunctionName(Type $var = null)
    {
        # code...
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