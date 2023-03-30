@extends('layouts.admin')

@section('title')
    Dashboard Anggaran Jardik
@endsection

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard Monitoring Anggaran Jardik</h1>
    </div>
    <div class="row">
        <div class="col-md-12 col-md-6">
            <div class="frame-responsive" style="height: 557vh;">
                {{-- <iframe 
                    id="idx_frame" 
                    src={{ $tableau_response }} 
                    scrolling="no" 
                    frameborder="0" 
                    allowfullscreen="true"
                    style="display: block; width: 1200px; height: 827px; visibility: visible; overflow: hidden;">
                </iframe> --}}
                <div id="vizContainer"></div>
            </div>
        </div>
    </div>
    
@endsection

@push('footer_js')
    <script src="{{ asset('vendor/tableau/tableau-2.9.1.min.js') }}"></script>
    <script>
        var data = {!! json_encode($tableau_response) !!}
        var vizContainer = $("#vizContainer")

        var createEl = document.createElement("div")
        createEl.setAttribute("id", "vizIframe")
        vizContainer.append(createEl)

        new tableau.Viz(createEl, data)
    </script>
@endpush