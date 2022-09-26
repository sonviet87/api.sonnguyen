<?php
namespace App\Interfaces;

interface InputWarehouseInterface {

    /**
     * Get all InputWarehouse with paginate
     * @param interger $perPage
     * @return mixed
     */
    public function getListPaginate($perPage = 20);

    /**
     * Create new InputWarehouse
     * @param array $data
     * @return mixed
     */
    public function createNewInputWarehouse($data);

    /**
     * Get a InputWarehouse by ID
     * @param interger $id
     * @return mixed
     */
    public function getInputWarehouseByID($id);

    /**
     * Update a InputWarehouse by ID
     * @param interger $id
     * @return mixed
     */
    public function updateInputWarehousetByID($id, $data);

    /**
     * Delete a list of InputWarehouses by an array of InputWarehouse id
     * @param array $ids
     * @return mixed
     */
    public function destroyInputWarehouseByIDs($ids);

}
