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
                <th>No. Resi</th>
                <th>OPSI</th>
            </tr>
        </thead>
        </table>
</div>


<script>
        $(function() {
            var table = $('#metode_pembayaran-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{!! url("admin/status_pengiriman/dt") !!}',
                columns: [
                    { data: 'penjualan_id', name: 'penjualan_id' },
                    { data: 'aksi', name: 'aksi'},
                ]
            });

            $('#metode_pembayaran-table').on('click', 'tr td .delete', function () {
            var row = $(this).parents('tr')[0];
            var mydata = (table.row(row).data());
            var con=confirm("Apakah Ingin Menghapus Data "+ mydata["penjualan_id"])
                if(con == true){
                    var id = mydata["id"];

                    $.ajax({
                        url:"{{url('/status_pengiriman/destroy/')}}",
                        mehtod:"get",
                        data:{id:id},
                        success:function(data)
                        {
                            $('#metode_pembayaran-table').DataTable().ajax.reload();
                            // alert(data);
                        }
                    })

                }
                });

        });

</script>
@endsection