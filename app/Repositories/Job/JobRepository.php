<?php
namespace App\Repositories\Job;

use App\Repositories\Repository;

class JobRepository extends Repository implements JobRepositoryInterface
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getModel()
    {
        return \App\Model\Job::class;
    }

    public function indexByJob($id)
    {
        return \App\Model\UserJob::with(['user'])->where('job_id', '=' , $id)->paginate(10);
    }
}
