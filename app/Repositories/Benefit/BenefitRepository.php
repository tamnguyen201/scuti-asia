<?php
namespace App\Repositories\Benefit;

use App\Repositories\Repository;

class BenefitRepository extends Repository implements BenefitRepositoryInterface
{
    public function getModel()
    {
        return \App\Model\Benefit::class;
    }

    public function create($results)
    {
        $data = $results;
        if(array_key_exists("image", $results)) {
            $data['image'] = $this->upload($results['image']);
        }
        
        return $this->model->create($data);
    }

    public function update($results, $id)
    {
        $data = $results;
        if(array_key_exists("image", $results)) {
            $data['image'] = $this->upload($results['image']);
        }
        
        return $this->show($id)->update($data);
    }
}
