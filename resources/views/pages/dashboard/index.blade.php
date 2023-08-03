@extends('layout.body')

@section('title')
    <title>Dashboard - Analytics | Target Media Nusantara</title>
@endsection

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">Dashboard</h4>
    {{-- <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">List Karyawan </span> List Karyawan</h4> --}}



    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-12 mb-4 order-0">
                <div class="card">
                <div class="d-flex align-items-end row">
                        <div class="card-body">
                            <canvas id="myChart" ></canvas>
                        </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- / Content -->
@endsection

@section('script')
    @vite('resources/js/pages/dashboard.js')
@endsection
