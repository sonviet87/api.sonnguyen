<?php

namespace App\Services;


use App\Interfaces\BranchInterface;


class BranchService extends BaseService
{
    protected $branch;

    function __construct( BranchInterface $branch)
    {
        $this->branch = $branch;
    }


    public function getListPaginate($perPage = 20)
    {
        return $this->branch->getListPaginate($perPage);
    }

    public function createNewBranch($data)
    {
        $branch = $this->branch->createNewBranch($data);
        if (!$branch) {
            return $this->_result(false, 'Created failed');
        }
        return $this->_result(true, 'Created successfully');
    }

    public function getBranchByID($id)
    {
        $branch = $this->branch->getBranchByID($id);
        if (!$branch) {
            return $this->_result(false, 'Not found!');
        }
        return $this->_result(true, '', $branch);
    }

    public function updateBranchByID($id, $data)
    {
        $branch = $this->branch->getBranchByID($id);
        if (!$branch) {
            return $this->_result(false, 'Not found!');
        }
        $result = $this->branch->updateBranchByID($id, $data);
        if (!$result) {
            return $this->_result(false, 'Updated failed');
        }
        return $this->_result(true, 'Updated successfully');
    }

    public function destroyBranchsByIDs($ids)
    {
        $check = $this->branch->destroyBranchByIDs($ids);
        if (!$check) {
            return $this->_result(false, 'Delete failed!');
        }
        return $this->_result(true, 'Delete successfuly');
    }

}
