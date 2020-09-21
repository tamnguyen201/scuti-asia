<?php
namespace App\Repositories\UserJob;

use App\Repositories\Repository;

class UserJobRepository extends Repository implements UserJobRepositoryInterface
{
    public function getModel()
    {
        return \App\Model\UserJob::class;
    }

    public function where($field, $opedaytor = '=' ,$condition)
    {
        return $this->model->where($field, $opedaytor ,$condition)->first();
    }
}
