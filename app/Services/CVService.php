<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Repositories\CV\CVRepository;

class CVService
{
    public function __construct(CVRepository $CVRepository)
    {
        $this->CVRepository = $CVRepository;
    }

    public function create($results)
    {
        $data = $results;

        if(array_key_exists("cv_url", $results)) {
            $data['cv_url'] = $this->CVRepository->upload($results['cv_url']);
        }

        $data['user_id'] = auth()->user()->id;

        return $this->CVRepository->create($data);
    }

    public function show($id)
    {
        return $this->CVRepository->show($id);
    }

    public function update($results, $id)
    {
        $data = $results;

        if(array_key_exists("cv_url", $results)) {
            $data['cv_url'] = $this->CVRepository->upload($results['cv_url']);
        }
        
        return $this->CVRepository->update($data, $id);
    }

    public function delete($id)
    {
        return $this->CVRepository->delete($id);
    }
}
