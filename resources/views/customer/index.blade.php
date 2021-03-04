@extends('master.layout')
@section('content')
<div class="panel-body">
    <a href="{{ url('admin/customer/create') }}" class="btn btn-primary">Tambah Customer</a><br><br>

            @if (session('message'))
                <div class="alert alert-success" role="alert">
                    {{ session('message') }}                        
                </div>
            @endif
        
    <table class="table table-bordered table-hover table-striped" id="customer-table">
        <thead>
            <tr>
                <th>Nama Customer</th>
                <th>Email Customer</th>
                <th>No Telp Customer</th>
                <th>Jenis Kelamin Customer</th>
                <th>Alamat Customer</th>
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
            $('#customer-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{!! url("admin/customer/dt") !!}',
                columns: [
                    { data: 'namaCustomer', name: 'namaCutomer' },
                    { data: 'emailCustomer', name: 'emailCustomer' },
                    { data: 'noTelpCustomer', name: 'noTelpCustomer'},
                    { data: 'genderCustomer', name: 'genderCustomer'},
                    { data: 'alamatCustomer', name: 'alamatCustomer'},
                    { data: 'aksi', name: 'aksi'},
                ]
            });


            // $(document).on("click", ".delete", function() {
            //     jQuery.noConflict();
            //     $('#confirmModal').modal('show');

            // });

            var user_id;

$(document).on('click', '.delete', function(){
    jQuery.noConflict();
 user_id = $(this).attr('id');
 $('#confirmModal').modal('show');
});

$('#ok_button').click(function(){
 $.ajax({
  url:"ajax-crud/destroy/"+user_id,
  beforeSend:function(){
   $('#ok_button').text('Deleting...');
  },
  success:function(data)
  {
   setTimeout(function(){
    $('#confirmModal').modal('hide');
    $('#user_table').DataTable().ajax.reload();
   }, 2000);
  }
 })
});

            // var user_id;

            // $(document).on('click', '.delete', function(){
            // // user_id = $(this).attr('id');
            // $('#confirmModal').modal('show');
            // });

            // $('#ok_button').click(function(){
            // $.ajax({
            // url:"ajax-crud/destroy/"+user_id,
            // beforeSend:function(){
            // $('#ok_button').text('Deleting...');
            // },
            // success:function(data)
            // {
            // setTimeout(function(){
            //     $('#confirmModal').modal('hide');
            //     $('#user_table').DataTable().ajax.reload();
            // }, 2000);
            // }
            // })
            // });


        });

</script>
@endsection