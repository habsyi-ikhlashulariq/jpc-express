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
            var table = $('#status_pembayaran-table').DataTable({
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

            $('#status_pembayaran-table').on('click', 'tr td .delete', function () {
            var row = $(this).parents('tr')[0];
            var mydata = (table.row(row).data());
            var con=confirm("Apakah Ingin Menghapus Data "+ mydata["status"])
                if(con == true){
                    var id = mydata["id"];

                    $.ajax({
                        url:"{{url('/status_pengiriman/destroy/')}}",
                        mehtod:"get",
                        data:{id:id},
                        success:function(data)
                        {
                            $('#status_pembayaran-table').DataTable().ajax.reload();
                            // alert(data);
                        }
                    })

                }
                });
        });

</script>
@endsection