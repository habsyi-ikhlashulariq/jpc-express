@extends('master.layout')

@section('content')   
        <div class="panel-body">
                <h3>Form Update Metode Pembayaran</h3>
                <hr>
            <form action="{{url('admin/metode_pembayaran/update/'.$metode_pembayaran->id) }}" method="POST" >
            {{ csrf_field() }}
            {{ method_field('PUT') }}
                <div class="row">
                    <div class="col-md-6">
                        <label for="">Jenis Pembayaran</label>
                        <input class="form-control" placeholder="Jenis Pembayaran" type="text" name="jenisPembayaran" value="{{ $metode_pembayaran->jenisPembayaran }}"><br>

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
                    <a href="{{ url('admin/metode_pembayaran') }}" class="btn btn-danger">Kembali</a>
                    </div>
                </div>
            </form>
        </div>
@endsection