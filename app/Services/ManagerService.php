<?php

namespace App\Services;

use App\Constants\UnitConst;
use App\Interfaces\ManagerInterface;
use App\Interfaces\UnitInterface;

class ManagerService extends BaseService
{
    protected $manager;

    function __construct(ManagerInterface $manager)
    {
        $this->manager = $manager;
    }


    public function getListPaginate($perPage = 20,$filter)
    {
        return $this->manager->getListPaginate($perPage,$filter);
    }


}
