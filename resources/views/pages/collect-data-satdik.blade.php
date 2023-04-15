@extends('layouts.app')

@section('title')
	Form Satuan Pendidikan
@endsection

@section('content')
  <!-- Section sekolah -->
  @component('components.title')
      @slot('title')
        Pengumpulan data satuan pendidikan
      @endslot
      <h6>
        Form Data satuan pendidikan
      </h6>
  @endcomponent
  
  <div class="dashboard-page-wrap mb-5">
    <div class="container">
      {{-- Template excel --}}
      <h5 class="title">
        Silahkan unduh dan lengkapi file berikut sesuai jenjang pendidikan
      </h5>
      <div class="mt-3">
        <div class="mb-3">
          <a href="{{ route('download-template-sekolah') }}" class="btn btn-warning" type="button">
            Template Sekolah
          </a>
        </div>
        <div>
          <a href="{{ route('download-template-pt') }}" class="btn btn-warning" type="button">
            Template Perguruan Tinggi
          </a>
        </div>
      </div>

      <hr class="border border-primary border-1 opacity-50">

      {{-- Form --}}
      <div class="mt-4">
        <h5 class="title">
          Form satuan pendidikan
        </h5>
        <div class="col-6 mt-3">
          <label for="selectJenjang" class="form-label">Jenjang pendidikan</label>
          <select class="form-select" name="jenjang" id="selectJenjang">
            <option selected>Pilih jenjang</option>
            <option value="sd">SD</option>
            <option value="smp">SMP</option>
            <option value="SMA">SMA</option>
          </select>
        </div>
        <div class="col-6 mt-3">
          <label for="selectWilayah" class="form-label">Wilayah</label>
          <select class="form-select" name="wilayah" id="selectJenjang">
            <option selected>Pilih Wilayah</option>
            <option value="dalam_negeri">Dalam Negeri</option>
            <option value="luar_negeri">Luar Negeri</option>
          </select>
        </div>
        <div class="col-6 mt-3">
          <label for="selectProvinsi" class="form-label">Provinsi</label>
          <select class="form-select" name="provinsi" id="selectProvinsi">
            <option selected>Pilih Provinsi</option>
            <option value="banten">Banten</option>
            <option value="jabar">Jawa Barat</option>
            <option value="jateng">Jawa Tengah</option>
          </select>
        </div>
        <div class="col-6 mt-3">
          <label for="selectKabupaten" class="form-label">Kabupaten/Kota</label>
          <select class="form-select" name="kabupaten" id="selectKabupaten">
            <option selected>Pilih Kabupaten</option>
            <option value="tangerang">Tangerang</option>
            <option value="lebak">Lebak</option>
            <option value="cilegon">Cilegon</option>
            <option value="bandung">Bandung</option>
            <option value="bekasi">Bekasi</option>
            <option value="bogor">Bogor</option>
            <option value="semarang">Semarang</option>
            <option value="batang">Batang</option>
            <option value="banyumas">Banyumas</option>
          </select>
        </div>
        <div class="col-6 mt-3">
          <label for="selectSatdik" class="form-label">Satuan Pendidikan</label>
          <select class="form-select" name="satdik" id="selectSatdik">
            <option selected>Pilih Satuan Pendidikan</option>
            <option value="20603040-sd_negeri_pajajaran">20603040 - sd negeri pajajaran</option>
            <option value="20603040-sd_negeri_pajajaran">20603040 - sd negeri pajajaran</option>
            <option value="20603040-sd_negeri_pajajaran">20603040 - sd negeri pajajaran</option>
          </select>
        </div>
        <div class="col-6 mt-3">
          <label for="npsn" class="form-label">NPSN</label>
          <input type="text" name="npsn" id="npsn" class="form-control" placeholder="">
        </div>
        <div class="col-6 mt-3">
          <label for="pic" class="form-label">Nama PIC</label>
          <input type="number" name="pic" id="pic" class="form-control" placeholder="">
        </div>
        <div class="col-6 mt-3">
          <label for="jabatan_pic" class="form-label">Jabatan PIC</label>
          <input type="text" name="jabatan_pic" id="jabatan_pic" class="form-control" placeholder="">
        </div>
        <div class="col-6 mt-3">
          <label for="no_wa" class="form-label">No WA</label>
          <input type="number" name="no_wa" id="no_wa" class="form-control" placeholder="">
        </div>
        <div class="col-6 mt-3">
          <label for="file" class="form-label">Upload File</label>
          <input type="file" name="file" id="file" class="form-control">
        </div>
        <div class="mt-3">
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </div>

    </div>
  </div>
  
  
      
@endsection