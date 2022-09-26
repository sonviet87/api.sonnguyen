<?php

namespace App\Repositories;

use App\Interfaces\ManagerInterface;
use App\Models\Manager;
use App\Models\Unit;

class ManagerRepository implements ManagerInterface
{
    protected $model;

    function __construct(Manager $unit)
    {
        $this->model = $unit;
    }

    public function getListPaginate($perPage = 20,$filter = [])
    {

        $query = $this->model;
        if(!empty($filter)){
            if(isset($filter['type_transacction']) && $filter['type_transacction'] !=0){
                $query = $query->where('type_transacction',$filter['type_transacction']);
            }
            if(isset($filter['type_account']) && $filter['type_account'] !=0){
                $query = $query->where('type_account',$filter['type_account']);
            }
            if(isset($filter['startDay']) && $filter['startDay'] !='' && isset($filter['endDay']) && $filter['endDay'] !=''){
                $statDay = date('Y-m-d H:i:s',strtotime($filter['startDay']));
                $endDay = date('Y-m-d H:i:s',strtotime($filter['endDay']));
                $query = $query->where('created_at', '>=', $statDay)->where('created_at', '<=', $endDay);
            }
        }
        return $query->orderBy('created_at', 'desc')->paginate($perPage);
    }



}
