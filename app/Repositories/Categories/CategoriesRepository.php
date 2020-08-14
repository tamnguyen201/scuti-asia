<?php
namespace App\Repositories\Categories;

use App\Repositories\Repository;

class CategoriesRepository extends Repository implements CategoriesRepositoryInterface
{
    public function getModel()
    {
        return \App\Model\Categories::class;
    }


}