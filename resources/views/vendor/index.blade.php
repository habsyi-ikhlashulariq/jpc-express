@extends('master.layout')
@section('content')
<div class="panel-body">
    <a href="{{ url('vendor/create') }}" class="btn btn-primary">Tambah Vendor</a><br><br>
        @if (session('message'))
            <div class="alert alert-success" role="alert">
                {{ session('message') }}                        
            </div>
        @endif
    <table class="table table-bordered table-hover table-striped" id="vendor-table">
        <thead>
            <tr>
                <th>Vendor</th>
                <th>OPSI</th>
            </tr>
        </thead>
        </table>
</div>


<script>
        $(function() {
            $('#vendor-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{!! url("/vendor/dt") !!}',
                columns: [
                    { data: 'vendor', name: 'vendor' },
                    { data: 'aksi', name: 'aksi'},
                ]
            });
        });

</script>
@endsection