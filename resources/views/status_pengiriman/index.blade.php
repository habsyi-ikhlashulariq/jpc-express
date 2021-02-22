@extends('master.layout')
@section('content')
<div class="panel-body">
    <a href="{{ url('admin/status_pengiriman/create') }}" class="btn btn-primary">Tambah Status Pengiriman</a><br><br>
        @if (session('message'))
            <div class="alert alert-success" role="alert">
                {{ session('message') }}                        
            </div>
        @endif
    <table class="table table-bordered table-hover table-striped" id="metode_pembayaran-table">
        <thead>
            <tr>
                <th>Plat Nomor</th>
                <th>Nama Supir</th>
                <th>Keterangan</th>
                <th>Tanggal</th>
                <th>OPSI</th>
            </tr>
        </thead>
        </table>
</div>


<script>
        $(function() {
            $('#metode_pembayaran-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{!! url("admin/status_pengiriman/dt") !!}',
                columns: [
                    { data: 'platNomor', name: 'platNomor' },
                    { data: 'namaSupir', name: 'namaSupir' },
                    { data: 'keterangan', name: 'keterangan' },
                    { data: 'tanggal', name: 'tanggal' },
                    { data: 'aksi', name: 'aksi'},
                ]
            });
        });

</script>
@endsection