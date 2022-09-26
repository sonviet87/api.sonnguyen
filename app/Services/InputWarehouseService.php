<?php

namespace App\Services;


use App\Interfaces\InputWarehouseInfoInterface;
use App\Interfaces\InputWarehouseInterface;
use Carbon\Carbon;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class InputWarehouseService extends BaseService
{
    protected $inputWarehouse;
    protected $inputWarehouseInfo;

    function __construct(InputWarehouseInterface $inputWarehouse, InputWarehouseInfoInterface $inputWarehouseInfo)
    {
        $this->inputWarehouse = $inputWarehouse;
        $this->inputWarehouseInfo = $inputWarehouseInfo;
    }


    public function getListPaginate($perPage = 20)
    {
        return $this->inputWarehouse->getListPaginate($perPage);
    }

    public function createNewInputWarehouse($data)
    {
        DB::beginTransaction();
        try {
            $user = Auth::user();
            if (!$data) {
                DB::rollBack();
                return $this->_result(false, 'Created failed');
            }
            $detailsInputWarehouse = $data['details'];
            $arrWarehouse = Arr::except($data, ['details']);

            $arrWarehouse['user_id'] = $user->id;
            $inputWarehouse = $this->inputWarehouse->createNewInputWarehouse($arrWarehouse);

            if (!$detailsInputWarehouse) {
                DB::rollBack();
                return $this->_result(false, trans('Created failed'));
            }

            $arrWarehouseDetails = [];

            foreach ($detailsInputWarehouse as $key => $item) {
                $arrWarehouseDetails[$key] = $item;
                $arrWarehouseDetails[$key]['input_id'] = $inputWarehouse->id;
                $arrWarehouseDetails[$key]['created_at'] = Carbon::now();
                $arrWarehouseDetails[$key]['updated_at'] = Carbon::now();
                $this->inputWarehouseInfo->create($arrWarehouseDetails[$key]);
            }

            $inputWarehouse->details = $arrWarehouseDetails;

            DB::commit();
            return $this->_result(true, trans('Created successfully'), [
                'inputWarehouse' => $inputWarehouse
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            return $this->_result(false, $e->getMessage());
        }


        return $this->_result(true, 'Created successfully');
    }

    public function getInputWarehouseByID($id)
    {
        $inputWarehouse = $this->inputWarehouse->getInputWarehouseByID($id);
        if (!$inputWarehouse) {
            return $this->_result(false, 'Not found!');
        }
        return $this->_result(true, '', $inputWarehouse);
    }

    public function updateInputWarehouseByID($id, $data)
    {
        $inputWarehouse = $this->inputWarehouse->getInputWarehouseByID($id);
        if (!$inputWarehouse) {
            return $this->_result(false, 'Not found!');
        }
        $result = $this->inputWarehouse->updateInputWarehouseByID($id, $data);
        if (!$result) {
            return $this->_result(false, 'Updated failed');
        }
        return $this->_result(true, 'Updated successfully');
    }

    public function destroyInputWarehousesByIDs($ids)
    {

        if (empty($ids)) {
            return $this->_result(false, 'not found id!');
        }
        $check = $this->inputWarehouse->destroyInputWarehouseByIDs($ids);
        if (!$check) {
            return $this->_result(false, 'Delete failed!');
        }

        foreach ($ids as $id) {
            $rsIDs = $this->inputWarehouseInfo->getInputWarehouseByIDs($id);
            if ($rsIDs->count() > 0) {
                $arrIDs = $rsIDs->pluck('id')->toArray();
                $this->inputWarehouseInfo->destroyInputWarehouseInfoByIDs($arrIDs);
            }
        }


        return $this->_result(true, 'Delete successfuly');
    }

}
