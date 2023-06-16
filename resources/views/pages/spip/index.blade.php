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
                    class="fas fa-download fa-sm text-white-50"></i> Unduh Data Populasi</a>
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
                                    <th>Action</th>
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
            ajax: {
                type: 'GET'
            },
            columns: [
                { data: 'provinsi' },
                { data: 'kabupaten' },
                { data: 'jenjang' },
                { data: 'NPSN' },
                { data: 'satuan_pendidikan' },
                { data: 'nama_pic' },
                { data: 'jabatan_pic' },
                { data: 'no_pic' },
                { 
                    data: 'download', 
                }
            ]
        })
    </script>
@endpush
