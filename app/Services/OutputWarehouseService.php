<?php

namespace App\Services;

use App\Interfaces\OutputWarehouseInfoInterface;
use App\Interfaces\OutputWarehouseInterface;
use Carbon\Carbon;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OutputWarehouseService extends BaseService
{
    protected $outputWarehouse;
    protected $outputWarehouseInfo;

    function __construct(OutputWarehouseInterface $outputWarehouse, OutputWarehouseInfoInterface $outputWarehouseInfo)
    {
        $this->outputWarehouse = $outputWarehouse;
        $this->outputWarehouseInfo = $outputWarehouseInfo;
    }


    public function getListPaginate($perPage = 20)
    {
        return $this->outputWarehouse->getListPaginate($perPage);
    }

    public function createNewOutputWarehouse($data)
    {
        DB::beginTransaction();
        try {
            $user = Auth::user();
            if (!$data) {
                DB::rollBack();
                return $this->_result(false, 'Created failed');
            }
            $detailsOutputWarehouse = $data['details'];
            $arrWarehouse = Arr::except($data, ['details']);

            $arrWarehouse['user_id'] = $user->id;
            $outputWarehouse = $this->outputWarehouse->createNewOutputWarehouse($arrWarehouse);

            if (!$detailsOutputWarehouse) {
                DB::rollBack();
                return $this->_result(false, trans('Created failed'));
            }

            $arrWarehouseDetails = [];

            foreach ($detailsOutputWarehouse as $key => $item) {
                $arrWarehouseDetails[$key] = $item;
                $arrWarehouseDetails[$key]['output_id'] = $outputWarehouse->id;
                $arrWarehouseDetails[$key]['created_at'] = Carbon::now();
                $arrWarehouseDetails[$key]['updated_at'] = Carbon::now();
                $this->outputWarehouseInfo->create($arrWarehouseDetails[$key]);
            }

            $outputWarehouse->details = $arrWarehouseDetails;

            DB::commit();
            return $this->_result(true, trans('Created successfully'), [
                'outputWarehouse' => $outputWarehouse
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            return $this->_result(false, $e->getMessage());
        }


        return $this->_result(true, 'Created successfully');
    }

    public function getOutputWarehouseByID($id)
    {
        $outputWarehouse = $this->outputWarehouse->getOutputWarehouseByID($id);
        if (!$outputWarehouse) {
            return $this->_result(false, 'Not found!');
        }
        return $this->_result(true, '', $outputWarehouse);
    }

    public function updateOutputWarehouseByID($id, $data)
    {
        $outputWarehouse = $this->outputWarehouse->getOutputWarehouseByID($id);
        if (!$outputWarehouse) {
            return $this->_result(false, 'Not found!');
        }
        $result = $this->outputWarehouse->updateOutputWarehousetByID($id, $data);
        if (!$result) {
            return $this->_result(false, 'Updated failed');
        }
        return $this->_result(true, 'Updated successfully');
    }

    public function destroyOutputWarehousesByIDs($ids)
    {
        if (empty($ids)) {return $this->_result(false, 'not found id!');}
        $check = $this->outputWarehouse->destroyOutputWarehouseByIDs($ids);
        if (!$check) {
            return $this->_result(false, 'Delete failed!');
        }

        foreach ($ids as $id) {
            $rsIDs = $this->outputWarehouseInfo->getOutputWarehouseByIDs($id);
            if ($rsIDs->count() > 0) {
                $arrIDs = $rsIDs->pluck('id')->toArray();

                $this->outputWarehouseInfo->destroyOutputWarehouseInfoByIDs($arrIDs);
            }
        }

        return $this->_result(true, 'Delete successfuly');
    }

}
