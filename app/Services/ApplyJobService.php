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

        return $this->CVRepository->create($data);
    }

    public function userUpdate($results)
    {
        $user = $this->UserRepository->update($results);

        return $user;
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
