@extends('master.layout')

@section('content')   
        <div class="panel-body">
                <h3>Form Tambah Status Pengiriman</h3>
                <hr>
            <form action="{{ url('admin/status_pengiriman/store') }}" method="POST" >
            {{ csrf_field() }}
                <div class="row">
                    <div class="col-md-12">
                        <label for="">No Resi</label>
                        <select name="noResi" id="noResi" class="form-control">
                            <option value="">No resi</option>
                            @foreach($penjualan as $data)
                            <option value="{{ $data->noResi }}">{{$data->noResi }} || {{$data->namaCustomer }}</option>
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
                            <option value="{{ $data->id }}">{{$data->platNomor }} || {{$data->name }}</option>
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
                    <input class="form-control" placeholder="Tanggal" type="date" name="tanggal"><br>

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
                    <a href="{{ url('admin/status_pengiriman') }}" class="btn btn-danger">Kembali</a>
                    </div>
                </div>
            </form>
        </div>
@endsection