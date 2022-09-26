<?php
namespace App\Http\Controllers;

use App\Services\InputWarehouseService;
use Illuminate\Http\Request;


class InputWarehouseController extends RestfulController
{

    protected $inputWarehouseService;
    public function __construct( InputWarehouseService $inputWarehouseService){
        parent::__construct();
        $this->inputWarehouseService = $inputWarehouseService;

    }
    /**
     * Get all approved units with paginate
     * @return mixed
     */
    public function index(Request $request){
        try{
            $perPage = $request->input("per_page", 20);
            $unit = $this->inputWarehouseService->getListPaginate($perPage);
            $unit->appends($request->except(['page', '_token']));
            $paginator = $this->getPaginator($unit);
            $pagingArr = $unit->toArray();
            return $this->_response([
                'pagination' => $paginator,
                'inputWarehouse' => $pagingArr['data']
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
            'code' => 'bail|required',
            'details'       => 'required|array|min:1',
            'details.*.count' => 'required',
            'details.*.input_price' => 'required',
            'details.*.product_id' => 'required|exists:products,id',
        ]);
        try{
            $data = $request->all();
            $result = $this->inputWarehouseService->createNewInputWarehouse($data);
            if($result['status'] == false){
                return $this->_error($result['message']);
            }
            return $this->_response($result['data']['inputWarehouse'], $result['message']);
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
            $result = $this->inputWarehouseService->getInputWarehouseByID($id);
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
            'code' => 'bail|required',
            'details'       => 'required|array|min:1',
            'details.*.count' => 'required',
            'details.*.input_price' => 'required',
            'details.*.product_id' => 'required|exists:products,id',
        ]);
        try{
            $data = $request->all();
            $result = $this->inputWarehouseService->updateInputWarehouseByID($id, $data);
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
            $result = $this->inputWarehouseService->destroyInputWarehousesByIDs($ids);
            if($result['status']==false){
                return $this->_error($result['message']);
            }
            return $this->_success($result['message']);
        }catch(\Exception $e){
            return $this->_error($e, self::HTTP_INTERNAL_ERROR);
        }
    }

}
