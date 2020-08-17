<?php
namespace App\Repositories\Company;

use App\Repositories\Repository;

class CompanyImagesRepository extends Repository implements CompanyImagesRepositoryInterface
{
    public function getModel()
    {
        return \App\Model\CompanyImages::class;
    }

}
