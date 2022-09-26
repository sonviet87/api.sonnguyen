<?php

namespace App\Repositories;

use App\Interfaces\InputWarehouseInterface;
use App\Models\InputWarehouse;

class InputWarehouseRepository implements InputWarehouseInterface
{
    protected $model;

    function __construct(InputWarehouse $inputWarehouse)
    {
        $this->model = $inputWarehouse;
    }

    public function getListPaginate($perPage = 20)
    {
        return $this->model->orderBy('created_at', 'desc')->paginate($perPage);
    }

    public function createNewInputWarehouse($data)
    {
        return $this->model->create($data);
    }

    public function getInputWarehouseByID($id)
    {
        return $this->model->find($id);
    }

    public function updateInputWarehousetByID($id, $data)
    {
        return $this->model->where('id', $id)->update($data);
    }

    public function destroyInputWarehouseByIDs($ids)
    {
        return $this->model->destroy($ids);
    }

}
