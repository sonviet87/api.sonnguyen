<?php

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Unit;
class InputWarehouseInforSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\InputWarehouseInfo::class,10)->create();

    }
}
