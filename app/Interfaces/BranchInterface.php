<?php
namespace App\Interfaces;

interface BranchInterface {

    /**
     * Get all branch with paginate
     * @param interger $perPage
     * @return mixed
     */
    public function getListPaginate($perPage = 20);

    /**
     * Create new branch
     * @param array $data
     * @return mixed
     */
    public function createNewBranch($data);

    /**
     * Get a branch by ID
     * @param interger $id
     * @return mixed
     */
    public function getBranchByID($id);

    /**
     * Update a branch by ID
     * @param interger $id
     * @return mixed
     */
    public function updateBranchByID($id, $data);

    /**
     * Delete a list of users by an array of branch id
     * @param array $ids
     * @return mixed
     */
    public function destroyBranchByIDs($ids);

}
