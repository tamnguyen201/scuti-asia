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
        $data = $results;
        if(in_array("logo", $results)) {
            $data['logo'] = $this->upload($results['logo']);
        }
        
        return $this->model->create($data);
    }

    public function update($results, $id)
    {
        $data = $results;
        if(in_array("logo", $results)) {
            $data['logo'] = $this->upload($results['logo']);
        }
        
        return $this->show($id)->update($data);
    }
}
