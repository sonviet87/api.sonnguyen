<?php

namespace App\Repositories;

use App\Interfaces\BranchInterface;
use App\Models\Branch;

class BranchRepository implements BranchInterface
{
    protected $model;

    function __construct(Branch $branch)
    {
        $this->model = $branch;
    }

    public function getListPaginate($perPage = 20)
    {
        return $this->model->orderBy('created_at', 'desc')->paginate($perPage);
    }

    public function createNewBranch($data)
    {
        return $this->model->create($data);
    }

    public function getBranchByID($id)
    {
        return $this->model->find($id);
    }

    public function updateBranchByID($id, $data)
    {
        return $this->model->where('id', $id)->update($data);
    }

    public function destroyBranchByIDs($ids)
    {
        return $this->model->destroy($ids);
    }

}
