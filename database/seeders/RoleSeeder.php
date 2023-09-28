<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        DB::statement("SET FOREIGN_KEY_CHECKS=0");
        DB::table("roles")->truncate();
        DB::statement("SET FOREIGN_KEY_CHECKS=1");

        DB::table('roles')->insert([
            "name"          => "admin",
            "created_at"    => now(),
            "updated_at"    => now()
        ]);

        DB::table('roles')->insert([
            "name"          => "user",
            "created_at"    => now(),
            "updated_at"    => now()
        ]);
    }
}
