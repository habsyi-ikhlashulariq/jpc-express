@extends('master.layout')

@section('content')   
        <div class="panel-body">
                <h3>Form Tambah Metode Pembayaran</h3>
                <hr>
            <form action="{{ url('/metode_pembayaran/store') }}" method="POST" >
            {{ csrf_field() }}
                <div class="row">
                    <div class="col-md-6">
                        <label for="">Jenis Pembayaran</label>
                        <input class="form-control" placeholder="Jenis Pembayaran" type="text" name="jenisPembayaran"><br>

                            @error('jenisPembayaran')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                           @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                    <input type="submit" name="submit" value="Simpan" class="btn btn-primary">
                    <a href="{{ url('metode_pembayaran') }}" class="btn btn-danger">Kembali</a>
                    </div>
                </div>
            </form>
        </div>
@endsection