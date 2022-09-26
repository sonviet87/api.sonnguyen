<?php

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Unit;
class OutputWarehouseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\OutputWarehouse::class,5)->create()->each(function ($outputWarehouse){
            $outputWarehouse->outputWarehouseInfo()->createMany(factory(\App\Models\OutputWarehouseInfo::class,random_int(1,4))->make()->toArray());
        });

    }
}
