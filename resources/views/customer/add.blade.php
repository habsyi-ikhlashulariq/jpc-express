@extends('master.layout')

@section('content')   
        <div class="panel-body">
                <h3>Form Tambah Pelanggan</h3>
                <hr>
            <form action="{{ url('/customer/store') }}" method="POST" >
            {{ csrf_field() }}
                <div class="row">
                    <div class="col-md-6">
                        <label for="">Nama Customer</label>
                        <input class="form-control" placeholder="Nama Customer" type="text" name="namaCustomer"><br>

                            @error('namaCustomer')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                           @enderror

                        <label for="">Email Customer</label>
                        <input class="form-control" placeholder="Email Customer" type="text" name="emailCustomer" ><br>

                            @error('emailCustomer')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                           @enderror

                        <label for="">No Telp Customer</label>
                        <input class="form-control" placeholder="No Telp. Customer" type="text" name="noTelpCustomer" >
                        <br>
                             @error('noTelpCustomer')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                           @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="">Jenis Kelamin Customer</label>
                        <select name="genderCustomer" id="genderCustomer" class="form-control">
                            <option value="">Pilih Jenis Kelamin</option>
                            <option value="L">Laki-Laki</option>
                            <option value="P">Perempuan</option>
                        </select><br>

                            @error('genderCustomer')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                           @enderror

                        <label for="">Alamat Customer</label>
                        <textarea name="alamatCustomer" id="" cols="67" rows="5">
                        </textarea>
                        <br>
                        @error('alamatCustomer')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                           @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                    <input type="submit" name="submit" value="Simpan" class="btn btn-primary">
                    <a href="{{ url('customer') }}" class="btn btn-danger">Kembali</a>
                    </div>
                </div>
            </form>
        </div>
@endsection