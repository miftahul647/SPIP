@extends('layouts.user')

@section('title')
    SPIP Sekolah Luar Negri
@endsection

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div>
            <h1 class="h3 mb-0 text-gray-800">Data SPIP Sekolah Luar Negeri</h1>
        </div>
        <div>
            <a 
                href="{{ route('download-excel-ln') }}" 
                class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                <i class="fas fa-download fa-sm text-white-50"></i> Unduh Data Populasi
            </a>
            <a 
                href="{{ route('download-zip') }}" 
                class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                <i class="fas fa-download fa-sm text-white-50"></i> Unduh Template Excel
            </a>
        </div>
    </div>

    {{-- Content row --}}
    <div class="row" id="locations">
        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover stripe text-black" style="width: 100%" id="crudTable">
                            <thead>
                                <tr>
                                    <th>Negara</th>
                                    <th>Jenjang</th>
                                    <th>NPSN</th>
                                    <th>Satuan Pendidikan</th>
                                    <th>Nama Narahubung</th>
                                    <th>Jabatan Narahubung</th>
                                    <th>Kontak Narahubung</th>
                                    <th>Date</th>
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
    <script type="text/javascript" src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script>
    
        var datatable = $('#crudTable').DataTable({
            ajax: {
                type: 'GET'
            },
            columns: [
                { data: 'Negara' },
                { data: 'jenjang' },
                { data: 'NPSN' },
                { data: 'satuan_pendidikan' },
                { data: 'nama_pic' },
                { data: 'jabatan_pic' },
                { data: 'no_pic' },
                { data: 'update_time' },
                { 
                    data: 'download', 
                }
            ]
        })
    </script>
@endpush
