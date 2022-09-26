<?php

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Unit;
class InputWarehouseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\InputWarehouse::class,5)->create()->each(function ($inputWarehouse){
            $inputWarehouse->inputWarehouseInfo()->createMany(factory(\App\Models\InputWarehouseInfo::class,random_int(1,5))->make()->toArray());
        });

    }
}
