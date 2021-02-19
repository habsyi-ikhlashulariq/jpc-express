@extends('master.layout')
@section('content')
<div class="panel-body">
    <div class="row">
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
    </div>
</div>

@endsection