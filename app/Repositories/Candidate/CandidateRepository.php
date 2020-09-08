<?php
namespace App\Repositories\Candidate;

use App\Repositories\Repository;

class CandidateRepository extends Repository implements CandidateRepositoryInterface
{
    public function getModel()
    {
        return \App\Model\User::class;
    }

    public function paginate($perPage = 10, $columns = array('*'))
    {
        return $this->model->with(['userjob','job'])->latest()->paginate($perPage, $columns);
    }
    
    public function show($id)
    {
        return $this->model->with('cv')->findOrFail($id);
    }

    public function checkCVstatus($data)
    {
        return $this->model->with(['cv'])->findOrFail($id);
    }

    public function where($field, $opedaytor = '=' ,$condition)
    {
        return $this->model->where($field, $opedaytor ,$condition)->first();
    }
}
