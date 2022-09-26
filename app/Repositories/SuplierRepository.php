<?php

namespace App\Repositories;

use App\Interfaces\suplierInterface;
use App\Models\Suplier;


class SuplierRepository implements SuplierInterface
{
    protected $model;

    function __construct(Suplier $suplier)
    {
        $this->model = $suplier;
    }

    public function getListPaginate($perPage = 20)
    {
        return $this->model->orderBy('created_at', 'desc')->paginate($perPage);
    }

    public function createNewSuplier($data)
    {
        return $this->model->create($data);
    }

    public function getSuplierByID($id)
    {
        return $this->model->find($id);
    }

    public function updateSuplierByID($id, $data)
    {
        return $this->model->where('id', $id)->update($data);
    }

    public function destroySuplierByIDs($ids)
    {
        return $this->model->destroy($ids);
    }

}
