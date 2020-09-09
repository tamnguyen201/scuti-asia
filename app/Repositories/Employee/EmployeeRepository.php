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
            $member = $this->userRepository->create($data);
            $manager = ['user_id' => $member->id];
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
            'title' => trans('custom.email_template.create_admin_account.title'),
            'body' => trans('custom.email_template.create_admin_account.body'),
            'username' => $user,
            'password' => $password,
        ];
    
        \Mail::to($user)->send(new \App\Mail\AdminAccountMail($details));
    }

}
