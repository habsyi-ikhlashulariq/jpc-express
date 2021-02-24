@extends('master.layout')
@section('content')
<div class="panel-body">
        <h3>Status Pengiriman</h3><br>
        @if (session('message'))
            <div class="alert alert-success" role="alert">
                {{ session('message') }}                        
            </div>
        @endif
    <table class="table table-bordered table-hover table-striped" id="status_pembayaran-table">
        <thead>
            <tr>
                <th>No. Resi</th>
                <th>Keterangan</th>
                <th>Status</th>
                <th>OPSI</th>
            </tr>
        </thead>
        </table>
</div>


<script>
        $(function() {
            $('#status_pembayaran-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{!! url("kurir/status_pengiriman/dt") !!}',
                columns: [
                    { data: 'penjualan_id', name: 'penjualan_id' },
                    { data: 'keterangan', name: 'keterangan' },
                    { data: 'status', name: 'status' },
                    { data: 'aksi', name: 'aksi'},
                ]
            });
        });

</script>
@endsection