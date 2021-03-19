
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Resi</title>
    <style>
        body{
            margin:0 auto;
        }
    </style>
</head>
<body onload="window.print()">
    <center>
        <h3>No Resi : {{$data->noResi}}</h3>
    </center>

    <table border=1 width="800px">
        <tr>
            <td>Tanggal Order</td>
            <td>{{$data->tanggal}}</td>
            <td>Penerima</td>
            <td>{{$data->penerima}}</td>
        </tr>
        <tr>
            <td>Harga Per Kg</td>
            <td>{{$data->hargaKg}}</td>
            <td>Alamat Penerima</td>
            <td>{{$data->alamatCustomer}}</td>
        </tr>
        <tr>
            <td>Nama Customer</td>
            <td>{{$data->namaCustomer}}</td>
            <td>No Telp Penerima</td>
            <td>{{$data->noTelpPenerima}}</td>
        </tr>
        <tr>
            <td>Alamat Customer</td>
            <td>{{$data->alamatCustomer}}</td>
            <td>Jenis Pembayaran</td>
            <td>{{$data->jenisPembayaran}}</td>
        </tr>
        <tr>
            <td>No Telp Customer</td>
            <td>{{$data->noTelpCustomer}}</td>
            <td>Koli</td>
            <td>{{$data->kuli}}</td>
        </tr>
        <tr>
            <td>Kota Asal</td>
            <td>{{$data->kotaAsal}}</td>
            <td>Kota Tujuan</td>
            <td>{{$data->kotaTujuan}}</td>
        </tr>
    </table>

    <center>
        <h3>Detail Barang</h3>
    </center>
    <table border=1 width="800px">
        <tr>
            <td>Berat Barang</td>
            <td>{{$data->berat}}</td>
            <td>Panjang Barang</td>
            <td>{{$data->panjang}}</td>
        </tr>
        <tr>
            <td>Berat Volume Barang</td>
            <td>{{$data->beratVol}}</td>
            <td>Tinggi Barang</td>
            <td>{{$data->tinggi}}</td>
        </tr>
    </table>

    <center>
        <h3>Status Pengiriman</h3>
    </center>
    <table border=1 width="800px">
         <tr>
            <td>Keterangan</td>
            <td>{{$data->keterangan}}</td>
            <td>Status</td>
            <td>
                @if($data->statusPengiriman = 0)
                    In Process
                @else($data->statusPengiriman = 1)
                    Done
                @endif
            </td>
        </tr>
    </table>
    <center>
        <h3>Vendor</h3>
    </center>
    <table border=1 width="800px">
    @if($data->vendor == null)
        <tr>
            <th>Vendor</th>
        </tr>
        <tr>
            <th>Tidak Menggunakan Vendor</th>
        </tr>
    @else
        <tr>
            <th>Nama</th>
            <th>Biaya Vendor</th>
        </tr>
        <tr>
            <td>{{$data->vendor}}</td>
            <td>{{$data->totalBiayaVendor}}</td>
        </tr>
        <tr>
            <td colspan=2>Total Biaya</td>
        </tr>
        <tr>
            <td colspan=2>{{$data->totalBiaya}}</td>
        </tr>
    @endif
    </table>

</body>
</html>