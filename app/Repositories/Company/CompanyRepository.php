<?php
namespace App\Repositories\Company;

use App\Repositories\Repository;

class CompanyRepository extends Repository implements CompanyRepositoryInterface
{
    public function getModel()
    {
        return \App\Model\Company::class;
    }

    public function count()
    {
        if($this->first()->count() == 1) {
            return false;
        }

        return true;
    }

    public function first()
    {
        return $this->model->first();
    }

    public function create($results)
    {
        $data = $results;
        if($results['logo']) {
            $data['logo'] = $this->upload($results['logo']);
        }

        return $this->model->create($data);
    }

    public function update($results, $id)
    {
        $data = $results;
        if($results['logo']) {
            $data['logo'] = $this->upload($results['logo']);
        }

        return $this->model->update($data, $id);
    }
}
