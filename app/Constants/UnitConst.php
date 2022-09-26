<?php namespace App\Constants;

class UnitConst
{
    const STATUS_UNACTIVE = 0;
    const STATUS_ACTIVE = 1;

    const STATUS_NAME = [
        UnitConst::STATUS_UNACTIVE => 'UnActive',
        UnitConst::STATUS_ACTIVE => 'Active',
    ];
}
