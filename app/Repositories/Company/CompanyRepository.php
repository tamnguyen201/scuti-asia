<?php
namespace App\Repositories\Company;

use App\Repositories\Repository;

class CompanyRepository extends Repository implements CompanyRepositoryInterface
{
    public function getModel()
    {
        return \App\Model\Company::class;
    }

    public function count()
    {
        return $this->model->count();
    }

    public function first()
    {
        return $this->model->first();
    }

}
