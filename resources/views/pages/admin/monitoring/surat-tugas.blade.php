@extends('layouts.admin')

@section('title')
    Dashboard Surat Tugas
@endsection

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard Surat Tugas</h1>
    </div>
    <div class="row">
        <div class="col-xl-12 col-md-6">
            <div class="frame-responsive">
                <iframe id="idx_frame" src={{ $tableau_response }} scrolling="no" frameborder="0" style="height: 100%; overflow: hidden;">
                </iframe>
            </div>
        </div>
    </div>
@endsection
