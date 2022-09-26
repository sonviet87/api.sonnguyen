<?php
namespace App\Http\Controllers;

use App\Exports\ManagerExport;
use App\Services\ManagerService;
use App\Services\UnitService;
use Illuminate\Http\Request;
use Excel;


class ManagerController extends RestfulController
{

    protected $managerService;
    public function __construct( ManagerService $managerService){
        parent::__construct();
        $this->managerService = $managerService;

    }
    /**
     * Get all approved units with paginate
     * @return mixed
     */
    public function index(Request $request){
        try{
            $perPage = $request->input("per_page", 20);
            $type_transacction = $request->input("typeTransaccsion", '');
            $type_account = $request->input("typeAccount", '');
            $startDay = $request->input("startDay", '');
            $endDay  = $request->input("endDay", '');
            //dd(date('Y-m-d H:i:s',strtotime($startDay)));
            $filter = [
                'type_transacction'            => $type_transacction,
                'type_account'               => $type_account,
                'startDay'               => $startDay,
                'endDay'               => $endDay,
            ];
            $unit = $this->managerService->getListPaginate($perPage,$filter);
            $unit->appends($request->except(['page', '_token']));
            $paginator = $this->getPaginator($unit);
            $pagingArr = $unit->toArray();
            return $this->_response([
                'pagination' => $paginator,
                'data' => $pagingArr['data']
            ]);
        }catch(\Exception $e){
            return $this->_error($e, self::HTTP_INTERNAL_ERROR);
        }
        
    }

    public function export()
    {
        return Excel::download(new ManagerExport(), 'manager.xlsx');
    }










}
