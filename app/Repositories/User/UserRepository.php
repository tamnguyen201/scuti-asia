<?php
namespace App\Repositories\User;

use App\Repositories\Repository;

class UserRepository extends Repository implements UserRepositoryInterface
{
    public function getModel()
    {
        return \App\Model\User::class;
    }

    public function update($results, $id)
    {
        $data = $results;
        if(array_key_exists("avatar", $results)) {
            $data['avatar'] = $this->upload($results['avatar']);
        }

        return $this->show($id)->update($data);
    }
}
