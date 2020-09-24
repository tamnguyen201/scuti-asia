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

    public function where($field, $opedaytor = '=' ,$condition)
    {
        return $this->model->where($field, $opedaytor ,$condition)->get();
    }

    public function related($category_id, $id)
    {
        return $this->model->where('category_id', $category_id)->where('id', '<>', $id)->get()->take(5);
    }
}
