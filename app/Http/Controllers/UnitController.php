<?php
namespace App\Http\Controllers;

use App\Services\UnitService;
use Illuminate\Http\Request;


class UnitController extends RestfulController
{

    protected $unitService;
    public function __construct( UnitService $unitService){
        parent::__construct();
        $this->unitService = $unitService;

    }
    /**
     * Get all approved units with paginate
     * @return mixed
     */
    public function index(Request $request){
        try{
            $perPage = $request->input("per_page", 20);
            $unit = $this->unitService->getListPaginate($perPage);
            $unit->appends($request->except(['page', '_token']));
            $paginator = $this->getPaginator($unit);
            $pagingArr = $unit->toArray();
            return $this->_response([
                'pagination' => $paginator,
                'units' => $pagingArr['data']
            ]);
        }catch(\Exception $e){
            return $this->_error($e, self::HTTP_INTERNAL_ERROR);
        }
    }



    /**
     * Create a unit
     * @return mixed
     */
    public function store(Request $request){
        $this->validate($request, [
            'name' => 'bail|required',
        ]);
        try{
            $data = $request->all();
            $result = $this->unitService->createNewUnit($data);
            if($result['status']==false){
                return $this->_error($result['message']);
            }
            return $this->_success($result['message']);
        }catch(\Exception $e){
            return $this->_error($e, self::HTTP_INTERNAL_ERROR);
        }
    }

    /**
     * Get a unit by id
     * @param interger $id
     * @return mixed
     */
    public function show($id){
        try{
            $result = $this->unitService->getUnitByID($id);
            if($result['status']==false){
                return $this->_error($result['message']);
            }
            return $this->_response($result['data']);
        }catch(\Exception $e){
            return $this->_error($e, self::HTTP_INTERNAL_ERROR);
        }
    }

    /**
     * Update a unit by unit id
     * @return mixed
     */
    public function update(Request $request, $id){
        $this->validate($request, [
            'name' => 'bail|required'
        ]);
        try{
            $data = $request->all();
            $result = $this->unitService->updateUnitByID($id, $data);
            if($result['status']==false){
                return $this->_error($result['message']);
            }
            return $this->_success($result['message']);
        }catch(\Exception $e){
            return $this->_error($e, self::HTTP_INTERNAL_ERROR);
        }
    }

    /**
     * Delete a list of unit by an array of unit id
     * @param array $ids
     * @return mixed
     */
    public function destroy(Request $request){
        $this->validate($request, [
            'ids' => 'required|array|min:1',
        ]);
        try{
            $ids = $request->input('ids');
            $result = $this->unitService->destroyUnitsByIDs($ids);
            if($result['status']==false){
                return $this->_error($result['message']);
            }
            return $this->_success($result['message']);
        }catch(\Exception $e){
            return $this->_error($e, self::HTTP_INTERNAL_ERROR);
        }
    }

}
