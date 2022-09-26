<?php
namespace App\Interfaces;

interface InputWarehouseInfoInterface {


    /**
     * Create new InputWarehouse
     * @param array $data
     * @return mixed
     */
    public function create($data);

    /**
     * Get a InputWarehouseInfo by ID
     * @param interger $id
     * @return mixed
     */
    public function getInputWarehouseInfoByID($id);

    /**
     * Get a InputWarehouse by ID
     * @param interger $id
     * @return mixed
     */
    public function getInputWarehouseByIDs($id);
    /**
     * Update a InputWarehouse by ID
     * @param interger $id
     * @return array id
     */
    public function updateInputWarehouseInfoByID($id, $data);

    /**
     * Delete a list of InputWarehouses by an array of InputWarehouse id
     * @param array $ids
     * @return mixed
     */
    public function destroyInputWarehouseInfoByIDs($ids);

}
