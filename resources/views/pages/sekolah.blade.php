@extends('layouts.app')

@section('title')
	Sekolah
@endsection

@section('content')
  <!-- Section sekolah -->
  @component('components.title')
      @slot('title')
        Kumpulan satuan pendidikan
      @endslot
      <h6>
        Informasi dan penyajian profile satuan pendidikan
      </h6>
  @endcomponent

  <div class="container mt-5">
    <div class="sekolah border border-dark-subtle px-5">
      <div class="row">
        <div class="col-lg-12 mb-3">
          <h3 class="text-center">Cari Sekolah</h3>
        </div>
      </div>
      <form action="{{ route('search-sekolah') }}" method="GET">
        <div class="row">
          <div class="col-sm-4">
            <div class="form-group">
              <label class="form-label" for="kota">Kota</label>
              <input type="text" name="kota" id="kota" class="form-control" />
            </div>
          </div>
          <div class="col-sm-4">
            <div class="form-group">
              <label class="form-label" for="namaSekolah">Nama Sekolah</label>
              <input type="text" name="nama_sekolah" id="namaSekolah" class="form-control" />
            </div>
          </div>
          <div class="col-sm-4">
            <div class="form-group">
              <label class="form-label" for="jenjang">Jenjang</label>
              <select class="form-select" name="jenjang_id">
                @foreach ($stages as $key => $data)
                  <option value={{ $data['id'] }}> {{ $data['nama_jenjang'] }} </option>
                @endforeach
              </select>
            </div>
          </div>
        </div>
        <div class="row justify-content-end">
          <div class="col-sm-4 mt-4">
            <div class="form-group d-grid">
              <button class="btn btn-primary" type="submit">Tampilkan</button>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>

  <div class="container mt-5 mb-5">
    <div class="sekolah border border-dark-subtle p-5">
      <div class="row">
        <table class="table table-bordered">
          <thead>
            <th>Sekolah</th>
            <th>Kota</th>
            <th>Prov</th>
            <th>Action</th>
          </thead>
          <tbody>
            @foreach ($data10 as $key => $data)
              <tr>
                <td>{{ $data['nama'] }}</td>
                <td>{{ $data['kota_kab'] }}</td>
                <td>{{ $data['provinsi'] }}</td>
                <td>
                  <a href="{{ route('detail-sekolah', $data['npsn']) }}">
                    Detail
                  </a>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
        {{-- @foreach ($data10 as $key => $data)
          <div class="col-md-4 mb-3">
            <div class="card" style="height: 100%">
              <a href="{{ route('detail-sekolah', $data['npsn']) }}">
                @if ($data['is_pak'])
                  <img src="{{ asset('images/pendidikan-ispak.png') }}" alt="" style="position: absolute;">                  
                @endif
                <img src="{{ asset('images/solid-red.jpg') }}" class="card-img-top" alt="image">
                <div class="card-body">
                  <h5 class="card-title">{{ $data['nama'] }}</h5>
                  <P class="card-text">{{ $data['kota_kab'] }}</P>
                  <p class="card-text">{{ $data['provinsi'] }}</p>
                </div>
              </a>
            </div>
          </div>
        @endforeach --}}
      </div>
    </div>
  </div>
  
      
@endsection