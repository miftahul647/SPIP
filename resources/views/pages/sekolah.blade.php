@extends('layouts.app')

@section('title')
	Sekolah
@endsection

@section('content')
  <!-- Section sekolah -->
  <div class="container mt-5">
    <div class="sekolah px-5">
      <div class="row">
        <div class="col-lg-12 mb-3">
          <h3 class="text-center">Cari Sekolah</h3>
        </div>
      </div>
      <form action="#">
        <div class="row">
          <div class="col-sm-4">
            <div class="form-group">
              <label class="form-label" for="jenjang">Jenjang</label>
              <input type="text" name="jenjang" id="jenjang" class="form-control" />
            </div>
          </div>
          <div class="col-sm-4">
            <div class="form-group">
              <label class="form-label" for="kota">Kota</label>
              <input type="text" name="kota" id="kota" class="form-control" />
            </div>
          </div>
          <div class="col-sm-4">
            <div class="form-group">
              <label class="form-label" for="namaSekolah">Nama Sekolah</label>
              <input type="text" name="nama" id="namaSekolah" class="form-control" />
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
    <div class="sekolah p-5">
      <div class="row">
        <div class="col-md-4   mb-3">
          <div class="card">
            <img src="images/solid-red.jpg" class="card-img-top" alt="image">
            <div class="card-body">
              <h5 class="card-title">SD NEGERI 04</h5>
              <P class="card-text">Kota Tangerang Selatan</P>
              <p class="card-text">Banten</p>
            </div>
          </div>
        </div>
        <div class="col-md-4 mb-3">
          <div class="card">
            <img src="images/solid-red.jpg" class="card-img-top" alt="image">
            <div class="card-body">
              <h5 class="card-title">SD NEGERI 04</h5>
              <P class="card-text">Kota Tangerang Selatan</P>
              <p class="card-text">Banten</p>
            </div>
          </div>
        </div>
        <div class="col-md-4 mb-3">
          <div class="card">
            <img src="images/solid-red.jpg" class="card-img-top" alt="image">
            <div class="card-body">
              <h5 class="card-title">SD NEGERI 04</h5>
              <P class="card-text">Kota Tangerang Selatan</P>
              <p class="card-text">Banten</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
      
@endsection