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
        return \App\Model\User::class;
    }

    public function all()
    {
        return $this->model->whereIn('role_id', $this->EmployeeRole)->get();
    }
    
    public function paginate($perPage = 15, $columns = array('*'))
    {
        return $this->model->whereIn('role_id', $this->EmployeeRole)->paginate($perPage, $columns);
    }

}