<?php

namespace App\Models;
use App\Helpers\CustomFunctions;
use Illuminate\Database\Eloquent\Model;

class InputWarehouse extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected  $table ='input_warehouses';
    protected $fillable = [];
    protected $guarded  = [];

    public function inputWarehouseInfo(){
        return $this->hasMany(InputWarehouseInfo::class, 'input_id');
    }

}
