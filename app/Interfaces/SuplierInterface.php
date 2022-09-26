<?php
namespace App\Interfaces;

interface SuplierInterface {

    /**
     * Get all suplier with paginate
     * @param interger $perPage
     * @return mixed
     */
    public function getListPaginate($perPage = 20);

    /**
     * Create new suplier
     * @param array $data
     * @return mixed
     */
    public function createNewSuplier($data);

    /**
     * Get a suplier by ID
     * @param interger $id
     * @return mixed
     */
    public function getSuplierByID($id);

    /**
     * Update a suplier by ID
     * @param interger $id
     * @return mixed
     */
    public function updateSuplierByID($id, $data);

    /**
     * Delete a list of suplier by an array of user id
     * @param array $ids
     * @return mixed
     */
    public function destroySuplierByIDs($ids);

}
