<?php
namespace App\Repositories\Candidate;

use App\Repositories\Repository;

class CandidateRepository extends Repository implements CandidateRepositoryInterface
{
    public function getModel()
    {
        return \App\Model\User::class;
    }

    public function show($id)
    {
        return $this->model->with('cv')->findOrFail($id);
    }

    public function checkCVstatus($data)
    {
        $user_cvs = $data->cv;
        if ($user_cvs !=null) {
            return true;
        }
        return false;
    }

}
