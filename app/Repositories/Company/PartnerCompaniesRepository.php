<?php
namespace App\Repositories\Company;

use App\Repositories\Repository;

class PartnerCompaniesRepository extends Repository implements PartnerCompaniesRepositoryInterface
{
    public function getModel()
    {
        return \App\Model\PartnerCompanies::class;
    }

}
