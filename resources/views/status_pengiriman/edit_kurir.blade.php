@extends('master.layout')

@section('content')   
        <div class="panel-body">
                <h3>Form Tambah Metode Pembayaran</h3>
                <hr>
            <form action="{{ url('kurir/status_pengiriman/update/'.$status_pengiriman->id) }}" method="POST" >
            {{ csrf_field() }}
            {{ method_field('PUT') }}
                <div class="row">
                    <div class="col-md-12">
                        <label for="">No Resi</label>
                        <input class="form-control" placeholder="No Resi" type="text" name="penjualan_id" value="{{$status_pengiriman->penjualan_id}}" readonly><br>
                        @error('penjualan_id')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="">Keterangan</label>
                        <input class="form-control" placeholder="Keterangan" type="text" name="keterangan"><br>

                        @error('keterangan')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                    <label for="">Status</label>
                    <select name="status" id="status" class="form-control">
                        <option value="0">Masih Dijalan</option>
                        <option value="1">Sudah Sampai</option>
                    </select><br>

                        @error('status')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                    <input type="submit" name="submit" value="Simpan" class="btn btn-primary">
                    <a href="{{ url('kurir/status_pengiriman') }}" class="btn btn-danger">Kembali</a>
                    </div>
                </div>
            </form>
        </div>
@endsection