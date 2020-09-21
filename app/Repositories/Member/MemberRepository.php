<?php
namespace App\Repositories\Member;

use App\Repositories\Repository;

class MemberRepository extends Repository implements MemberRepositoryInterface
{
    public function getModel()
    {
        return \App\Model\MainMember::class;
    }

    public function create($results)
    {
        $data = $results;
        if(array_key_exists("avatar", $results)) {
            $data['avatar'] = $this->upload($results['avatar']);
        }
        
        return $this->model->create($data);
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
