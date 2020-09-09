<?php
namespace App\Repositories\Company;

use App\Repositories\Repository;

class ContactRepository extends Repository implements ContactRepositoryInterface
{
    public function getModel()
    {
        return \App\Model\Contact::class;
    }

    public function paginate($perPage = 10, $columns = array('*'))
    {
        return $this->model->latest()->paginate($perPage, $columns);
    }
}
