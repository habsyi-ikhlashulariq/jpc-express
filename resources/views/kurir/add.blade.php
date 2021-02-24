@extends('master.layout')

@section('content')   
        <div class="panel-body">
                <h3>Form Tambah Pelanggan</h3>
                <hr>
            <form action="{{ url('admin/kurir/store') }}" method="POST" >
            {{ csrf_field() }}
                <div class="row">
                    <div class="col-md-6">
                        <label for="">Nama Kurir</label>
                        <input class="form-control" placeholder="Nama Kurir" type="text" name="name"><br>

                            @error('name')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                           @enderror

                        <label for="">Email Kurir</label>
                        <input class="form-control" placeholder="Email Kurir" type="text" name="email" ><br>

                            @error('email')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                           @enderror

                           <label for="">Jenis Kelamin</label>
                            <select name="gender" id="gender" class="form-control">
                                <option value="">Pilih Jenis Kelamin</option>
                                <option value="1">Laki-Laki</option>
                                <option value="0">Perempuan</option>
                            </select><br>

                            @error('gender')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                           @enderror

                    </div>
                    <div class="col-md-6">
                        <label for="">No Telp Kurir</label>
                        <input class="form-control" placeholder="No Telp Kurir" type="text" name="telp" >
                        <br>
                        @error('telp')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror

                        <label for="">Plat Nomor Kurir</label>
                        <input class="form-control" placeholder="Plat Nomor Kurir" type="text" name="platNomor" >
                        <br>
                        @error('platNomor')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror

                        <label for="">Alamat</label>
                        <input class="form-control" placeholder="Alamat Kurir" type="text" name="address" >
                        <br>
                             @error('address')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                           @enderror

                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                    <input type="submit" name="submit" value="Simpan" class="btn btn-primary">
                    <a href="{{ url('admin/kurir') }}" class="btn btn-danger">Kembali</a>
                    </div>
                </div>
            </form>
        </div>
@endsection