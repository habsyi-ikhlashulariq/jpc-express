@extends('master.layout')
@section('content')
<div class="panel-body">
    <h3>No Resi : {{$penjualan_id}}</h3>
    <table class="table table-bordered table-hover table-striped" id="metode_pembayaran-table">
        <thead>
            <tr>
                <th>No Resi</th>
                <th>Tanggal</th>
                <th>Penerima</th>
                <th>Alamat Penerima</th>
                <th>Nomor Telephon Penerima</th>
                <th>Customer</th>
                <th>OPSI</th>
            </tr>
        </thead>
        <tbody>
            @foreach($penjualan as $data)
            <tr>
                <td>{{$data->noResi}}</td>
                <td>{{$data->tanggal}}</td>
                <td>{{$data->penerima}}</td>
                <td>{{$data->alamatPenerima}}</td>
                <td>{{$data->noTelpPenerima}}</td>
                <td>{{$data->namaCustomer}}</td>
                <td>
                    <a href="{{url('admin/order/edit/'.$data->noResi)}}" class="btn btn-sm btn-warning" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-pencil"></i>Edit</a>
                    <a href="{{url('admin/order/destroy/'.$data->noResi)}}" class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-close"></i>Delete</a>
                </td>
            </tr>
            @endforeach
        </tbody>
        </table>
</div>
@endsection