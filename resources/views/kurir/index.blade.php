@extends('master.layout')
@section('content')
<div class="panel-body">
    <a href="{{ url('admin/kurir/create') }}" class="btn btn-primary">Tambah Kurir</a><br><br>

            @if (session('message'))
                <div class="alert alert-success" role="alert">
                    {{ session('message') }}                        
                </div>
            @endif
        
    <table class="table table-bordered table-hover table-striped" id="kurir-table">
        <thead>
            <tr>
                <th>Nama Kurir</th>
                <th>Email Kurir</th>
                <th>Jenis Kelamin</th>
                <th>Alamat Kurir</th>
                <th>No Telp Kurir</th>
                <th>Plat Nomor</th>
                <th>OPSI</th>
            </tr>
        </thead>
        </table>
</div>


<script>
        $(function() {
            $('#kurir-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{!! url("admin/kurir/dt") !!}',
                columns: [
                    { data: 'name', name: 'name' },
                    { data: 'email', name: 'email' },
                    { data: 'gender', name: 'gender'},
                    { data: 'address', name: 'address'},
                    { data: 'telp', name: 'telp'},
                    { data: 'platNomor', name: 'platNomor'},
                    { data: 'aksi', name: 'aksi'},
                ]
            });
        });

</script>
@endsection