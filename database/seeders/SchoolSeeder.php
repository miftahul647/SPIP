<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\models\School;

class SchoolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        School::truncate();
        $csvData = fopen(base_path('database/csv/database.csv'), 'r');
        $transRow = true;
        while (($data = fgetcsv($csvData, 555, ',')) !== false) {
            if (!$transRow) {
                School::create([
                    'id' => $data['0'],
                    'regency_id' => $data['1'],
                    'nama_sekolah' => $data['2'],
                ]);
            }
            $transRow = false;
        }
        fclose($csvData);
    }
}
