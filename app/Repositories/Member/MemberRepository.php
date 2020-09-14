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
        if(array_key_exists("image", $results)) {
            $data['image'] = $this->upload($results['image']);
        }
        
        return $this->model->create($data);
    }

    public function update($results, $id)
    {
        $data = $results;
        if(array_key_exists("image", $results)) {
            $data['image'] = $this->upload($results['image']);
        }
        
        return $this->show($id)->update($data);
    }
}
