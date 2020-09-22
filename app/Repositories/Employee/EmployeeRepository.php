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
        return \App\Model\Admin::class;
    }
    
    public function paginate($perPage = 15, $columns = array('*'))
    {
        return $this->model->paginate($perPage, $columns);
    }

    public function show($id)
    {
        return $this->model->findOrFail($id);
    }

    public function store($data)
    {
        DB::beginTransaction();
        try {
            $data['password'] = \Str::random(8);
            (isset($data['status'])) ? $data['status'] = 1 : null;
            $admin = $this->create($data);
            
            DB::commit();
            $this->sendMail($admin, $data['password']);

        } catch (Exception $e) {
            DB::rollBack();
            
            throw new Exception($e->getMessage());
        }
    }

    public function sendMail($admin, $password)
    {
        $details = [
            'title' => trans('custom.email_template.create_admin_account.title'),
            'body' => trans('custom.email_template.create_admin_account.body'),
            'name' => $admin->name,
            'username' => $admin->email,
            'password' => $password,
        ];
    
        \Mail::to($admin->email)->send(new \App\Mail\AdminAccountMail($details));
    }

    public function update($data, $id)
    {
        (isset($data['status'])) ? $data['status'] = 1 : null;
        
        return $this->show($id)->update($data);
    }

}
