<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MasterCollege;

class CollegeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $csvData = fopen(base_path('database/csv/seeder_perguruan_tinggi.csv'), 'r');
        $transRow = true;
        while (($data = fgetcsv($csvData, 555, ',')) !== false) {
            if (!$transRow) {
                MasterCollege::create([
                    'id' => $data['0'],
                    'nama_perguruan' => $data['1'],
                    'regency_id' => $data['2'],
                ]);
            }
            $transRow = false;
        }
        fclose($csvData);
    }
}
