<?php

namespace App\Repositories;

use App\Interfaces\UnitInterface;
use App\Models\Unit;

class UnitRepository implements UnitInterface
{
    protected $model;

    function __construct(Unit $unit)
    {
        $this->model = $unit;
    }

    public function getListPaginate($perPage = 20)
    {
        return $this->model->orderBy('created_at', 'desc')->paginate($perPage);
    }

    public function createNewUnit($data)
    {
        return $this->model->create($data);
    }

    public function getUnitByID($id)
    {
        return $this->model->find($id);
    }

    public function updateUnitByID($id, $data)
    {
        return $this->model->where('id', $id)->update($data);
    }

    public function destroyUnitsByIDs($ids)
    {
        return $this->model->destroy($ids);
    }

}
