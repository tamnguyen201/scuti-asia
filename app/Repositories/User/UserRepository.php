<?php
namespace App\Repositories\User;

use App\Repositories\Repository;

class UserRepository extends Repository implements UserRepositoryInterface
{
    protected $UserRole;

    public function __construct()
    {
        $this->UserRole = [
            config('common.role.User')
        ];
        return parent::__construct();
    }

    public function getModel()
    {
        return \App\Model\User::class;
    }

    public function all()
    {
        return $this->model->where('role_id', $this->UserRole)->get();
    }
    
    public function paginate($perPage = 15, $columns = array('*'))
    {
        return $this->model->where('role_id', $this->UserRole)->paginate($perPage, $columns);
    }

}