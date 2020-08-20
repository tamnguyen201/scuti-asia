<?php
namespace App\Repositories\Job;

use App\Repositories\Repository;

class JobRepository extends Repository implements JobRepositoryInterface
{
    private $htmlSelectCategory;
    private $htmlSelectLocation;
    public function __construct()
    {
        $this->htmlSelectCategory = '';
        $this->htmlSelectLocation = '';
        parent::__construct();
    }

    public function getModel()
    {
        return \App\Model\Job::class;
    }

    public function getListCategoryAdd($data)
    { 
        foreach ($data as $value) {
            $this->htmlSelectCategory .= "<option value='" . $value['id'] . "'>"  . $value['category_name'] . "</option>";
        }
        return $this->htmlSelectCategory;
    }

    public function getListLocationAdd($data)
    { 
        foreach ($data as $value) {
            $this->htmlSelectLocation .= "<option value='" . $value['id'] . "'>"  . $value['name'] . "</option>";
        }
        return $this->htmlSelectLocation;
    }

    public function getCategoryEdit($data, $id)
    { 
        foreach ($data as $value) {
            if($id == $value->id) {
                $this->htmlSelectCategory .= "<option selected value='" . $value['id'] . "'>"  . $value['category_name'] . "</option>";
            } else {
                $this->htmlSelectCategory .= "<option value='" . $value->id . "'>"  . $value->category_name . "</option>";
            }
        }
        return $this->htmlSelectCategory;
    }

    public function getLocationEdit($data, $id)
    { 
        foreach ($data as $value) {
            if($id == $value->id) {
                $this->htmlSelectLocation .= "<option selected value='" . $value['id'] . "'>"  . $value['name'] . "</option>";
            } else {
                $this->htmlSelectCategory .= "<option value='" . $value->id . "'>"  . $value->category_name . "</option>";
            }
        }
        return $this->htmlSelectLocation;
    }
}
