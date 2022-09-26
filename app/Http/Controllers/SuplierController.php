<?php
namespace App\Http\Controllers;

use App\Services\SuplierService;
use Illuminate\Http\Request;


class SuplierController extends RestfulController
{

    protected $suplierService;
    public function __construct( SuplierService $suplierService){
        parent::__construct();
        $this->suplierService = $suplierService;

    }
    /**
     * Get all approved suplier with paginate
     * @return mixed
     */
    public function index(Request $request){
        try{
            $perPage = $request->input("per_page", 20);
            $unit = $this->suplierService->getListPaginate($perPage);
            $unit->appends($request->except(['page', '_token']));
            $paginator = $this->getPaginator($unit);
            $pagingArr = $unit->toArray();
            return $this->_response([
                'pagination' => $paginator,
                'supliers' => $pagingArr['data']
            ]);
        }catch(\Exception $e){
            return $this->_error($e, self::HTTP_INTERNAL_ERROR);
        }
    }



    /**
     * Create a suplier
     * @return mixed
     */
    public function store(Request $request){
        $this->validate($request, [
            'name' => 'bail|required',
        ]);
        try{
            $data = $request->all();
            $result = $this->suplierService->createNewSuplier($data);
            if($result['status']==false){
                return $this->_error($result['message']);
            }
            return $this->_success($result['message']);
        }catch(\Exception $e){
            return $this->_error($e, self::HTTP_INTERNAL_ERROR);
        }
    }

    /**
     * Get a suplier by id
     * @param interger $id
     * @return mixed
     */
    public function show($id){
        try{
            $result = $this->suplierService->getSuplierByID($id);
            if($result['status']==false){
                return $this->_error($result['message']);
            }
            return $this->_response($result['data']);
        }catch(\Exception $e){
            return $this->_error($e, self::HTTP_INTERNAL_ERROR);
        }
    }

    /**
     * Update a suplier by suplier id
     * @return mixed
     */
    public function update(Request $request, $id){
        $this->validate($request, [
            'name' => 'bail|required'
        ]);
        try{
            $data = $request->all();
            $result = $this->suplierService->updateSuplierByID($id, $data);
            if($result['status']==false){
                return $this->_error($result['message']);
            }
            return $this->_success($result['message']);
        }catch(\Exception $e){
            return $this->_error($e, self::HTTP_INTERNAL_ERROR);
        }
    }

    /**
     * Delete a list of suplier by an array of suplier id
     * @param array $ids
     * @return mixed
     */
    public function destroy(Request $request){
        $this->validate($request, [
            'ids' => 'required|array|min:1',
        ]);
        try{
            $ids = $request->input('ids');
            $result = $this->suplierService->destroySupliersByIDs($ids);
            if($result['status']==false){
                return $this->_error($result['message']);
            }
            return $this->_success($result['message']);
        }catch(\Exception $e){
            return $this->_error($e, self::HTTP_INTERNAL_ERROR);
        }
    }

}
