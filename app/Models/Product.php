<?php

namespace App\Models;
use App\Helpers\CustomFunctions;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [];
    protected $guarded  = [];

    public function setImageUrlAttribute($value)
    {
        $this->attributes['image_url'] =   CustomFunctions::filterPathUrl($value);
    }

    public function getImageUrlAttribute($value){
        $hostName='';
        if($value!='')  $hostName = env('APP_URL');
        return $hostName.$value;
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
