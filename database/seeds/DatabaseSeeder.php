<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(SuplierSeeder::class);
        $this->call(BranchSeeder::class);
        $this->call(UnitSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(PermissionSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(ProductSeeder::class);
        $this->call(InputWarehouseSeeder::class);
        $this->call(OutputWarehouseSeeder::class);
        $this->call(ManagerTestSeeder::class);

    }
}
