<?php

namespace App\Models;
use App\Helpers\CustomFunctions;
use Illuminate\Database\Eloquent\Model;

class OutputWarehouseInfo extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected  $table ='output_warehouses_infor';
    protected $fillable = [];
    protected $guarded  = [];
    public function outWareHouse()
    {
        return $this->belongsTo(OutputWarehouse::class, 'out_id', 'id');
    }
}
