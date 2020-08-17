<?php
namespace App\Repositories\Company;

use App\Repositories\Repository;

class PartnerCompaniesRepository extends Repository implements PartnerCompaniesRepositoryInterface
{
    public function getModel()
    {
        return \App\Model\PartnerCompanies::class;
    }

    public function create($results)
    {
        $data['logo'] = $this->upload($results['logo']);
        
        return $this->model->create($data);
    }

    public function update($results, $id)
    {
        $data['logo'] = $this->upload($results['logo']);
        
        return $this->model->update($data, $id);
    }
}
