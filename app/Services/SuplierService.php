<?php

namespace App\Services;

use App\Constants\SuplierConst;
use App\Interfaces\SuplierInterface;

class SuplierService extends BaseService
{
    protected $suplier;

    function __construct(SuplierInterface $suplier)
    {
        $this->suplier = $suplier;
    }


    public function getListPaginate($perPage = 20)
    {
        return $this->suplier->getListPaginate($perPage);
    }

    public function createNewSuplier($data)
    {
        $data['status'] = suplierConst::STATUS_ACTIVE;
        $suplier = $this->suplier->createNewSuplier($data);
        if (!$suplier) {
            return $this->_result(false, 'Created failed');
        }
        return $this->_result(true, 'Created successfully');
    }

    public function getSuplierByID($id)
    {
        $suplier = $this->suplier->getSuplierByID($id);
        if (!$suplier) {
            return $this->_result(false, 'Not found!');
        }
        return $this->_result(true, '', $suplier);
    }

    public function updateSuplierByID($id, $data)
    {
        $suplier = $this->suplier->getSuplierByID($id);
        if (!$suplier) {
            return $this->_result(false, 'Not found!');
        }
        $result = $this->suplier->updateSuplierByID($id, $data);
        if (!$result) {
            return $this->_result(false, 'Updated failed');
        }
        return $this->_result(true, 'Updated successfully');
    }

    public function destroySupliersByIDs($ids)
    {
        $check = $this->suplier->destroySuplierByIDs($ids);
        if (!$check) {
            return $this->_result(false, 'Delete failed!');
        }
        return $this->_result(true, 'Delete successfuly');
    }

}
