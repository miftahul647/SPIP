@extends('layouts.app')

@section('title')
	Dashboard
@endsection

@section('content')
  <!-- Section sekolah -->
  @component('components.title')
      @slot('title')
        Implementasi PAK pada satuan pendidikan
      @endslot
      <h6>Implementasi PAK Pada Satuan Pendidikan</h6>
  @endcomponent

  <div class="dashboard-page-wrap">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="detail">
                    <h5 class="title">Implementasi PAK pada satuan pendidikan</h5>
                    {{-- Embed Tableau --}}
                    <div class="frame-responsive pb-5" style="height: auto;">
                        <div id="vizContainer"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>
  
      
@endsection

@push('addon-script')
    <script src="{{ asset('vendor/tableau/tableau-2.9.1.min.js') }}"></script>
    <script>
        var data = {!! json_encode($tableau_response) !!}
        var vizContainer = $("#vizContainer")
        console.log(data)

        Object.entries(data).forEach(([key, value]) => {
            var createEl = document.createElement("div")
            var url = value

            createEl.setAttribute("id", "vizIframe")
            vizContainer.append(createEl)
    
            new tableau.Viz(createEl, url)   
        });

    </script>
@endpush