@extends('master.layout')
@section('content')
<div class="panel-body">
    <h3>No Resi : {{$penjualan_id}}</h3>
    <table class="table table-bordered table-hover table-striped" id="metode_pembayaran-table">
        <thead>
            <tr>
                <th>No Resi</th>
                <th>Nama Kurir</th>
                <th>Tanggal</th>
                <th>Keterangan</th>
                <th>Status</th>
                <th>OPSI</th>
            </tr>
        </thead>
        <tbody>
            @foreach($status_pengiriman as $data)
            <tr>
                <td>{{$data->penjualan_id}}</td>
                <td>{{$data->name}}</td>
                <td>{{$data->tanggal}}</td>
                <td>{{$data->keterangan}}</td>
                <td>
                    @if($data->status == 0)
                        <p class="text-sm text-green-700 underline">In Process</p>
                    @else
                        <p class="text-sm text-yeelow-700 underline">Done</p>
                    @endif
                </td>
                <td>
                    <a href="{{url('admin/status_pengiriman/edit/'.$data->id)}}" class="btn btn-sm btn-warning" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-pencil"></i>Edit</a>
                    <a href="{{url('admin/status_pengiriman/destroy/'.$data->id)}}" class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-close"></i>Delete</a>
                </td>
            </tr>
            @endforeach
        </tbody>
        </table>
</div>
@endsection