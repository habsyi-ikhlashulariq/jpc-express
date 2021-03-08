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
                <th width="15%">Nama Kurir</th>
                <th width="10%">Email Kurir</th>
                <th width="10%">Jenis Kelamin</th>
                <th width="20%">Alamat Kurir</th>
                <th width="10%">No Telp Kurir</th>
                <th width="10%">Plat Nomor</th>
                <th width="25%">OPSI</th>
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