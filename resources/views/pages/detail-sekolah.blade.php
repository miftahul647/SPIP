@extends('layouts.app')

@section('title')
	Detail Sekolah
@endsection

@section('content')
    <!-- Section Detail -->
    <div class="container mt-5 detail-sekolah">
        <div class="informasi-sekolah mb-4">
          <div class="row">
                @foreach ($result as $key => $data)
                    <div class="col-md-6">
                        <div class="nama-sekolah">
                            {{ $data['nama'] }}
                        </div>
                        <div class="kota-sekolah">
                            {{ $data['kota_kab'] }}, {{ $data['provinsi'] }}
                        </div>
                        <div class="jalan-sekolah">
                            {{ $data['alamat'] }}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="akreditasi">
                            Akreditasi
                        </div>
                        <div class="nilai-akreditasi">
                            {{ $data['akreditasi'] }}
                        </div>
                    </div>
                @endforeach
          </div>
        </div>
        <div class="informasi-umum">
          <div class="title">
              Informasi Umum
          </div>
          <div class="row">
            @foreach ($result as $key => $data)
                <div class="col">
                <div class="first mb-3 mt-3">
                    <div class="text-secondary"> Kepala Sekolah </div>
                    <div class="">{{ $data['kepsek'] }}</div>
                </div>
                <div class="secondary mb-3">
                    <div class="text-secondary"> Jumlah Guru & Tenaga Pendidikan </div>
                    <div class="">85</div>
                </div>
                <div class="third">
                    <div class="text-danger"> Rasio guru dan Murid </div>
                    <div class="">1 : 14</div>
                </div>
                </div>
                <div class="col">
                <div class="first mb-3 mt-3">
                    <div class="text-secondary"> Nomor Pokok Sekolah Nasional </div>
                    <div class="">{{ $data['npsn'] }}</div>
                </div>
                <div class="secondary">
                    <div class="text-secondary"> Jumlah Murid </div>
                    <div class="">
                       {{ $jmlPd }}
                    </div>
                </div>
                </div>    
            @endforeach
          </div>
        </div>
    </div>
@endsection