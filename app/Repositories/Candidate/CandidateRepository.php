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
        return $this->model->with(['userjob','job'])->paginate($perPage, $columns);
    }
    
    public function show($id)
    {
        return $this->model->with('cv')->findOrFail($id);
    }

    public function where($field, $opedaytor = '=' ,$condition)
    {
        return $this->model->where($field, $opedaytor ,$condition)->first();
    }

    public function index()
    {
        return \App\Model\UserJob::with(['user'])->paginate(10);
    }

    public function evaluating()
    {
        return \DB::table('user_job')
                    ->where('status', '=', 0)
                    ->paginate(10);
    }

    public function finish()
    {
        return \DB::table('user_job')
                ->where('status', '=', 1)
                ->paginate(10);
    }

    public function failed()
    {
        return \DB::table('user_job')
                    ->where('status', '=', 1)
                    ->where('result', '=', 0)
                    ->paginate(10);
    }
}
