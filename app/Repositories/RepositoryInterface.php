<?php

namespace App\Repositories;

interface RepositoryInterface
{
    public function all();

    public function create($data);

    public function update($data, $id);

    public function delete($id);

    public function show($id);

    public function paginate($perPage = 15, $columns = array('*'));
}