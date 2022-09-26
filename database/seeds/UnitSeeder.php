<?php

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Unit;
class UnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Unit::insert([
            'name' => 'Kg',
        ]);
        Unit::insert([
            'name' => 'Cái',
        ]);

    }
}
