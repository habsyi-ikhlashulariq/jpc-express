@extends('master.layout')

@section('content')   
        <div class="panel-body">
                <h3>Form Tambah Destinasi</h3>
                <hr>
            <form action="{{ url('/destination/store') }}" method="POST" >
            {{ csrf_field() }}
                <div class="row">
                    <div class="col-md-6">
                        <label for="">Kota Asal</label>
                        <input class="form-control" placeholder="Kota Asal" type="text" name="kotaAsal"><br>

                            @error('kotaAsal')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                           @enderror

                        <label for="">Kota Tujuan</label>
                        <input class="form-control" placeholder="Kota Tujuan" type="text" name="kotaTujuan" ><br>

                            @error('kotaTujuan')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                           @enderror

                        
                    </div>
                    <div class="col-md-6">
                        <label for="">Tarif</label>
                        <input class="form-control" placeholder="Tarif" type="text" name="tarif" >
                        <br>
                             @error('tarif')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                           @enderror

                        <label for="">Waktu Pengiriman</label>
                        <input class="form-control" placeholder="Waktu Pengiriman" type="text" name="waktu" >
                        <br>
                             @error('waktu')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                           @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                    <input type="submit" name="submit" value="Simpan" class="btn btn-primary">
                    <a href="{{ url('destination') }}" class="btn btn-danger">Kembali</a>
                    </div>
                </div>
            </form>
        </div>
@endsection