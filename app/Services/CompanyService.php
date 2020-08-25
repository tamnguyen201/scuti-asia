<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Repositories\Company\CompanyRepository;

class CompanyService
{
    public function __construct(CompanyRepository $CompanyRepository)
    {
        $this->CompanyRepository = $CompanyRepository;
    }

    public function index()
    {
        $Company = $this->CompanyRepository->first();

        return $Company;
    }

    public function count()
    {
        $Company = $this->CompanyRepository->count();

        return $Company;
    }

    public function create($results)
    {
        $data = $results;

        if(array_key_exists("logo", $results)) {
            $data['logo'] = $this->CompanyRepository->upload($results['logo']);
        }

        $Company = $this->CompanyRepository->create($data);

        return $Company;
    }

    public function show($id)
    {
        $Company = $this->CompanyRepository->show($id);

        return $Company;
    }

    public function update($results, $id)
    {
        $data = $results;

        if(array_key_exists("logo", $results)) {
            $data['logo'] = $this->CompanyRepository->upload($results['logo']);
        }
        
        return $this->CompanyRepository->update($data, $id);
    }
}
