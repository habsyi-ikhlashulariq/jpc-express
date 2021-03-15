@extends('master.layout')
@section('content')
<div class="panel-body">
    <h3>No Resi : {{$penjualan_id}}</h3>
    <table class="table table-bordered table-hover table-striped" id="metode_pembayaran-table">
        <thead>
            <tr>
                <th>Tanggal</th>
                <th>Kota Asal</th>
                <th>Kota Tujuan</th>
                <th>Harga /KG</th>
                <th>Koli</th>
                <th>Penerima</th>
                <th>Alamat Penerima</th>
                <th>No Telp Penerima</th>
                <th>Nama Customer</th>
                <th>Alamat Customer</th>
                <th>Nama Vendor</th>
                <th>Jenis Pembayaran</th>
                <th>Berat Volume Barang</th>
                <th>Total Harga</th>
                <th>OPSI</th>
            </tr>
        </thead>
        <tbody>
            @foreach($penjualan as $data)
            <tr>
                <td>{{$data->tanggal}}</td>
                <td>{{$data->kotaAsal}}</td>
                <td>{{$data->kotaTujuan}}</td>
                <td>{{$data->hargaKg}}</td>
                <td>{{$data->kuli}}</td>
                <td>{{$data->penerima}}</td>
                <td>{{$data->alamatPenerima}}</td>
                <td>{{$data->noTelpPenerima}}</td>
                <td>{{$data->namaCustomer}}</td>
                <td>{{$data->alamatCustomer}}</td>
                <td>{{$data->vendor}}</td>
                <td>{{$data->jenisPembayaran}}</td>
                <td>{{$data->beratVol}}</td>
                <td>{{$data->total_harga}}</td>
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