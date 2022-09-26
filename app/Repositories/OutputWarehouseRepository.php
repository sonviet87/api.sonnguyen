<?php

namespace App\Repositories;

use App\Interfaces\OutputWarehouseInterface;
use App\Models\OutputWarehouse;

class OutputWarehouseRepository implements OutputWarehouseInterface
{
    protected $model;

    function __construct(OutputWarehouse $inputWarehouse)
    {
        $this->model = $inputWarehouse;
    }

    public function getListPaginate($perPage = 20)
    {
        return $this->model->orderBy('created_at', 'desc')->paginate($perPage);
    }

    public function createNewOutputWarehouse($data)
    {
        return $this->model->create($data);
    }

    public function getOutputWarehouseByID($id)
    {
        return $this->model->find($id);
    }

    public function updateOutputWarehousetByID($id, $data)
    {
        return $this->model->where('id', $id)->update($data);
    }

    public function destroyOutputWarehouseByIDs($ids)
    {
        return $this->model->destroy($ids);
    }

}
