<?php
namespace App\Interfaces;

interface ProductInterface {

    /**
     * Get all Product with paginate
     * @param interger $perPage
     * @return mixed
     */
    public function getListPaginate($perPage = 20);

    /**
     * Create new Product
     * @param array $data
     * @return mixed
     */
    public function createNewProduct($data);

    /**
     * Get a Product by ID
     * @param interger $id
     * @return mixed
     */
    public function getProductByID($id);

    /**
     * Update a Product by ID
     * @param interger $id
     * @return mixed
     */
    public function updateProductByID($id, $data);

    /**
     * Delete a list of Products by an array of Product id
     * @param array $ids
     * @return mixed
     */
    public function destroyProductsByIDs($ids);

}
