<?php

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Unit;
class SuplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\Suplier::class,5)->create();

    }
}
