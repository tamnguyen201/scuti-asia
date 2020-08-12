<?php
namespace App\Repositories\Locations;

use App\Repositories\Repository;

class LocationRepository extends Repository implements LocationRepositoryInterface
{
    public function getModel()
    {
        return \App\Model\Locations::class;
    }


}