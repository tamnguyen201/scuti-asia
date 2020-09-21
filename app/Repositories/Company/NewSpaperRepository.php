<?php
namespace App\Repositories\Company;

use App\Repositories\Repository;

class NewSpaperRepository extends Repository implements NewSpaperRepositoryInterface
{
    public function getModel()
    {
        return \App\Model\NewSpaper::class;
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
