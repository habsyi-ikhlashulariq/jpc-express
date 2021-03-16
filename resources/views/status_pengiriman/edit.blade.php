@extends('master.layout')

@section('content')   
        <div class="panel-body">
                <h3>Form Edit Status Pengiriman</h3>
                <hr>
            <form action="{{ url('admin/status_pengiriman/update/'.$status_pengiriman->id) }}" method="POST" >
            {{ csrf_field() }}
            {{ method_field('PUT') }}
            <div class="row">
                    <div class="col-md-12">
                        <label for="">No Resi</label>
                        <select name="noResi" id="noResi" class="form-control">
                            <option value="">No resi</option>
                            @foreach($penjualan as $data)
                            @if($data->noResi == $status_pengiriman->penjualan_id)
                            <option value="{{ $data->noResi }}" selected>{{$data->noResi }} || {{$data->namaCustomer }}</option>
                            @else
                            <option value="{{ $data->noResi }}">{{$data->noResi }} || {{$data->namaCustomer }}</option>
                            @endif
                            @endforeach
                        </select><br>

                        @error('noResi')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="">Kurir</label>
                        <select name="kurir_id" id="kurir_id" class="form-control">
                            <option value="">Kurir</option>
                            @foreach($kurir as $data)
                            @if($data->id == $status_pengiriman->kurir_id)
                            <option value="{{ $data->id }}" selected>{{$data->platNomor }} || {{$data->name }}</option>
                            @else
                            <option value="{{ $data->id }}">{{$data->platNomor }} || {{$data->name }}</option>
                            @endif
                            @endforeach
                        </select><br>

                        @error('kurir_id')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                    <label for="">Tanggal</label>
                    <input class="form-control" placeholder="Tanggal" type="date" name="tanggal" value="{{ $status_pengiriman->tanggal}}"><br>

                        @error('tanggal')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                    <label for="">Keterangan</label>
                    <input class="form-control" placeholder="Keterangan" type="text" name="keterangan" value="{{ $status_pengiriman->keterangan}}" ><br>

                        @error('keterangan')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                    <label for="">Status</label>
                    <select name="status" id="status" class="form-control">
                        @if($status_pengiriman->status == 0)
                            <option value="0" selected>Masih Dijalan</option>
                            <option value="1">Sudah Sampai</option>
                        @else
                            <option value="1" selected>Sudah Sampai</option>
                            <option value="0" >Masih Dijalan</option>
                        @endif
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
                    <a href="{{ url('admin/status_pengiriman') }}" class="btn btn-danger">Kembali</a>
                    </div>
                </div>
            </form>
        </div>
@endsection