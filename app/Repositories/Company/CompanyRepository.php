<?php
namespace App\Repositories\Company;

use App\Repositories\Repository;

class CompanyRepository extends Repository implements CompanyRepositoryInterface
{
    public function getModel()
    {
        return \App\Model\Company::class;
    }

}
