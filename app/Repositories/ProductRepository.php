<?php

namespace App\Repositories;

use App\Interfaces\BranchInterface;
use App\Interfaces\ProductInterface;
use App\Models\Branch;
use App\Models\Product;

class ProductRepository implements ProductInterface
{
    protected $model;

    function __construct(Product $product)
    {
        $this->model = $product;
    }

    public function getListPaginate($perPage = 20)
    {
        return $this->model->orderBy('created_at', 'desc')->paginate($perPage);
    }

    public function createNewProduct($data)
    {
        return $this->model->create($data);
    }

    public function getProductByID($id)
    {
        return $this->model->find($id);
    }

    public function updateProductByID($id, $data)
    {
        return $this->model->where('id', $id)->update($data);
    }

    public function destroyProductsByIDs($ids)
    {
        return $this->model->destroy($ids);
    }

}
