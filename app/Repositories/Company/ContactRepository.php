<?php
namespace App\Repositories\Company;

use App\Repositories\Repository;

class ContactRepository extends Repository implements ContactRepositoryInterface
{
    public function getModel()
    {
        return \App\Model\Contact::class;
    }
}
