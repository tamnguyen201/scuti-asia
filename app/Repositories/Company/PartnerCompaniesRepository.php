<?php
namespace App\Repositories\Company;

use App\Repositories\Repository;

class PartnerCompaniesRepository extends Repository implements PartnerCompaniesRepositoryInterface
{
    public function getModel()
    {
        return \App\Model\NewSpaper::class;
    }

    public function create($results)
    {
        $data = $results;
        if(array_key_exists("logo", $results)) {
            $data['logo'] = $this->upload($results['logo']);
        }
        
        return $this->model->create($data);
    }

    public function update($results, $id)
    {
        $data = $results;
        if(array_key_exists("logo", $results)) {
            $data['logo'] = $this->upload($results['logo']);
        }
        
        return $this->show($id)->update($data);
    }
}