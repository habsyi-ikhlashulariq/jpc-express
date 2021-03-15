@extends('master.layout')
@section('content')
<div class="panel-body">
    <a href="{{ url('admin/order/create') }}" class="btn btn-primary">Tambah Order</a><br><br>

            @if (session('message'))
            <div class="alert alert-success" role="alert">
                {{ session('message') }}                        
            </div>
            @endif
        
    <table class="table table-bordered table-hover table-striped" id="order-table">
        <thead>
            <tr>
                <th>Nomor Resi</th>
                <th>Tanggal Order</th>
                <th>Harga Per Kg</th>
                <th>Penerima</th>
                <th>Alamat Penerima</th>
                <th>No Telp Penerima</th>
                <!-- <th>Vendor</th> -->
                <th>Metode Pembayaran</th>
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
                ajax: '{!! url("admin/order/dt") !!}',
                columns: [
                    { data: 'noResi', name: 'noResi' },
                    { data: 'tanggal', name: 'tanggal' },
                    { data: 'hargaKg', name: 'hargaKg' },
                    { data: 'penerima', name: 'penerima'},
                    { data: 'alamatPenerima', name: 'alamatPenerima'},
                    { data: 'noTelpPenerima', name: 'noTelpPenerima'},
                    // { data: 'berat', name: 'berat'},
                    // { data: 'vendor', name: 'vendor'},
                    { data: 'jenisPembayaran', name: 'jenisPembayaran'},
                    { data: 'namaCustomer', name: 'namaCustomer'},
                    { data: 'aksi', name: 'aksi'},
                ]
            });
        });

</script>
@endsection