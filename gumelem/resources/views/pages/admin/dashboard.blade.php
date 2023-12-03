@extends('layouts.admin')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Dashboard</h1>


    <div class="row">
        <div class="col-xl-3 col-md-6 my-4">
            <div class="card bg-secondary text-white align-items-center justify-content-center">
                <div class="card-body">Objek Wisata</div>
                <div class="card-body d-flex">
                    <div class="h5 mb-2 font-weight-bold text-white-800">{{ $objek_wisata }}</div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 my-4">
            <div class="card text-white align-items-center justify-content-center" style="background-color: gray">
                <div class="card-body">Merchandise</div>
                <div class="card-body d-flex">
                    <div class="h5 mb-2 font-weight-bold text-white-800">{{ $merchandise_order }}</div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 my-4">
            <div class="card bg-success text-white align-items-center justify-content-center" style="background-color: gray">
                <div class="card-body">Merchandise Order - Success</div>
                <div class="card-body d-flex">
                    <div class="h5 mb-2 font-weight-bold text-white-800">{{ $merchandise_success }}</div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 my-4">
            <div class="card bg-warning text-white align-items-center justify-content-center" style="background-color: gray">
                <div class="card-body">Merchandise Order - Pending</div>
                <div class="card-body d-flex">
                    <div class="h5 mb-2 font-weight-bold text-white-800">{{ $merchandise_pending }}</div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 my-4">
            <div class="card bg-danger text-white align-items-center justify-content-center" style="background-color: gray">
                <div class="card-body">Merchandise Order - Cancel</div>
                <div class="card-body d-flex">
                    <div class="h5 mb-2 font-weight-bold text-white-800">{{ $merchandise_cancel }}</div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 my-4">
            <div class="card bg-black text-white align-items-center justify-content-center" style="background-color: gray">
                <div class="card-body">Merchandise Order - Failed</div>
                <div class="card-body d-flex">
                    <div class="h5 mb-2 font-weight-bold text-white-800">{{ $merchandise_failed }}</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
