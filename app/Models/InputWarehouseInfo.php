<?php

namespace App\Models;
use App\Helpers\CustomFunctions;
use Illuminate\Database\Eloquent\Model;

class InputWarehouseInfo extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected  $table ='input_warehouses_infor';
    protected $fillable = [];
    protected $guarded  = [];
    public function inputWareHouse()
    {
        return $this->belongsTo(InputWarehouse::class, 'input_id', 'id');
    }

}
