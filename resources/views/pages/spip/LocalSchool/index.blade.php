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
            <a 
                href="{{ route('download-excel') }}" 
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
                    <div class="row mb-5">
                        <div class="col-md-3">
                            <label>Provinsi</label>
                            <select id="filter-provinsi" class="form-control filter">
                                <option value="" selected>-- Pilih Provinsi --</option>
                                <option v-for="province in provinces" :value="province.name">@{{ province.name }}</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label>Jenjang</label>
                            <select id="filter-jenjang" class="form-control filter">
                                <option value="" selected>-- Pilih Jenjang --</option>
                                <option value="sd">SD</option>
                                <option value="smp">SMP</option>
                                <option value="sma/smk">SMA/SMK</option>
                            </select>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover stripe text-black" style="width: 10%" id="crudTable">
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
    <script src="{{ asset('vendor/vue/vue.js') }}"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script>
        var locations = new Vue({
            el: "#locations",
            mounted() {
                this.getProvinces();
            },
            data: {
                provinces: null
            },
            methods: {
                getProvinces() {
                    var self = this;
                    axios.get('{{ route('api-provinces')}}')
                    .then(function (response) {
                        self.provinces = response.data;
                    })
                }
            }
        })
    </script>
    <script>

        var datatable = $('#crudTable').DataTable({
            "processing": true,
            "serverSide": true,
            "pageLength": 10,
            "autoWidth": false,
            "ajax": {
                url: "{{url('')}}/admin-spip/data/{{$jenjang}}",
                type: "POST",
                data: function (d) {
                    d._token = $("input[name=_token]").val();
                    d.filterProvinsi = $('#filter-provinsi').val();
                    d.filterJenjang = $('#filter-jenjang').val();
                    return d
                }
            },
            columns: [
                {
                    "targets": 0,
                    "render": function(data, type, row, meta){
                        return row.provinsi;
                    }
                },
                {
                    "targets": 1,
                    "render": function(data, type, row, meta){
                        return row.kabupaten;
                    }
                },
                {
                    "targets": 2,
                    "render": function(data, type, row, meta){
                        return row.jenjang;
                    }
                },
                {
                    "targets": 3,
                    "render": function(data, type, row, meta){
                        return row.NPSN;
                    }
                },
                {
                    "targets": 4,
                    "render": function(data, type, row, meta){
                        return row.satuan_pendidikan;
                    }
                },
                {
                    "targets": 5,
                    "render": function(data, type, row, meta){
                        return row.nama_pic;
                    }
                },
                {
                    "targets": 6,
                    "render": function(data, type, row, meta){
                        return row.jabatan_pic;
                    }
                },
                {
                    "targets": 7,
                    "render": function(data, type, row, meta){
                        return row.no_pic;
                    }
                },
                {
                    "targets": 8,
                    "class":"text-nowrap",
                    "render": function(data, type, row, meta){
                        return row.update_time;
                    }
                },
                {
                    "targets": 9,
                    "class":"text-nowrap",
                    "sortable": false,
                    "render": function(data, type, row, meta){
                        let tampilan = `<div class="btn-group">
                        <div class="dropdown">
                            <button class="btn btn-primary dropdown-toggle mr-1 mb-1" 
                                type="button" id="action"
                                    data-toggle="dropdown" 
                                    aria-haspopup="true"
                                    aria-expanded="false">
                                    Aksi
                            </button>
                            <div class="dropdown-menu" aria-labelledby="action">
                                <a class="dropdown-item" href="{{url('')}}/admin-spip/data-spip/documentExcel/download/${row.id}">
                                    Download
                                </a>
                            </div>
                        </div>
                    </div>`
                        return tampilan;
                    }
                },
                
            ],
        })

        $('#filter-jenjang').change(function(){
            let jenjang = $("#filter-jenjang").val()
            datatable.draw()
        })
        $('#filter-provinsi').change(function(){
            let provinsi = $("#filter-provinsi").val()
            datatable.draw()
        })
    </script>
    
@endpush
