<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Repositories\Job\JobRepositoryInterface;
use App\Repositories\CV\CVRepositoryInterface;

class ApplyJobService
{
    public function __construct(
        JobRepositoryInterface $JobAppliedRepository,
        CVRepositoryInterface $CVRepository
    )
    {
        $this->JobAppliedRepository = $JobAppliedRepository;
        $this->CVRepository = $CVRepository;
    }

    public function create($results)
    {
        $data = $results;
        $this->userUpdate($data);

        if(array_key_exists("cv_url", $results)) {
            $data['cv_id'] = $this->createCV($results)->id;
        }

        $data['user_id'] = auth()->user()->id;

        return $this->JobAppliedRepository->create($data);
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
