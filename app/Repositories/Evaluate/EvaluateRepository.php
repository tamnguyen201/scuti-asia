<?php
namespace App\Repositories\Evaluate;

use App\Repositories\Repository;

class EvaluateRepository extends Repository implements EvaluateRepositoryInterface
{
    public function getModel()
    {
        return \App\Model\Evaluate::class;
    }

}
