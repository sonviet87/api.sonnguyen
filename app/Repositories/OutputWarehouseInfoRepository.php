<?php

namespace App\Repositories;

use App\Interfaces\OutputWarehouseInfoInterface;
use App\Models\OutputWarehouseInfo;

class OutputWarehouseInfoRepository implements OutputWarehouseInfoInterface
{
    protected $model;

    function __construct(OutputWarehouseInfo $inputWarehouseInfo)
    {
        $this->model = $inputWarehouseInfo;
    }

    public function create($data)
    {
        return $this->model->create($data);
    }

    public function getOutputWarehouseInfoByID($id)
    {
        return $this->model->find($id);
    }

    public function getOutputWarehouseByIDs($id)
    {

        return $this->model->where('output_id',$id)->get();
    }

    public function updateOutputWarehouseInfoByID($id, $data)
    {
        return $this->model->where('id', $id)->update($data);
    }

    public function destroyOutputWarehouseInfoByIDs($ids)
    {
        return $this->model->destroy($ids);
    }

}
