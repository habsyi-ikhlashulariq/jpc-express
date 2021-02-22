@extends('master.layout')

@section('content')   
        <div class="panel-body">
                <h3>Form Tambah Barang</h3>
                <hr>
            <form action="{{ url('/admin/barang/store') }}" method="POST" >
            {{ csrf_field() }}
                <div class="row">
                    <div class="col-md-6">
                        <label for="">Berat Barang</label>
                        <input class="form-control" placeholder="Berat Barang" type="text" name="berat"><br>

                            @error('berat')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                           @enderror

                        <label for="">Panjang Barang</label>
                        <input class="form-control" placeholder="Panjang Barang" type="text" name="panjang" ><br>

                            @error('panjang')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                           @enderror

                        <label for="">Lebar Barang</label>
                        <input class="form-control" placeholder="Lebar Barang" type="text" name="lebar" >
                        <br>
                             @error('lebar')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                           @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="">Lebar Barang</label>
                        <input class="form-control" placeholder="Tinggi Barang" type="text" name="tinggi" >
                        <br>
                             @error('tinggi')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                           @enderror

                        <label for="">Berat Volume Barang</label>
                        <input class="form-control" placeholder="Berat Volume Barang" type="text" name="beratVol" >
                        <br>
                             @error('beratVol')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                           @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                    <input type="submit" name="submit" value="Simpan" class="btn btn-primary">
                    <a href="{{ url('admin/barang') }}" class="btn btn-danger">Kembali</a>
                    </div>
                </div>
            </form>
        </div>
@endsection