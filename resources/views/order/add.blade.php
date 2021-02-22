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

                        <label for="">Nomor Telp Penerima</label>
                        <input class="form-control" placeholder="No Telp Penerima" type="text" name="noTelpPenerima" >
                        <br>
                             @error('noTelpPenerima')
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

                           <label for="">Barang</label>
                            <select name="barang_id" id="barang_id" class="form-control">
                                <option value="">Pilih barang</option>
                                @foreach($barang as $data)
                                <option value="{{ $data->id }}">{{$data->berat }}</option>
                                @endforeach
                            </select><br>

                            @error('barang_id')
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

                           <label for="">Status Pengiriman</label>
                            <select name="statusPengiriman_id" id="statusPengiriman_id" class="form-control">
                                <option value="">Pilih Status Pengiriman</option>
                                @foreach($statusPengiriman as $data)
                                <option value="{{ $data->id }}">{{$data->platNomor }}</option>
                                @endforeach
                            </select><br>

                            @error('statusPengiriman_id')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                           @enderror

                           <label for="">Customer</label>
                            <select name="customer_id" id="customer_id" class="form-control">
                                <option value="">Pilih Customer</option>
                                @foreach($customer as $data)
                                <option value="{{ $data->id }}">{{$data->namaCustomer }}</option>
                                @endforeach
                            </select><br>

                            @error('customer_id')
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
@endsection