<?php
namespace App\Interfaces;

interface OutputWarehouseInterface {

    /**
     * Get all OutputWarehouse with paginate
     * @param interger $perPage
     * @return mixed
     */
    public function getListPaginate($perPage = 20);

    /**
     * Create new OutputWarehouse
     * @param array $data
     * @return mixed
     */
    public function createNewOutputWarehouse($data);

    /**
     * Get a OutputWarehouse by ID
     * @param interger $id
     * @return mixed
     */
    public function getOutputWarehouseByID($id);

    /**
     * Update a OutputWarehouse by ID
     * @param interger $id
     * @return mixed
     */
    public function updateOutputWarehousetByID($id, $data);

    /**
     * Delete a list of OutputWarehouses by an array of OutputWarehouse id
     * @param array $ids
     * @return mixed
     */
    public function destroyOutputWarehouseByIDs($ids);

}
