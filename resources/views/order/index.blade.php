@extends('master.layout')
@section('content')
<div class="panel-body">
    <a href="{{ url('admin/order/create') }}" class="btn btn-primary">Tambah Order</a><br><br>

            @if (session('message'))
            <div class="alert alert-success" role="alert">
                {{ session('message') }}                        
            </div>
            @endif
        
    <table class="table table-bordered table-hover table-striped" id="order-table">
        <thead>
            <tr>
                <th>Nomor Resi</th>
                <th>Tanggal Order</th>
                <th>Harga Per Kg</th>
                <th>Penerima</th>
                <th>Alamat Penerima</th>
                <th>No Telp Penerima</th>
                <!-- <th>Vendor</th> -->
                <th>Metode Pembayaran</th>
                <th>Customer</th>
                <th>OPSI</th>
            </tr>
        </thead>
        </table>
</div>

<div id="confirmModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h2 class="modal-title">Confirmation</h2>
            </div>
            <div class="modal-body">
                <h4 align="center" style="margin:0;">Are you sure you want to remove this data?</h4>
            </div>
            <div class="modal-footer">
             <button type="button" name="ok_button" id="ok_button" class="btn btn-danger">OK</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>

<script>
        $(function() {
            var table = $('#order-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{!! url("admin/order/dt") !!}',
                columns: [
                    { data: 'noResi', name: 'noResi' },
                    { data: 'tanggal', name: 'tanggal' },
                    { data: 'hargaKg', name: 'hargaKg' },
                    { data: 'penerima', name: 'penerima'},
                    { data: 'alamatPenerima', name: 'alamatPenerima'},
                    { data: 'noTelpPenerima', name: 'noTelpPenerima'},
                    // { data: 'berat', name: 'berat'},
                    // { data: 'vendor', name: 'vendor'},
                    { data: 'jenisPembayaran', name: 'jenisPembayaran'},
                    { data: 'namaCustomer', name: 'namaCustomer'},
                    { data: 'aksi', name: 'aksi'},
                ]
            });

            var user_id;

            $(document).on('click', '.delete', function(){
                jQuery.noConflict();
            user_id = $(this).attr('id');
            $('#confirmModal').modal('show');
            });

            $('#ok_button').click(function(){
            $.ajax({
            url:"order/destroy/"+user_id,
            success:function()
            {
                $('#confirmModal').modal('hide');
                table.ajax.reload();
            }
            })
            });
        });

</script>
@endsection