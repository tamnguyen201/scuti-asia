<?php
namespace App\Repositories\Candidate;

use App\Repositories\Repository;

class CandidateRepository extends Repository implements CandidateRepositoryInterface
{
    public function getModel()
    {
        return \App\Model\User::class;
<<<<<<< HEAD
    }

    public function paginate($perPage = 15, $columns = array('*'))
    {
        return $this->model->with(['userjob','job'])->latest()->paginate($perPage, $columns);
=======
>>>>>>> 17201af5c97dc98f4909885c00099f4e0afdca24
    }

    public function show($id)
    {
<<<<<<< HEAD
        return $this->model->with(['cv'])->findOrFail($id);
=======
        return $this->model->with('cv')->findOrFail($id);
>>>>>>> 17201af5c97dc98f4909885c00099f4e0afdca24
    }
}
