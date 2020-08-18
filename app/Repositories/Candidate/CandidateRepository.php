<?php
namespace App\Repositories\Candidate;

use App\Repositories\Repository;

class CandidateRepository extends Repository implements CandidateRepositoryInterface
{
    public function getModel()
    {
        return \App\Model\Candidate::class;
    }

    public function paginate($perPage = 15, $columns = array('*'))
    {
        return $this->model->with(['user','category'])->paginate($perPage, $columns);
    }

    public function show($id)
    {
        return $this->model->with(['user','cv'])->findOrFail($id);
    }
}
