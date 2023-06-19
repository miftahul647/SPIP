<?php

namespace App\Exports;

use App\Models\ViewReportSekolah;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ReportSekolahExport implements FromCollection, WithHeadings
{
    public function headings(): array
    {
        return [
            'No',
            'Provinsi',
            'Kabupaten',
            'Jenjang',
            'NPSN',
            'Satuan Pendidikan',
            'Nama Narahubung',
            'Jabatan Narahubung',
            'Contact Narahubung',
            'document'
        ];
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return ViewReportSekolah::all();
    }
}
