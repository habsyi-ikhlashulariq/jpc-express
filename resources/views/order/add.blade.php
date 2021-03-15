@extends('master.layout')

@section('content')   
        <div class="panel-body">
                <h3>Form Tambah Order</h3>
                <hr>
            <form action="{{ url('admin/order/store') }}" method="POST" >
            {{ csrf_field() }}
                <div class="row">
                    <div class="col-md-6">
                        <label for="">Tanggal Order</label>
                        <input class="form-control" placeholder="Tanggal Order" type="date" name="tanggal"><br>

                            @error('tanggal')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                           @enderror

                        <label for="">Harga Per Kg</label>
                        <input class="form-control" placeholder="Harga Per Kg" type="text" name="hargaKg" ><br>

                            @error('hargaKg')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                           @enderror

                        <label for="">Kuli</label>
                        <input class="form-control" placeholder="Kuli" type="text" name="kuli" >
                        <br>
                             @error('kuli')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                           @enderror
                           
                        <label for="">Penerima</label>
                        <input class="form-control" placeholder="Penerima" type="text" name="penerima" >
                        <br>
                             @error('penerima')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                           @enderror

                        <label for="">Alamat Penerima</label>
                        <input class="form-control" placeholder="Alamat Penerima" type="text" name="alamatPenerima" >
                        <br>
                             @error('alamatPenerima')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                           @enderror

                        <label id="totalBiayaVendorLabel" for="">Total Biaya Vendor</label>
                        <input class="form-control" placeholder="Total Biaya Vendor" id="totalBiayaVendor" type="text" name="totalBiayaVendor" >
                        <br id="biayaVendorBr">
                            @error('totalBiayaVendor')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror

                        <label for="">Pilihan</label>
                        <select name="pilihan" class="form-control">
                            <option value="0">Barang Di Jemput</option>
                            <option value="1">Barang Di Antar</option>
                        </select>

                            @error('vendor_id')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                           @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="">Vendor</label>
                        <select name="vendor_id" id="vendor_id" class="form-control">
                            <option value="">Pilih Vendor</option>
                            @foreach($vendor as $data)
                            <option value="{{ $data->id }}">{{$data->vendor }}</option>
                            @endforeach
                        </select><br>

                            @error('vendor_id')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                           @enderror

                           <label for="">Metode Pembayaran</label>
                            <select name="metodePembayaran_id" id="metodePembayaran_id" class="form-control">
                                <option value="">Pilih Metode Pembayaran</option>
                                @foreach($metodePembayaran as $data)
                                <option value="{{ $data->id }}">{{$data->jenisPembayaran }}</option>
                                @endforeach
                            </select><br>

                            @error('metodePembayaran_id')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                           @enderror

                           <label for="">Destinasi</label>
                            <select name="destinasi_id" id="destinasi_id" class="form-control">
                                <option value="">Pilih Destinasi</option>
                                @foreach($destinasi as $data)
                                <option value="{{ $data->id }}">{{$data->kotaAsal }}|| {{$data->kotaTujuan }}</option>
                                @endforeach
                            </select><br>

                            @error('destinasi_id')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                           @enderror

                           <label for="">Nomor Telp Penerima</label>
                            <input class="form-control" placeholder="No Telp Penerima" type="text" name="noTelpPenerima" >
                            <br>
                             @error('noTelpPenerima')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                           @enderror

                           <label for="">Total Biaya</label>
                            <input class="form-control" placeholder="Total Biaya" type="text" name="totalBiaya" >
                            <br>
                             @error('totalBiaya')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                           @enderror

                           <label id="kurirLabel" for="">Pilih Kurir</label>
                            <select name="kurir_id"  id="kurirId" class="form-control">
                            <option value="">Pilih Kurir</option>
                                @foreach($user as $data)
                                <option value="{{ $data->id }}">{{$data->name }}|| {{$data->platNomor }}</option>
                                @endforeach
                            </select>

                            @error('kurir_id')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                           @enderror
                    </div>
                </div>
                <h3>Data Barang</h3>
                <div class="row">
                    <div class="col-md-6">
                        <label for="">Berat Barang</label>
                        <input class="form-control" placeholder="Berat Barang" type="text" name="berat"><br>

                            @error('berat')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                           @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="">Tinggi Barang</label>
                        <input class="form-control" placeholder="Tinggi Barang" type="text" name="tinggi"><br>

                            @error('tinggi')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                           @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="">Panjang Barang</label>
                        <input class="form-control" placeholder="Panjang Barang" type="text" name="panjang"><br>

                            @error('panjang')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                           @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="">Lebar Barang</label>
                        <input class="form-control" placeholder="Lebar Barang" type="text" name="lebar"><br>

                            @error('lebar')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                           @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="">Berat Volume Barang</label>
                        <input class="form-control" placeholder="Berat Volume Barang" type="text" name="beratVol"><br>

                            @error('beratVol')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                           @enderror
                    </div>
                </div>
                
                <h3>Data Customer</h3>

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
                        <input class="form-control" placeholder="Alamat Customer" type="text" name="alamatCustomer" >
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
                    <a href="{{ url('admin/order') }}" class="btn btn-danger">Kembali</a>
                    </div>
                </div>
            </form>
        </div>
        <script>
            $(document).ready(function(){
                $("#totalBiayaVendor").hide();
                $("#totalBiayaVendorLabel").hide();
                $('#biayaVendorBr').hide();
                $('#vendor_id').change(function(){
                    let vendorVal = $('#vendor_id').val();
                    console.log(vendorVal)
                    if(vendorVal){
                        $("#totalBiayaVendor").show();
                        $("#totalBiayaVendorLabel").show();
                        $('#biayaVendorBr').show();
                        $('#kurirId').hide();
                        $('#kurirLabel').hide();
                    } else {
                        $("#totalBiayaVendor").hide();
                        $("#totalBiayaVendorLabel").hide();
                        $('#biayaVendorBr').hide();
                        $('#kurirId').show();
                        $('#kurirLabel').show();
                    }
                });
            });
        </script>
@endsection