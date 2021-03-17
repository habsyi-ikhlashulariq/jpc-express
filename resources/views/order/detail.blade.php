@extends('master.layout')
@section('content')
<div class="panel-body">
    <div class="col-md-12">
        <h3 class="text-center">No Resi : {{$penjualan_id}}</h3>
        <div class="single-blog wow fadeInUp card-sk px-4 ">
            <label for=""></label>
        </div>
    </div>
    <div class="col-md-6">
        <div class="table-responsive">
            <table class="table table-bordered">
                <tr>
                    <th>Tanggal Order</th>
                    <td class="text-center" id="tanggal">{{$penjualan->tanggal}}</td>
                </tr>        
                <tr>
                    <th>Harga Per KG</th>
                    <td class="text-center" id="hargaKg">{{$penjualan->hargaKg}}</td>
                </tr>
                <tr>
                    <th>Nama Customer</th>
                    <td class="text-center" id="namaCustomer">{{$penjualan->namaCustomer}}</td>
                </tr>     
                <tr>
                    <th>Alamat Customer</th>
                    <td class="text-center" id="alamatCustomer">{{$penjualan->alamatCustomer}}</td>
                </tr>   
                <tr>
                    <th>No Telp Customer</th>
                    <td class="text-center" id="noTelpCustomer">{{$penjualan->noTelpCustomer}}</td>
                </tr>   
                <tr>
                    <th>Kota Asal</th>
                    <td class="text-center" id="kotaAsal">{{$penjualan->kotaAsal}}</td>
                </tr>  
            </table>
        </div>
    </div>

    <div class="col-md-6">
        <div class="table-responsive">
            <table class="table table-bordered">
                <tr>
                    <th>Penerima</th>
                    <td class="text-center" id="penerima">{{$penjualan->penerima}}</td>
                </tr>        
                <tr>
                    <th>Alamat Penerima</th>
                    <td class="text-center" id="alamatPenerima">{{$penjualan->alamatPenerima}}</td>
                </tr>        
                <tr>
                    <th>No Telp Penerima</th>
                    <td class="text-center" id="noTelpPenerima">{{$penjualan->noTelpPenerima}}</td>
                </tr>     
                <tr>
                    <th>Jenis Pembayaran</th>
                    <td class="text-center" id="jenisPembayaran">{{$penjualan->jenisPembayaran}}</td>
                </tr>     
                <tr>
                    <th>Koli</th>
                    <td class="text-center" id="kuli">{{$penjualan->kuli}}</td>
                </tr>    
                <tr>
                    <th>Kota Tujuan</th>
                    <td class="text-center" id="kotaTujuan">{{$penjualan->kotaTujuan}}</td>
                </tr>   
            </table>
        </div>
    </div>
    <div class="col-md-12">
        <h4 class="text-center">Detail Barang</h4>
    </div>
    <div class="col-md-6">
        <table class="table table-bordered">
            <tr>
                <th>Berat Barang</th>
                <td class="text-center" id="berat">{{$penjualan->berat}}</td>
            </tr>   
            <tr>
                <th>Berat Volume Barang</th>
                <td class="text-center" id="beratVol">{{$penjualan->beratVol}}</td>
            </tr>
        </table>
    </div>
    <div class="col-md-6">
        <table class="table table-bordered">
            <tr>
                <th>Panjang Barang</th>
                <td class="text-center" id="panjang">{{$penjualan->panjang}}</td>
            </tr>   
            <tr>
                <th>Tinggi Barang</th>
                <td class="text-center" id="tinggi">{{$penjualan->tinggi}}</td>
            </tr>   
        </table>  
    </div>

    <div class="col-md-12">
        <h4 class="text-center">Status Pengiriman</h4>
    </div>
    <div class="col-md-6">
        <table class="table table-bordered">
            <tr>
                <th>Keterangan</th>
                <td class="text-center" id="keterangan">{{$penjualan->keterangan}}</td>
            </tr>   
        </table>
    </div>
    <div class="col-md-6">
        <table class="table table-bordered">
            <tr>
                <th>Status</th>
                <td class="text-center" id="statusPengiriman">
                    @if($penjualan->statusPengiriman = 0)
                        In Process
                    @else($penjualan->statusPengiriman = 1)
                        Done
                    @endif
                </td>
            </tr>   
        </table>  
    </div>

    <div class="col-md-12">
        <h4 class="text-center">Vendor</h4>
        <table class="table table-bordered">
            @if($penjualan->vendor == null)
                <tr>
                    <th class="text-center">Vendor</th>
                </tr>   
                <tr>
                    <td class="text-center" id="vendor">Tidak Menggunakan Vendor</td>
                </tr>   
            @else
                <tr>
                    <th class="text-center">Nama</th>
                    <th class="text-center">Total Biaya</th>
                </tr>   
                <tr>
                    <td class="text-center" id="vendor">{{$penjualan->vendor}}</td>
                    <td class="text-center" id="vendor">{{$penjualan->totalBiayaVendor}}</td>
                </tr>   
            @endif
        </table>  
    </div>

    <div class="col-md-12">
        <table class="table table-bordered">
            <tr>
                <th class="text-center">Total Biaya</th>
            </tr>   
            <tr>
                <td class="text-center" id="totalBiaya">{{$penjualan->totalBiaya}}</td>
            </tr>   
        </table>  
    </div>

    <div class="col-md-12 text-center">
        <a href="{{url('admin/order/edit/'.$penjualan->noResi)}}" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-pencil"></i>&nbsp;Edit</a>
        <a href="{{url('admin/order/destroy/'.$penjualan->noResi)}}" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-close"></i>&nbsp;Delete</a>
        <a href="{{ url('admin/order') }}" class="btn btn-danger"><i class="fa fa-undo"></i>&nbsp;Kembali</a>
    </div>
    
</div>
@endsection