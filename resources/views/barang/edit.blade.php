@extends('master.layout')

@section('content')   
        <div class="panel-body">
                <h3>Form Tambah Pelanggan</h3>
                <hr>
            <form action="{{ url('/barang/update/'.$barang->id) }}" method="POST" >
            {{ csrf_field() }}
            {{ method_field('PUT') }}
                <div class="row">
                    <div class="col-md-6">
                        <label for="">Berat Barang</label>
                        <input class="form-control" placeholder="Berat Barang" type="text" name="berat" value="{{ $barang->berat}}"><br>

                            @error('berat')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                           @enderror

                        <label for="">Panjang Barang</label>
                        <input class="form-control" placeholder="Panjang Barang" type="text" name="panjang" value="{{ $barang->panjang}}"><br>

                            @error('panjang')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                           @enderror

                        <label for="">Lebar Barang</label>
                        <input class="form-control" placeholder="Lebar Barang" type="text" name="lebar" value="{{ $barang->lebar}}">
                        <br>
                             @error('lebar')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                           @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="">Lebar Barang</label>
                        <input class="form-control" placeholder="Tinggi Barang" type="text" name="tinggi" value="{{ $barang->tinggi}}" >
                        <br>
                             @error('tinggi')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                           @enderror

                        <label for="">Berat Volume Barang</label>
                        <input class="form-control" placeholder="Berat Volume Barang" type="text" name="beratVol" value="{{ $barang->beratVol}}" >
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
                    <a href="{{ url('barang') }}" class="btn btn-danger">Kembali</a>
                    </div>
                </div>
            </form>
        </div>
@endsection