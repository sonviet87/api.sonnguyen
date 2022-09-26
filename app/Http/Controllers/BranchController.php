<?php
namespace App\Http\Controllers;

use App\Services\BranchService;
use Illuminate\Http\Request;
use JC\Viettel\WebService\BulkSMS;
use sahifedp\jdf\jdf;


class BranchController extends RestfulController
{

    protected $branchService;
    public function __construct( BranchService $branchService){
        parent::__construct();
        $this->branchService = $branchService;

    }

    public function testsms(){
       /* $url = 'http://203.190.170.43:9998/bulkapi?wsdl';
        $user = 'smsbrand_rangtaydo';
        $password = 'leavemealone147a@';
        $cpCode = 'NK_SGTAMDUC';
        $service = new BulkSMS($url, $user, $password, $cpCode);
        $service->SetMT(new BulkSMS\MT('70xxx', "nội dung tin nhắn 1"));
        $result = $service->SendSingle('0968762685');
// Kiểm tra gửi thành công hay chưa
        if(!$result->IsSuccess){
            var_dump($result->Response);
        }*/

    }
    /**
     * Get all approved branchs with paginate
     * @return mixed
     */
    public function index(Request $request){
        try{
            $perPage = $request->input("per_page", 20);
            $branch = $this->branchService->getListPaginate($perPage);
            $branch->appends($request->except(['page', '_token']));
            $paginator = $this->getPaginator($branch);
            $pagingArr = $branch->toArray();
            return $this->_response([
                'pagination' => $paginator,
                'branchs' => $pagingArr['data']
            ]);
        }catch(\Exception $e){
            return $this->_error($e, self::HTTP_INTERNAL_ERROR);
        }
    }



    /**
     * Create a branch
     * @return mixed
     */
    public function store(Request $request){
        $this->validate($request, [
            'name' => 'bail|required',
        ]);
        try{
            $data = $request->all();
            $result = $this->branchService->createNewBranch($data);
            if($result['status']==false){
                return $this->_error($result['message']);
            }
            return $this->_success($result['message']);
        }catch(\Exception $e){
            return $this->_error($e, self::HTTP_INTERNAL_ERROR);
        }
    }

    /**
     * Get a branch by id
     * @param interger $id
     * @return mixed
     */
    public function show($id){
        try{
            $result = $this->branchService->getBranchByID($id);
            if($result['status']==false){
                return $this->_error($result['message']);
            }
            return $this->_response($result['data']);
        }catch(\Exception $e){
            return $this->_error($e, self::HTTP_INTERNAL_ERROR);
        }
    }

    /**
     * Update a branch by branch id
     * @return mixed
     */
    public function update(Request $request, $id){
        $this->validate($request, [
            'name' => 'bail|required'
        ]);
        try{
            $data = $request->all();
            $result = $this->branchService->updateBranchByID($id, $data);
            if($result['status']==false){
                return $this->_error($result['message']);
            }
            return $this->_success($result['message']);
        }catch(\Exception $e){
            return $this->_error($e, self::HTTP_INTERNAL_ERROR);
        }
    }

    /**
     * Delete a list of branch by an array of branch id
     * @param array $ids
     * @return mixed
     */
    public function destroy(Request $request){
        $this->validate($request, [
            'ids' => 'required|array|min:1',
        ]);
        try{
            $ids = $request->input('ids');
            $result = $this->branchService->destroyBranchsByIDs($ids);
            if($result['status']==false){
                return $this->_error($result['message']);
            }
            return $this->_success($result['message']);
        }catch(\Exception $e){
            return $this->_error($e, self::HTTP_INTERNAL_ERROR);
        }
    }

}
