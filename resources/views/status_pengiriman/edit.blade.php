@extends('master.layout')

@section('content')   
        <div class="panel-body">
                <h3>Form Tambah Metode Pembayaran</h3>
                <hr>
            <form action="{{ url('/status_pengiriman/update/'.$status_pengiriman->id) }}" method="POST" >
            {{ csrf_field() }}
            {{ method_field('PUT') }}
                <div class="row">
                    <div class="col-md-6">
                        <label for="">Plat Nomor</label>
                        <input class="form-control" placeholder="Plat Nomor" type="text" name="platNomor" value="{{ $status_pengiriman->platNomor }}"><br>

                            @error('platNomor')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                           @enderror

                        <label for="">Plat Nomor</label>
                        <input class="form-control" placeholder="Keterangan" type="text" name="keterangan" value="{{ $status_pengiriman->keterangan }}"><br>

                            @error('keterangan')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                           @enderror

                    </div>
                    <div class="col-md-6">
                        <label for="">Nama Supir</label>
                        <input class="form-control" placeholder="Nama Supir" type="text" name="namaSupir" value="{{ $status_pengiriman->namaSupir }}"><br>

                            @error('namaSupir')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                           @enderror

                        <label for="">Tanggal</label>
                        <input class="form-control" placeholder="Tanggal" type="date" name="tanggal" value="{{ $status_pengiriman->tanggal }}"><br>

                            @error('tanggal')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                           @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                    <input type="submit" name="submit" value="Simpan" class="btn btn-primary">
                    <a href="{{ url('status_pengiriman') }}" class="btn btn-danger">Kembali</a>
                    </div>
                </div>
            </form>
        </div>
@endsection