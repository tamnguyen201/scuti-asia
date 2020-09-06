<?php
namespace App\Repositories\User;

use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use App\Repositories\Repository;
use Illuminate\Support\Facades\DB;

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
