<?php
namespace App\Repositories\Category;

use App\Repositories\Repository;

class CategoryRepository extends Repository implements CategoryRepositoryInterface
{
    public function getModel()
    {
        return \App\Model\Category::class;
    }
}
