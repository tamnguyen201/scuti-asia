<?php
namespace App\Repositories\Company;

use App\Repositories\Repository;

class CompanyImagesRepository extends Repository implements CompanyImagesRepositoryInterface
{
    public function getModel()
    {
        return \App\Model\CompanyImages::class;
    }

    public function create($results)
    {
        $data = $results;
        if(in_array("image_url", $results)) {
            $data['image_url'] = $this->upload($results['image_url']);
        }
        
        return $this->model->create($data);
    }

    public function update($results, $id)
    {
        $data = $results;
        if(in_array("image_url", $results)) {
            $data['image_url'] = $this->upload($results['image_url']);
        }

        return $this->show($id)->update($data);
    }
}
