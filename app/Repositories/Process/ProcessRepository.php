<?php
namespace App\Repositories\Process;

use App\Repositories\Repository;

class ProcessRepository extends Repository implements ProcessRepositoryInterface
{
    public function getModel()
    {
        return \App\Model\Process::class;
    }

    public function updateOrCreate($data)
    {
        return $this->model->updateOrCreate($data);
    }
}
