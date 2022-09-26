<?php

namespace App\Services;

use App\Constants\UnitConst;
use App\Interfaces\UnitInterface;

class UnitService extends BaseService
{
    protected $unit;

    function __construct(UnitInterface $unit)
    {
        $this->unit = $unit;
    }


    public function getListPaginate($perPage = 20)
    {
        return $this->unit->getListPaginate($perPage);
    }

    public function createNewUnit($data)
    {
        $data['status'] = UnitConst::STATUS_ACTIVE;
        $unit = $this->unit->createNewunit($data);
        if (!$unit) {
            return $this->_result(false, 'Created failed');
        }
        return $this->_result(true, 'Created successfully');
    }

    public function getUnitByID($id)
    {
        $unit = $this->unit->getUnitByID($id);
        if (!$unit) {
            return $this->_result(false, 'Not found!');
        }
        return $this->_result(true, '', $unit);
    }

    public function updateUnitByID($id, $data)
    {
        $unit = $this->unit->getUnitByID($id);
        if (!$unit) {
            return $this->_result(false, 'Not found!');
        }
        $result = $this->unit->updateUnitByID($id, $data);
        if (!$result) {
            return $this->_result(false, 'Updated failed');
        }
        return $this->_result(true, 'Updated successfully');
    }

    public function destroyUnitsByIDs($ids)
    {
        $check = $this->unit->destroyUnitsByIDs($ids);
        if (!$check) {
            return $this->_result(false, 'Delete failed!');
        }
        return $this->_result(true, 'Delete successfuly');
    }

}
