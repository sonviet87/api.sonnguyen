<?php
namespace App\Http\Controllers;

use App\Services\OutputWarehouseService;
use Illuminate\Http\Request;


class OutputWarehouseController extends RestfulController
{

    protected $outputWarehouseService;
    public function __construct( OutputWarehouseService $outputWarehouseService){
        parent::__construct();
        $this->outputWarehouseService = $outputWarehouseService;

    }
    /**
     * Get all approved units with paginate
     * @return mixed
     */
    public function index(Request $request){
        try{
            $perPage = $request->input("per_page", 20);
            $unit = $this->outputWarehouseService->getListPaginate($perPage);
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
            'brach_id' => 'bail|required|exists:branches,id',
            'details'       => 'required|array|min:1',
            'details.*.count' => 'required',
            'details.*.input_info_id' => 'required|exists:input_warehouses_infor,id',
            'details.*.product_id' => 'required|exists:products,id',
        ]);
        try{
            $data = $request->all();
            $result = $this->outputWarehouseService->createNewOutputWarehouse($data);
            if($result['status'] == false){
                return $this->_error($result['message']);
            }
            return $this->_response($result['data']['outputWarehouse'], $result['message']);
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
            $result = $this->outputWarehouseService->getOutputWarehouseByID($id);
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
            $result = $this->outputWarehouseService->updateOutputWarehouseByID($id, $data);
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
            $result = $this->outputWarehouseService->destroyOutputWarehousesByIDs($ids);
            if($result['status']==false){
                return $this->_error($result['message']);
            }
            return $this->_success($result['message']);
        }catch(\Exception $e){
            return $this->_error($e, self::HTTP_INTERNAL_ERROR);
        }
    }

}
