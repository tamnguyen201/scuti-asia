<?php
namespace App\Repositories\Client;

use App\Repositories\Repository;

class SectionRepository extends Repository implements SectionRepositoryInterface
{
    public function getModel()
    {
        return \App\Model\Section::class;
    }

    public function where($field, $opedaytor = '=' ,$condition)
    {
        return $this->model->where($field, $opedaytor ,$condition)->first();
    }

}
