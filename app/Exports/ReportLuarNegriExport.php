<?php

namespace App\Exports;

use App\Models\ViewReportInternationalSchool;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ReportLuarNegriExport implements FromCollection, WithHeadings
{
    public function headings(): array
    {
        return [
            'No',
            'Negara',
            'jenjang',
            'NPSN',
            'satuan_pendidikan',
            'nama_pic',
            'jabatan_pic',
            'no_pic',
            'document',
            'update_time'
        ];
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return ViewReportInternationalSchool::all();
    }
}
