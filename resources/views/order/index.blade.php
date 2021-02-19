@extends('master.layout')
@section('content')
<div class="panel-body">
    <a href="{{ url('order/create') }}" class="btn btn-primary">Tambah Order</a><br><br>

            @if (session('message'))
            <div class="alert alert-success" role="alert">
                {{ session('message') }}                        
            </div>
            @endif
        
    <table class="table table-bordered table-hover table-striped" id="order-table">
        <thead>
            <tr>
                <th>Tanggal Order</th>
                <th>Harga Per Kg</th>
                <th>Kuli</th>
                <th>Penerima</th>
                <th>Alamat Penerima</th>
                <th>No Telp Penerima</th>
                <th>Vendor</th>
                <th>Barang</th>
                <th>Metode Pembayaran</th>
                <th>Status Pengiriman</th>
                <th>Customer</th>
                <th>OPSI</th>
            </tr>
        </thead>
        </table>
</div>


<script>
        $(function() {
            $('#order-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{!! url("/order/dt") !!}',
                columns: [
                    { data: 'tanggal', name: 'tanggal' },
                    { data: 'hargaKg', name: 'hargaKg' },
                    { data: 'kuli', name: 'kuli'},
                    { data: 'penerima', name: 'penerima'},
                    { data: 'alamatPenerima', name: 'alamatPenerima'},
                    { data: 'noTelpPenerima', name: 'noTelpPenerima'},
                    { data: 'vendor', name: 'vendor'},
                    { data: 'berat', name: 'berat'},
                    { data: 'jenisPembayaran', name: 'jenisPembayaran'},
                    { data: 'platNomor', name: 'platNomor'},
                    { data: 'namaCustomer', name: 'namaCustomer'},
                    { data: 'aksi', name: 'aksi'},
                ]
            });
        });

</script>
@endsection