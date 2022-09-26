<?php

namespace App\Services;

use App\Constants\ProductConst;
use App\Interfaces\ProductInterface;

class ProductService extends BaseService
{
    protected $product;

    function __construct(ProductInterface $product)
    {
        $this->product = $product;
    }


    public function getListPaginate($perPage = 20)
    {
        return $this->product->getListPaginate($perPage);
    }

    public function createNewProduct($data)
    {
        $data['status'] = ProductConst::STATUS_ACTIVE;
        $product = $this->product->createNewProduct($data);
        if (!$product) {
            return $this->_result(false, 'Created failed');
        }
        return $this->_result(true, 'Created successfully');
    }

    public function getProductByID($id)
    {
        $product = $this->product->getProductByID($id);
        if (!$product) {
            return $this->_result(false, 'Not found!');
        }
        return $this->_result(true, '', $product);
    }

    public function updateProductByID($id, $data)
    {
        $product = $this->product->getProductByID($id);
        if (!$product) {
            return $this->_result(false, 'Not found!');
        }
        $result = $this->product->updateProductByID($id, $data);
        if (!$result) {
            return $this->_result(false, 'Updated failed');
        }
        return $this->_result(true, 'Updated successfully');
    }

    public function destroyProductsByIDs($ids)
    {
        $check = $this->product->destroyProductsByIDs($ids);
        if (!$check) {
            return $this->_result(false, 'Delete failed!');
        }
        return $this->_result(true, 'Delete successfuly');
    }

}
