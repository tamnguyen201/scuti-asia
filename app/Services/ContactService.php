<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Repositories\Company\ContactRepositoryInterface;

class ContactService
{
    public function __construct(ContactRepositoryInterface $ContactRepository)
    {
        $this->ContactRepository = $ContactRepository;
    }

    public function paginate($perPage = 15, $columns = array('*'))
    {
        return $this->ContactRepository->paginate($perPage, $columns);
    }

    public function show($id)
    {
        return $this->ContactRepository->show($id);
    }
}
