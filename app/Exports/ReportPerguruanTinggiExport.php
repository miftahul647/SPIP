<?php

namespace App\Exports;

use App\Models\ViewReportPerguruanTinggi;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ReportPerguruanTinggiExport implements FromCollection, WithHeadings
{
    public function headings(): array
    {
        return [
            'No',
            'provinsi',
            'kabupaten',
            'perguruan_tinggi',
            'nama_narahubung',
            'jabatan_narahubung',
            'no_narahubung',
            'document'
        ];
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return ViewReportPerguruanTinggi::all();
    }
}
