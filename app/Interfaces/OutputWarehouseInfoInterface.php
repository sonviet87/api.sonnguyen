<?php
namespace App\Interfaces;

interface OutputWarehouseInfoInterface {


    /**
     * Create new OutputWarehouse
     * @param array $data
     * @return mixed
     */
    public function create($data);

    /**
     * Get a OutputWarehouseInfo by ID
     * @param interger $id
     * @return mixed
     */
    public function getOutputWarehouseInfoByID($id);

    /**
     * Get a OutputWarehouse by ID
     * @param interger $id
     * @return mixed
     */
    public function getOutputWarehouseByIDs($id);
    /**
     * Update a OutputWarehouse by ID
     * @param interger $id
     * @return array id
     */
    public function updateOutputWarehouseInfoByID($id, $data);

    /**
     * Delete a list of OutputWarehouses by an array of OutputWarehouse id
     * @param array $ids
     * @return mixed
     */
    public function destroyOutputWarehouseInfoByIDs($ids);

}
