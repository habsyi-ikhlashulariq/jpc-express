@extends('master.layout')
@section('content')
<div class="panel-body">
    <a href="{{ url('destination/create') }}" class="btn btn-primary">Tambah Destinasi</a><br><br>

        <div class="alert alert-success" role="alert">
            @if (session('message'))
                {{ session('message') }}                        
            @endif
        </div>
        
    <table class="table table-bordered table-hover table-striped" id="destination-table">
        <thead>
            <tr>
                <th width="20%">Kota Asal</th>
                <th width="20%">Kota Tujuan</th>
                <th width="20%">Tarif</th>
                <th width="20%">Waktu</th>
                <th width="20%">OPSI</th>
            </tr>
        </thead>
        </table>
</div>


<script>
        $(function() {
            $('#destination-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{!! url("/destinasi/dt") !!}',
                columns: [
                    { data: 'kotaAsal', name: 'kotaAsal' },
                    { data: 'kotaTujuan', name: 'kotaTujuan' },
                    { data: 'tarif', name: 'tarif'},
                    { data: 'waktu', name: 'waktu'},
                    { data: 'aksi', name: 'aksi'},
                ]
            });
        });

</script>
@endsection