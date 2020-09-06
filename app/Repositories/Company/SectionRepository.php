<?php
namespace App\Repositories\Company;

use App\Repositories\Repository;

class SectionRepository extends Repository implements SectionRepositoryInterface
{
    public function getModel()
    {
        return \App\Model\Section::class;
    }
}
