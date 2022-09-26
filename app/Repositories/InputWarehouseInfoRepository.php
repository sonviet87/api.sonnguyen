<?php

namespace App\Repositories;

use App\Interfaces\InputWarehouseInfoInterface;
use App\Models\InputWarehouseInfo;

class InputWarehouseInfoRepository implements InputWarehouseInfoInterface
{
    protected $model;

    function __construct(InputWarehouseInfo $inputWarehouseInfo)
    {
        $this->model = $inputWarehouseInfo;
    }

    public function create($data)
    {
        return $this->model->create($data);
    }

    public function getInputWarehouseInfoByID($id)
    {
        return $this->model->find($id);
    }

    public function getInputWarehouseByIDs($id)
    {
        return $this->model->where('input_id',$id)->get();
    }

    public function updateInputWarehouseInfoByID($id, $data)
    {
        return $this->model->where('id', $id)->update($data);
    }

    public function destroyInputWarehouseInfoByIDs($ids)
    {
        return $this->model->destroy($ids);
    }

}
