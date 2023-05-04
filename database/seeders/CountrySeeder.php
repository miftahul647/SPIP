<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('countries')->truncate();
        Schema::enableForeignKeyConstraints();

        $countries = [
            ['id' => '1', 'name' => 'Saudi Arabia', 'code' => 'SA'],
            ['id' => '2', 'name' => 'Malaysia', 'code' => 'MY'],
            ['id' => '3','name' => 'Myanmar', 'code' => 'MM'],
        ];

        DB::table('countries')->insert($countries);
    }
}
