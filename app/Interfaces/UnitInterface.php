<?php
namespace App\Interfaces;

interface UnitInterface {

    /**
     * Get all Unit with paginate
     * @param interger $perPage
     * @return mixed
     */
    public function getListPaginate($perPage = 20);

    /**
     * Create new unit
     * @param array $data
     * @return mixed
     */
    public function createNewUnit($data);

    /**
     * Get a unit by ID
     * @param interger $id
     * @return mixed
     */
    public function getUnitByID($id);

    /**
     * Update a unit by ID
     * @param interger $id
     * @return mixed
     */
    public function updateUnitByID($id, $data);

    /**
     * Delete a list of units by an array of unit id
     * @param array $ids
     * @return mixed
     */
    public function destroyUnitsByIDs($ids);

}
