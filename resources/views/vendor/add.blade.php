@extends('master.layout')

@section('content')   
        <div class="panel-body">
                <h3>Form Tambah Metode Pembayaran</h3>
                <hr>
            <form action="{{ url('admin/vendor/store') }}" method="POST" >
            {{ csrf_field() }}
                <div class="row">
                    <div class="col-md-6">
                        <label for="">Vendor</label>
                        <input class="form-control" placeholder="Vendor" type="text" name="vendor"><br>

                            @error('vendor')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                           @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                    <input type="submit" name="submit" value="Simpan" class="btn btn-primary">
                    <a href="{{ url('admin/vendor') }}" class="btn btn-danger">Kembali</a>
                    </div>
                </div>
            </form>
        </div>
@endsection