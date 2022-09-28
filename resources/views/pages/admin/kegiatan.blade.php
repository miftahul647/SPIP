@extends('layouts.admin')

@section('title')
    Kegiatan Internal
@endsection

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Kegiatan Internal Jardik</h1>
    </div>

    <!-- Content Row -->
    <div class="row">

        <div class="col-xl-12 col-md-12 col-sm-12">
            <div class="frame-responsive" style="padding-bottom:56.25%; position:relative; display:block; width: 100%">
                <iframe
                    width="100%" 
                    height="100%"
                    id="idx_frame"
                    src="https://www.appsheet.com/start/1fdcfcc4-efd8-47eb-aaf6-bf0b0a5ee84c" 
                    frameborder="0"
                    style="position:absolute; top:0; left: 0"
                    >
                </iframe>
            </div>
        </div>

    </div>
@endsection
