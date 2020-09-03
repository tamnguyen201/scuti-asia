<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Repositories\Job\JobRepositoryInterface;
use App\Repositories\User\UserRepositoryInterface;
use App\Repositories\CV\CVRepositoryInterface;

class ApplyJobService
{
    public function __construct(
        JobRepositoryInterface $JobRepository,
        UserRepositoryInterface $UserRepository,
        CVRepositoryInterface $CVRepository
    )
    {
        $this->JobRepository = $JobRepository;
        $this->UserRepository = $UserRepository;
        $this->CVRepository = $CVRepository;
    }

    public function create($results)
    {
        $data = $results;
        $data['user_id'] = auth()->user()->id;
        
        if(array_key_exists("cv_url", $data)) {
            $data['cv_id'] = $this->createCV($data)->id;
        }

        return \App\Model\UserJob::create($data);
    }

    public function createCV($results)
    {
        $data = $results;

        if(array_key_exists("cv_url", $results)) {
            $data['cv_url'] = $this->CVRepository->upload($results['cv_url']);
        }

        $cv = $this->CVRepository->create($data);

        return $cv;
    }
}
