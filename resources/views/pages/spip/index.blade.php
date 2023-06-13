@extends('layouts.user')

@section('title')
    SPIP
@endsection

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div>
            <h1 class="h3 mb-0 text-gray-800">Data Peserta SPIP</h1>
        </div>
        <div>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                    class="fas fa-download fa-sm text-white-50"></i> Unduh Template Excel</a>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                    class="fas fa-download fa-sm text-white-50"></i> Unduh Template Excel</a>
        </div>
    </div>

    {{-- Content row --}}
    <div class="row">
        <div class="col-xl-12 col-md-12 col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover scroll-horizontal-vertical w-100" id="crudTable">
                            <thead>
                                <tr>
                                    <th>Provinsi</th>
                                    <th>Kabupaten/Kota</th>
                                    <th>Jenjang</th>
                                    <th>NPSN</th>
                                    <th>Satuan Pendidikan</th>
                                    <th>Nama Narahubung</th>
                                    <th>Jabatan Narahubung</th>
                                    <th>Kontak Narahubung</th>
                                    <th>File Excel</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('addon-script')
    <script>
        var dataSet = [
            [
                'DKI JAKARTA',
                'KOTA JAKARTA SELATAN',
                'SMA/SMK',
                '1800479',
                'SMKS PEMBANGUNAN KALIANDA',
                'JORKE',
                'KEPALA SEKOLAH',
                '085882650487',
                '1684457660_Template Data Populasi Sekolah test kedua.xlsx'
            ],
            [
                'KALIMANTAN TIMUR',
                'KOTA SAMARINDA',
                'SMA/SMK',
                '30401063',
                'SMAS KATOLIK W. R. SOEPRATMAN',
                'PRIMBA',
                'KEPALA SEKOLAH',
                '085882650487',
                '1684457660_Template Data Populasi Sekolah test kedua.xlsx'
            ],
            [
                'DKI JAKARTA',
                'KOTA JAKARTA SELATAN',
                'SMA/SMK',
                '1800479',
                'SMKS PEMBANGUNAN KALIANDA',
                'JORKE',
                'KEPALA SEKOLAH',
                '085882650487',
                '1684457660_Template Data Populasi Sekolah test kedua.xlsx'
            ],
            [
                'DKI JAKARTA',
                'KOTA JAKARTA SELATAN',
                'SMA/SMK',
                '1800479',
                'SMKS PEMBANGUNAN KALIANDA',
                'JORKE',
                'KEPALA SEKOLAH',
                '085882650487',
                '1684457660_Template Data Populasi Sekolah test kedua.xlsx'
            ],
            [
                'DKI JAKARTA',
                'KOTA JAKARTA SELATAN',
                'SMA/SMK',
                '1800479',
                'SMKS PEMBANGUNAN KALIANDA',
                'JORKE',
                'KEPALA SEKOLAH',
                '085882650487',
                '1684457660_Template Data Populasi Sekolah test kedua.xlsx'
            ],
            [
                'DKI JAKARTA',
                'KOTA JAKARTA SELATAN',
                'SMA/SMK',
                '1800479',
                'SMKS PEMBANGUNAN KALIANDA',
                'JORKE',
                'KEPALA SEKOLAH',
                '085882650487',
                '1684457660_Template Data Populasi Sekolah test kedua.xlsx'
            ],
        ]
        var datatable = $('#crudTable').DataTable({
            processing: true,
            serverSide: true,
            columns: [
                { data: 'provinsi', name: 'provinsi' },
                { data: 'kabupaten', name: 'kabupaten' },
                { data: 'jenjang', name: 'jenjang' },
                { data: 'NPSN', name: 'NPSN' },
                { data: 'satuan_pendidikan', name: 'satuan pendidikan' },
                { data: 'nama_pic', name: 'nama narahubung' },
                { data: 'jabatan_pic', name: 'jabatan narahubung' },
                { data: 'no_pic', name: 'kontak narahubung' },
                { data: 'document', name: 'file excel' }
            ]
        })
    </script>
@endpush
