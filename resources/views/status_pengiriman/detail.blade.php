@extends('master.layout')
@section('content')
<div class="panel-body">
    <h3>No Resi : {{$penjualan_id}}</h3>
    <table class="table table-bordered table-hover table-striped" id="metode_pembayaran-table">
        <thead>
            <tr>
                <th>Plat Nomor</th>
                <th>Nama Supir</th>
                <th>Keterangan</th>
                <th>Tanggal</th>
                <th>Status</th>
                <th>OPSI</th>
            </tr>
        </thead>
        <tbody>
            @foreach($status_pengiriman as $data)
            <tr>
                <td>{{$data->platNomor}}</td>
                <td>{{$data->namaSupir}}</td>
                <td>{{$data->keterangan}}</td>
                <td>{{$data->tanggal}}</td>
                <td>
                    @if($data->status == 0)
                        <p class="text-sm text-green-700 underline">Done</p>
                    @else if($data->status == 1)
                        <p class="text-sm text-yeelow-700 underline">Pending</p>
                    @endif
                </td>
                <td>
                    <a href="{{url('status_pengiriman/edit/'.$data->id)}}" class="btn btn-sm btn-warning" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-pencil"></i>Edit</a>
                    <a href="{{url('status_pengiriman/destroy/'.$data->id)}}" class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-close"></i>Delete</a>
                </td>
            </tr>
            @endforeach
        </tbody>
        </table>
</div>
@endsection