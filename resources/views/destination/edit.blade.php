@extends('master.layout')

@section('content')   
        <div class="panel-body">
                <h3>Form Update Destinasi</h3>
                <hr>
            <form action="{{ url('/admin/destinasi/update/'.$destinasi->id) }}" method="POST" >
            {{ method_field('PUT') }}
            {{ csrf_field() }}
                <div class="row">
                    <div class="col-md-6">
                        <label for="">Kota Asal</label>
                        <input class="form-control" placeholder="Kota Asal" type="text" name="kotaAsal" value="{{ $destinasi->kotaAsal}}"><br>

                            @error('kotaAsal')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                           @enderror

                        <label for="">Kota Tujuan</label>
                        <input class="form-control" placeholder="Kota Tujuan" type="text" name="kotaTujuan" value="{{ $destinasi->kotaTujuan}}" ><br>

                            @error('kotaTujuan')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                           @enderror

                        
                    </div>
                    <div class="col-md-6">
                        <label for="">Tarif</label>
                        <input class="form-control" placeholder="Tarif" type="text" name="tarif" value="{{ $destinasi->tarif}}">
                        <br>
                             @error('tarif')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                           @enderror

                        <label for="">Waktu Pengiriman</label>
                        <input class="form-control" placeholder="Waktu Pengiriman" type="text" name="waktu" value="{{ $destinasi->waktu}}">
                        <br>
                             @error('waktu')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                           @enderror
                    </div>
                    <div class="col-md-12">
                    <label for="">Transportasi</label>
                        <select name="statusTransport" id="statusTransport" class="form-control">
                            <option value="0" {{ ( $destinasi->statusTransport == 0)  ? 'selected' : ''}}>Tarif Darat</option>
                            <option value="1" {{ ( $destinasi->statusTransport == 1)  ? 'selected' : ''}}>Tarif Udara</option>
                            <option value="2" {{ ( $destinasi->statusTransport == 2)  ? 'selected' : ''}}>Tarif Riau Daratan</option>
                            <option value="3" {{ ( $destinasi->statusTransport == 3)  ? 'selected' : ''}}>Tarif Motor</option>
                        </select><br>

                            @error('statusTransport')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                           @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                    <input type="submit" name="submit" value="Simpan" class="btn btn-primary">
                    <a href="{{ url('admin/destinasi') }}" class="btn btn-danger">Kembali</a>
                    </div>
                </div>
            </form>
        </div>
@endsection