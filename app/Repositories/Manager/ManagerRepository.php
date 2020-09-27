<?php
namespace App\Repositories\Manager;

use App\Repositories\Repository;
use App\Repositories\User\UserRepositoryInterface;

class ManagerRepository extends Repository implements ManagerRepositoryInterface
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

    public function update($result, $id)
    {
        $profileUpdate = [
            'name'=>$result['name'],
            'phone'=>$result['phone'],
            'address'=>$result['address']
        ];
        if (array_key_exists('avatar', $result)) {
            $result['avatar'] = $this->upload($result['avatar']);
            $profileUpdate['avatar'] = $result['avatar'];
        }
        return $this->show($id)->update($profileUpdate);
    }
}
