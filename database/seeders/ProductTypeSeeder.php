<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductTypeSeeder extends Seeder
{
    public function run(): void
    {
        DB::statement("SET FOREIGN_KEY_CHECKS=0");
        DB::table("product_types")->truncate();
        DB::statement("SET FOREIGN_KEY_CHECKS=1");

        DB::table('product_types')->insert([
            "name"          => "Makanan & Minuman",
            "created_at"    => now(),
            "updated_at"    => now()
        ]);

        DB::table('product_types')->insert([
            "name"          => "Peralatan Rumah Tangga",
            "created_at"    => now(),
            "updated_at"    => now()
        ]);

        DB::table('product_types')->insert([
            "name"          => "Elektronik",
            "created_at"    => now(),
            "updated_at"    => now()
        ]);
    }
}
