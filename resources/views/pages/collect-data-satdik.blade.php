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
  
  <div class="dashboard-page-wrap">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <h4 class="title">
            Silahkan unduh dan lengkapi file berikut sesuai jenjang pendidikan
          </h4>
        </div>
      </div>
    </div>
  </div>
  
  
      
@endsection