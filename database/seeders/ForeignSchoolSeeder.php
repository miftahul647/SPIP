<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ForeignSchool;

class ForeignSchoolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $csvData = fopen(base_path('database/csv/sekolahluarnegri.csv'), 'r');
        $transRow = true;
        while (($data = fgetcsv($csvData, 555, ',')) !== false) {
            if (!$transRow) {
                ForeignSchool::create([
                    'id' => $data['0'],
                    'country_id' => $data['1'],
                    'nama_sekolah' => $data['2'],
                ]);
            }
            $transRow = false;
        }
        fclose($csvData);
    }
}
