<?php
namespace App\Repositories\CV;

use App\Repositories\Repository;

class CVRepository extends Repository implements CVRepositoryInterface
{
    public function getModel()
    {
        return \App\Model\CV::class;
    }
}