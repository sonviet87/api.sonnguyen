<?php

namespace App\Models;
use App\Helpers\CustomFunctions;
use Illuminate\Database\Eloquent\Model;

class OutputWarehouse extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected  $table ='output_warehouses';
    protected $fillable = [];
    protected $guarded  = [];

    public function outputWarehouseInfo(){
        return $this->hasMany(OutputWarehouseInfo::class, 'output_id');
    }

}
