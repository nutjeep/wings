<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductUnitSeeder extends Seeder
{
    public function run(): void
    {
        DB::statement("SET FOREIGN_KEY_CHECKS=0");
        DB::table("product_units")->truncate();
        DB::statement("SET FOREIGN_KEY_CHECKS=1");

        DB::table('product_units')->insert([
            "name"          => "Pcs",
            "created_at"    => now(),
            "updated_at"    => now()
        ]);

        DB::table('product_units')->insert([
            "name"          => "Item",
            "created_at"    => now(),
            "updated_at"    => now()
        ]);

        DB::table('product_units')->insert([
            "name"          => "Botol",
            "created_at"    => now(),
            "updated_at"    => now()
        ]);
    }
}
