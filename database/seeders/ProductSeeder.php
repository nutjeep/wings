<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        DB::statement("SET FOREIGN_KEY_CHECKS=0");
        DB::table("products")->truncate();
        DB::statement("SET FOREIGN_KEY_CHECKS=1");

        DB::table('products')->insert([
            "product_code"      => "001",
            "product_name"      => "Lee Mineral",
            "image"             => "",
            "currency"          => "IDR",
            "price"             => "5000",
            "discount"          => "",
            "discount_price"    => "",
            "dimension"         => "10cm x 5cm",
            "product_unit_id"   => "3",
            "product_type_id"   => "1",
            "created_at"        => now(),
            "updated_at"        => now()
        ]);

        DB::table('products')->insert([
            "product_code"      => "002",
            "product_name"      => "Teh Sosro",
            "image"             => "",
            "currency"          => "IDR",
            "price"             => "10000",
            "discount"          => "10",
            "discount_price"    => "9000",
            "dimension"         => "10cm x 10cm",
            "product_unit_id"   => "3",
            "product_type_id"   => "1",
            "created_at"        => now(),
            "updated_at"        => now()
        ]);

        DB::table('products')->insert([
            "product_code"      => "003",
            "product_name"      => "Kopi Kenangan",
            "image"             => "",
            "currency"          => "IDR",
            "price"             => "20000",
            "discount"          => "50",
            "discount_price"    => "10000",
            "dimension"         => "10cm x 10cm",
            "product_unit_id"   => "3",
            "product_type_id"   => "1",
            "created_at"        => now(),
            "updated_at"        => now()
        ]);

        DB::table('products')->insert([
            "product_code"      => "004",
            "product_name"      => "Momogi",
            "image"             => "",
            "currency"          => "IDR",
            "price"             => "12000",
            "discount"          => "",
            "discount_price"    => "",
            "dimension"         => "10cm x 10cm",
            "product_unit_id"   => "1",
            "product_type_id"   => "1",
            "created_at"        => now(),
            "updated_at"        => now()
        ]);

        DB::table('products')->insert([
            "product_code"      => "005",
            "product_name"      => "Mie Lidi",
            "image"             => "",
            "currency"          => "IDR",
            "price"             => "2000",
            "discount"          => "",
            "discount_price"    => "",
            "dimension"         => "10cm x 10cm",
            "product_unit_id"   => "1",
            "product_type_id"   => "1",
            "created_at"        => now(),
            "updated_at"        => now()
        ]);

        DB::table('products')->insert([
            "product_code"      => "006",
            "product_name"      => "Sapu Lantai",
            "image"             => "",
            "currency"          => "IDR",
            "price"             => "15000",
            "discount"          => "10",
            "discount_price"    => "13500",
            "dimension"         => "10cm x 30cm",
            "product_unit_id"   => "2",
            "product_type_id"   => "2",
            "created_at"        => now(),
            "updated_at"        => now()
        ]);

        DB::table('products')->insert([
            "product_code"      => "007",
            "product_name"      => "Cikrak",
            "image"             => "",
            "currency"          => "IDR",
            "price"             => "20000",
            "discount"          => "",
            "discount_price"    => "",
            "dimension"         => "10cm x 30cm",
            "product_unit_id"   => "2",
            "product_type_id"   => "2",
            "created_at"        => now(),
            "updated_at"        => now()
        ]);

        DB::table('products')->insert([
            "product_code"      => "008",
            "product_name"      => "Charger",
            "image"             => "",
            "currency"          => "IDR",
            "price"             => "100000",
            "discount"          => "30",
            "discount_price"    => "70000",
            "dimension"         => "10cm x 10cm",
            "product_unit_id"   => "2",
            "product_type_id"   => "3",
            "created_at"        => now(),
            "updated_at"        => now()
        ]);

        DB::table('products')->insert([
            "product_code"      => "009",
            "product_name"      => "Kabel",
            "image"             => "",
            "currency"          => "IDR",
            "price"             => "9000",
            "discount"          => "",
            "discount_price"    => "",
            "dimension"         => "1m",
            "product_unit_id"   => "2",
            "product_type_id"   => "3",
            "created_at"        => now(),
            "updated_at"        => now()
        ]);

        DB::table('products')->insert([
            "product_code"      => "010",
            "product_name"      => "MCB",
            "image"             => "",
            "currency"          => "IDR",
            "price"             => "200000",
            "discount"          => "",
            "discount_price"    => "",
            "dimension"         => "30cm x 25cm",
            "product_unit_id"   => "2",
            "product_type_id"   => "3",
            "created_at"        => now(),
            "updated_at"        => now()
        ]);
    }
}
