<?php
namespace App\Interfaces;

interface ManagerInterface {

    /**
     * Get all Unit with paginate
     * @param interger $perPage
     * @return mixed
     */
    public function getListPaginate($perPage = 20,$filter);

    /**
     * Create new unit
     * @param array $data
     * @return mixed
     */
    public function getList($filter);

}
