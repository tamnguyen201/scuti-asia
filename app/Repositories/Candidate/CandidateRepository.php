<?php
namespace App\Repositories\Candidate;

use App\Repositories\Repository;

class CandidateRepository extends Repository implements CandidateRepositoryInterface
{
    public function getModel()
    {
        return \App\Model\User::class;
    }

    public function paginate($perPage = 15, $columns = array('*'))
    {
        return $this->model->paginate($perPage, $columns);
    }

    public function show($id)
    {
        return $this->model->with(['cv'])->findOrFail($id);
    }
}
