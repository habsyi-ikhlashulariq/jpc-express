@extends('master.layout')

@section('content')   
        <div class="panel-body">
                <h3>Form Update Order</h3>
                <hr>
            <form action="{{ url('admin/order/update/'.$order->id) }}" method="POST" >
            {{ csrf_field() }}
            {{ method_field('PUT') }}
                <div class="row">
                    <div class="col-md-6">
                        <label for="">Tanggal Order</label>
                        <input class="form-control" placeholder="Tanggal Order" type="date" name="tanggal" value="{{ $order->tanggal }}"><br>

                            @error('tanggal')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                           @enderror

                        <label for="">Harga Per Kg</label>
                        <input class="form-control" placeholder="Harga Per Kg" type="text" name="hargaKg" value="{{ $order->hargaKg }}" ><br>

                            @error('hargaKg')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                           @enderror

                        <label for="">Kuli</label>
                        <input class="form-control" placeholder="Kuli" type="text" name="kuli" value="{{ $order->kuli }}" >
                        <br>
                             @error('kuli')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                           @enderror
                           
                        <label for="">Penerima</label>
                        <input class="form-control" placeholder="Penerima" type="text" name="penerima" value="{{ $order->penerima }}">
                        <br>
                             @error('penerima')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                           @enderror

                        <label for="">Alamat Penerima</label>
                        <input class="form-control" placeholder="Alamat Penerima" type="text" name="alamatPenerima" value="{{ $order->alamatPenerima }}" >
                        <br>
                             @error('alamatPenerima')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                           @enderror

                        <label for="">Nomor Telp Penerima</label>
                        <input class="form-control" placeholder="No Telp Penerima" type="text" name="noTelpPenerima" value="{{ $order->noTelpPenerima }}" >
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
                            @if($data->id == $order->vendor_id)
                                <option value="{{ $data->id }}" selected>{{$data->vendor }}</option>
                            @else
                                <option value="{{ $data->id }}">{{$data->vendor }}</option>
                            @endif
                            @endforeach
                        </select><br>

                            @error('vendor_id')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                           @enderror

                           <label for="">Barang</label>
                            <select name="barang_id" id="barang_id" class="form-control">
                            @foreach($barang as $data)
                            <option value="">Pilih Metode Pembayaran</option>
                            @if($data->id == $order->barang_id)
                                <option value="{{ $data->id }}" selected>{{$data->berat }}</option>
                            @else
                                <option value="{{ $data->id }}">{{$data->berat }}</option>
                            @endif
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
                                @if($data->id == $order->metodePembayaran_id)
                                    <option value="{{ $data->id }}" selected>{{$data->jenisPembayaran }}</option>
                                @else
                                    <option value="{{ $data->id }}">{{$data->jenisPembayaran }}</option>
                                @endif
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
                                @if($data->id == $order->statusPengiriman_id)
                                    <option value="{{ $data->id }}" selected>{{$data->platNomor }}</option>
                                @else
                                    <option value="{{ $data->id }}">{{$data->platNomor }}</option>
                                @endif
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
                                    @if($data->id == $order->customer_id)
                                    <option value="{{ $data->id }}" selected>{{$data->namaCustomer }}</option>
                                    @else
                                    <option value="{{ $data->id }}">{{$data->namaCustomer }}</option>
                                    @endif
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
                                    @if($data->id == $order->destinasi_id)
                                    <option value="{{ $data->id }}" selected>{{$data->kotaAsal }}|| {{$data->kotaTujuan }}</option>
                                    @else
                                    <option value="{{ $data->id }}">{{$data->kotaAsal }}|| {{$data->kotaTujuan }}</option>
                                    @endif
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