<?php
namespace App\Repositories\Category;

use App\Repositories\Repository;

class CategoryRepository extends Repository implements CategoryRepositoryInterface
{
    public function getModel()
    {
        return \App\Model\Category::class;
    }

    public function where($field, $opedaytor = '=' ,$condition)
    {
        return $this->model->where($field, $opedaytor ,$condition)->get();
    }
}
