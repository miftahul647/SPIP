@extends('layouts.app')

@section('title')
	Detail Sekolah
@endsection

@section('content')
    <!-- Section Detail -->
    <div class="container mt-5 detail-sekolah">
      <div class="sekolah informasi-box mb-4">
        <div class="row">   
              <div class="col-md-6">
                  <div class="nama-sekolah">
                      {{ $result['nama'] }}
                  </div>
                  <div class="kota-sekolah">
                      {{ $result['kota_kab'] }}, {{ $sliceProv }}
                  </div>
                  <div class="jalan-sekolah">
                      {{ $result['alamat'] }}
                  </div>
              </div>
              <div class="col-md-6">
                  <div class="akreditasi">
                      Akreditasi
                  </div>
                  <div class="nilai-akreditasi">
                      {{ $result['akreditasi'] }}
                  </div>
              </div>    
        </div>
      </div>

      <div class="infor-umum informasi-box mb-4">
        <div class="title">
            Informasi Umum
        </div>
        <div class="row">
          <div class="col">
              <div class="first mb-3 mt-3">
                  <div class="text-secondary"> Kepala Sekolah </div>
                  <div class="">{{ $result['kepsek'] }}</div>
              </div>
              <div class="secondary mb-3">
                  <div class="text-secondary"> Jumlah Guru & Tenaga Pendidikan </div>
                  <div class="">{{ $totalGuru }}</div>
              </div>
              <div class="third">
                  <div class="text-danger"> Rasio guru dan Murid </div>
                  <div class="">1 : {{ $rasio }}</div>
              </div>
              </div>
              <div class="col">
              <div class="first mb-3 mt-3">
                  <div class="text-secondary"> Nomor Pokok Sekolah Nasional </div>
                  <div class="">{{ $result['npsn'] }}</div>
              </div>
              <div class="secondary">
                  <div class="text-secondary"> Jumlah Murid </div>
                  <div class="">
                      {{ $jmlPd }}
                  </div>
              </div>
          </div>    
        </div>
      </div>

      <div class="info-guru informasi-box mb-4">
        <div class="title">Informasi Guru dan Tenaga Pendidikan</div>
        <div class="sub-title">
          Rekapitulasi Status Profesi Guru (Total: {{ $rekapProfesi }} orang)
        </div>
        <div class="rekap mt-5">
          @foreach ($teachers as $key => $value)
            <div class="row mb-5">
              <div class="col-2">{{ $key }} :</div>
              <div class="col-8">
                <div class="progress" style="height: 20px;">
                  <div
                    class="progress-bar progress-bar-striped bg-info progress-bar-animated"
                    role="progressbar"
                    aria-label="Animated striped example"
                    aria-valuenow="75"
                    aria-valuemin="0"
                    aria-valuemax="100"
                    style="width: {{ $value }}%"
                  ></div>
                </div>
              </div>
            </div>
          @endforeach
        </div>
      </div>

      <div class="info-fasilitas informasi-box mb-4">
        <div class="title">Informasi Fasilitas</div>
        <div class="list mt-4">
          <div class="row">
            @foreach ($facilities as $key => $value)
              <div class="col-lg-8 mb-4">
                {{ $key }}
              </div>
              <div class="col-lg-4 text-end">
                {{ $value }} Ruang
              </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
@endsection