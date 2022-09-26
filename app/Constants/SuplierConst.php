<?php namespace App\Constants;

class SuplierConst
{
    const STATUS_UNACTIVE = 0;
    const STATUS_ACTIVE = 1;

    const STATUS_NAME = [
        SuplierConst::STATUS_UNACTIVE => 'UnActive',
        SuplierConst::STATUS_ACTIVE => 'Active',
    ];
}
