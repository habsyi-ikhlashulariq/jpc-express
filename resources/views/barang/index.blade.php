@extends('master.layout')
@section('content')
<div class="panel-body">
    <a href="{{ url('barang/create') }}" class="btn btn-primary">Tambah Barang</a><br><br>
        @if (session('message'))
            <div class="alert alert-success" role="alert">
                {{ session('message') }}                        
            </div>
        @endif
    <table class="table table-bordered table-hover table-striped" id="customer-table">
        <thead>
            <tr>
                <th>Berat Barang</th>
                <th>Panjang Barang</th>
                <th>Lebar Barang</th>
                <th>Tinggi Barang</th>
                <th>Berat Volume Barang</th>
                <th>OPSI</th>
            </tr>
        </thead>
        </table>
</div>


<script>
        $(function() {
            $('#customer-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{!! url("/barang/dt") !!}',
                columns: [
                    { data: 'berat', name: 'berat' },
                    { data: 'panjang', name: 'panjang' },
                    { data: 'lebar', name: 'lebar'},
                    { data: 'tinggi', name: 'tinggi'},
                    { data: 'beratVol', name: 'beratVol'},
                    { data: 'aksi', name: 'aksi'},
                ]
            });
        });

</script>
@endsection