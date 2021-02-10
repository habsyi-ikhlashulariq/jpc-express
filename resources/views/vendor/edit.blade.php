@extends('master.layout')

@section('content')   
        <div class="panel-body">
                <h3>Form Update Metode Pembayaran</h3>
                <hr>
            <form action="{{url('/vendor/update/'.$vendor->id) }}" method="POST" >
            {{ csrf_field() }}
            {{ method_field('PUT') }}
                <div class="row">
                    <div class="col-md-6">
                        <label for="">Vendor</label>
                        <input class="form-control" placeholder="Vendor" type="text" name="vendor" value="{{ $vendor->vendor }}"><br>

                            @error('vendor')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                           @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                    <input type="submit" name="submit" value="Simpan" class="btn btn-primary">
                    <a href="{{ url('vendor') }}" class="btn btn-danger">Kembali</a>
                    </div>
                </div>
            </form>
        </div>
@endsection