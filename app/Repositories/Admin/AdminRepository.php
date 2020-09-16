<?php
namespace App\Repositories\Admin;

use App\Repositories\Repository;

class AdminRepository extends Repository implements AdminRepositoryInterface
{
    public function getModel()
    {
        return \App\Model\Admin::class;
    }

}
