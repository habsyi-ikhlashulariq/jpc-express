@extends('master.layout')
@section('content')
<div class="panel-body">
    <a href="{{ url('/admin/metode_pembayaran/create') }}" class="btn btn-primary">Tambah Metode Pembayaran</a><br><br>
        @if (session('message'))
            <div class="alert alert-success" role="alert">
                {{ session('message') }}                        
            </div>
        @endif
    <table class="table table-bordered table-hover table-striped" id="metode_pembayaran-table">
        <thead>
            <tr>
                <th>Jenis Pembayaran</th>
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
                ajax: '{!! url("admin/metode_pembayaran/dt") !!}',
                columns: [
                    { data: 'jenisPembayaran', name: 'jenisPembayaran' },
                    { data: 'aksi', name: 'aksi'},
                ]
            });
        });

</script>
@endsection