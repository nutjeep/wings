<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\RoleSeeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\ProductSeeder;
use Database\Seeders\ProductTypeSeeder;
use Database\Seeders\ProductUnitSeeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            // UserSeeder::class,
            // RoleSeeder::class,
            // ProductTypeSeeder::class,
            // ProductUnitSeeder::class,
            ProductSeeder::class
        ]);
    }
}
