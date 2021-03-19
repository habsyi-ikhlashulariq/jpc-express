<!DOCTYPE html>
<html>
<head>
	<title>Cetak Resi</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/vendor/font-awesome/css/font-awesome.min.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/vendor/linearicons/style.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/vendor/chartist/css/chartist-custom.css') }}">
	<!-- MAIN CSS -->
	<link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
	<!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
	<link rel="stylesheet" href="{{ asset('assets/css/demo.css') }}">

    
</head>
<body onload="window.print()">

<div class="container">
<div class="col-md-12">
        <h3 class="text-center">No Resi : {{$data->noResi}}</h3>
        <div class="single-blog wow fadeInUp card-sk px-4 ">
            <label for=""></label>
        </div>
    </div>
    <div class="col-md-12">
        <div class="table-responsive">
            <table class="table table-bordered">
                <tr>
                    <th>Tanggal Order</th>
                    <td class="text-center" id="tanggal">{{$data->tanggal}}</td>
                    <th>Penerima</th>
                    <td class="text-center" id="penerima">{{$data->penerima}}</td>
                </tr>        
                <tr>
                    <th>Harga Per KG</th>
                    <td class="text-center" id="hargaKg">{{$data->hargaKg}}</td>
                    <th>Alamat Penerima</th>
                    <td class="text-center" id="alamatPenerima">{{$data->alamatPenerima}}</td>
                </tr>
                <tr>
                    <th>Nama Customer</th>
                    <td class="text-center" id="namaCustomer">{{$data->namaCustomer}}</td>
                    <th>No Telp Penerima</th>
                    <td class="text-center" id="noTelpPenerima">{{$data->noTelpPenerima}}</td>
                </tr>     
                <tr>
                    <th>Alamat Customer</th>
                    <td class="text-center" id="alamatCustomer">{{$data->alamatCustomer}}</td>
                    <th>Jenis Pembayaran</th>
                    <td class="text-center" id="jenisPembayaran">{{$data->jenisPembayaran}}</td>
                </tr>   
                <tr>
                    <th>No Telp Customer</th>
                    <td class="text-center" id="noTelpCustomer">{{$data->noTelpCustomer}}</td>
                    <th>Koli</th>
                    <td class="text-center" id="kuli">{{$data->kuli}}</td>
                </tr>   
                <tr>
                    <th>Kota Asal</th>
                    <td class="text-center" id="kotaAsal">{{$data->kotaAsal}}</td>
                    <th>Kota Tujuan</th>
                    <td class="text-center" id="kotaTujuan">{{$data->kotaTujuan}}</td>
                </tr>  
            </table>
        </div>
    </div>

    <div class="col-md-12">
        <h4 class="text-center">Detail Barang</h4>
    </div>
    <div class="col-md-12">
        <table class="table table-bordered" border=1>
            <tr>
                <th>Berat Barang</th>
                <td class="text-center" id="berat">{{$data->berat}}</td>
                <th>Panjang Barang</th>
                <td class="text-center" id="panjang">{{$data->panjang}}</td>
            </tr>   
            <tr>
                <th>Berat Volume Barang</th>
                <td class="text-center" id="beratVol">{{$data->beratVol}}</td>
                <th>Tinggi Barang</th>
                <td class="text-center" id="tinggi">{{$data->tinggi}}</td>
            </tr>
        </table>
    </div>

    <div class="col-md-12">
        <h4 class="text-center">Status Pengiriman</h4>
    </div><br>
    <div class="col-md-12">
        <table class="table table-bordered">
            <tr>
                <th>Keterangan</th>
                <td class="text-center" id="keterangan">{{$data->keterangan}}</td>
            </tr> 
            <tr>
                <th>Status</th>
                <td class="text-center" id="statusPengiriman">
                    @if($data->statusPengiriman = 0)
                        In Process
                    @else($data->statusPengiriman = 1)
                        Done
                    @endif
                </td>
            </tr>     
        </table>
    </div>

    <div class="col-md-12">
        <h4 class="text-center">Vendor</h4>
    </div><br>
    <div class="col-md-12">
        <table class="table table-bordered">
            @if($data->vendor == null)
                <tr>
                    <th class="text-center">Vendor</th>
                </tr>   
                <tr>
                    <td class="text-center" id="vendor">Tidak Menggunakan Vendor</td>
                </tr>   
            @else
                <tr>
                    <th class="text-center">Nama</th>
                    <th class="text-center">Biaya Vendor</th>
                </tr>   
                <tr>
                    <td class="text-center" id="vendor">{{$data->vendor}}</td>
                    <td class="text-center" id="vendor">{{$data->totalBiayaVendor}}</td>
                </tr>   
            @endif
            <tr>
                <th colspan="2" class="text-center">Total Biaya</th>
            </tr>
            <tr>
                <td  colspan="2" class="text-center" id="totalBiaya">{{$data->totalBiaya}}</td>
            </tr>   
        </table>  
    </div>
</div>

    <script src="{{ asset('assets/vendor/jquery/jquery.min.js') }}"></script>
	<script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
	<script src="{{ asset('assets/vendor/jquery.easy-pie-chart/jquery.easypiechart.min.js') }}"></script>
	<script src="{{ asset('assets/vendor/chartist/js/chartist.min.js') }}"></script>
	<script src="{{ asset('assets/scripts/klorofil-common.js') }}"></script>
	
</body>
</html>
