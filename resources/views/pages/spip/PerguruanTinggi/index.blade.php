@extends('layouts.user')

@section('title')
    SPIP
@endsection

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div>
            <h1 class="h3 mb-0 text-gray-800">Data Peserta SPIP Perguruan Tinggi</h1>
        </div>
        <div>
            <a 
                href="" 
                class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                <i class="fas fa-download fa-sm text-white-50"></i> Unduh Data Populasi
            </a>
            <a 
                href="" 
                class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                <i class="fas fa-download fa-sm text-white-50"></i> Unduh Template Excel
            </a>
        </div>
    </div>

    {{-- Content row --}}
    <div class="row">
        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover scroll-horizontal-vertical w-100" id="crudTable">
                            <thead>
                                <tr>
                                    <th>Provinsi</th>
                                    <th>Kabupaten/Kota</th>
                                    <th>Perguruan Tinggi</th>
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
    
        var datatable = $('#crudTable').DataTable({
            ajax: {
                type: 'GET'
            },
            columns: [
                { data: 'provinsi' },
                { data: 'kabupaten' },
                { data: 'perguruan_tinggi' },
                { data: 'nama_narahubung' },
                { data: 'jabatan_narahubung' },
                { data: 'no_narahubung' },
                { 
                    data: 'download', 
                }
            ]
        })
    </script>
@endpush
