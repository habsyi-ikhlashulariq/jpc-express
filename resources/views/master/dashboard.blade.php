@extends('master.layout')
@section('content')
<div class="panel-body">
    <div class="row">
    @if(Auth::user()->jabatan == 1)
        <div class="col-md-3">
            <div class="metric">
                <span class="icon"><i class="fa fa-user"></i></span>
                <p>
                    <span class="number">{{$customer}}</span>
                    <span class="title">Jumlah Customer</span>
                </p>
            </div>
        </div>
    
        <div class="col-md-3">
            <div class="metric">
                <span class="icon"><i class="fa fa-shopping-bag"></i></span>
                <p>
                    <span class="number">{{ $order }}</span>
                    <span class="title">Jumlah Orderan</span>
                </p>
            </div>
        </div>

    @else

    <div class="col-md-3">
        <div class="metric">
            <span class="icon"><i class="fa fa-map"></i></span>
            <p>
                <span class="number">10</span>
                <span class="title">Status Pengiriman</span>
            </p>
        </div>
    </div>

    @endif
    </div>
</div>

@endsection