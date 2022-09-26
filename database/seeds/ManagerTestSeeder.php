<?php

use Illuminate\Database\Seeder;
use App\Models\Product;
class ManagerTestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\Manager::class,100)->create();

    }
}
