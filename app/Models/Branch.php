<?php

namespace App\Models;
use App\Helpers\CustomFunctions;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'branches';
    protected $fillable = [];
    protected $guarded  = [];

}
