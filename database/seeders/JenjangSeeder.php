<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class JenjangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('jenjangs')->truncate();
        Schema::enableForeignKeyConstraints();

        $jenjangs = [
            ['id' => '1', 'nama_jenjang' => 'SD'],
            ['id' => '2', 'nama_jenjang' => 'SMP'],
            ['id' => '3','nama_jenjang' => 'SMA/SMK'],
        ];

        DB::table('jenjangs')->insert($jenjangs);
    }
}
