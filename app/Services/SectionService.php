<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Repositories\Company\SectionRepositoryInterface;

class SectionService
{
    public function __construct(SectionRepositoryInterface $SectionRepository)
    {
        $this->SectionRepository = $SectionRepository;
    }

    public function paginate($perPage = 15, $columns = array('*'))
    {
        return $this->SectionRepository->paginate($perPage, $columns);
    }

    public function create($results)
    {
        $data = $results;

        if(array_key_exists("image", $results)) {
            $data['image'] = $this->SectionRepository->upload($results['image']);
        }

        $data['user_id'] = auth()->user()->id;

        return $this->SectionRepository->create($data);
    }

    public function show($id)
    {
        return $this->SectionRepository->show($id);
    }

    public function update($results, $id)
    {
        $data = $results;

        if(array_key_exists("image", $results)) {
            $data['image'] = $this->SectionRepository->upload($results['image']);
        }
        
        return $this->SectionRepository->update($data, $id);
    }

    public function delete($id)
    {
        return $this->SectionRepository->delete($id);
    }
}
