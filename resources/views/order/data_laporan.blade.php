<!DOCTYPE html>
<html>
<head>
<title>Laporan Penjualan</title>
</head>
<body>
    <h1 style="text-align:center;">Report Penjualan</h1>
<table border="1" style="text-align: center;">
    <thead>
        <tr>
            <th rowspan="2">No</th>
            <th rowspan="2"> Tanggal</th>
            <th rowspan="2"> No Resi</th>
            <th colspan="2"> Code</th>
            <th rowspan="2"> Pengirim </th>
            <th rowspan="2"> Penerima </th>
            <th rowspan="2"> Alamat Penerima </th>
            <th rowspan="2"> Jenis </th>
            <th rowspan="2"> Metode Pembayaran </th>
            <th rowspan="2"> Koli </th>
            <th rowspan="2"> Berat </th>
            <th rowspan="2"> Harga/KG </th>
            <th rowspan="2"> Total Biaya </th>
            <th rowspan="2" style="background-color:yellow"> Vendor </th>
            <th rowspan="2" style="background-color:yellow"> No Resi Vendor </th>
            <th rowspan="2" style="background-color:yellow"> Harga  </th>
            <th rowspan="2" style="background-color:yellow"> Total Biaya  </th>
            <th rowspan="2"> B. Packing  </th>
            <th rowspan="2"> B. Asuransi  </th>
            <th rowspan="2"> B. Bongkar  </th>
            <th rowspan="2"> Selisih  </th>
        </tr>
        <tr>
            <th> Origin</th>
            <th> Dest </th>
        </tr>
    </thead>
    <tbody>
    @foreach($data as $data)
        <tr>
            <td><?php $no=1; echo $no++; ?></td>
            <td>{{$data->tanggal}}</td>
            <td>{{$data->penjualan_id}}</td>
            <td>{{$data->kotaAsal}}</td>
            <td>{{$data->kotaTujuan}}</td>
            <td>{{$data->namaCustomer}}</td>
            <td>{{$data->penerima}}</td>
            <td>{{$data->alamatPenerima}}</td>
            <td>{{$data->jenisPembayaran}}</td>
            <td>{{$data->jenisPembayaran}}</td>
            <td>{{$data->kuli}}</td>
            <td>{{$data->berat}}</td>
            <td>{{$data->hargaKg}}</td>
            <td>
                <?php 
                $total_biaya = $data->berat * $data->hargaKg;
                echo $total_biaya ?>
            </td>
            <td>{{$data->vendor}}</td>
            <td>{{$data->resi_vendor}}</td>
            <td>harga</td>
            <td>total biaya</td>
        </tr>
        <tr>
            <td colspan="13" style="background-color:grey;">Total Biaya</td>
            <td>
            <?php 
                $total_biaya = $data->berat * $data->hargaKg;
                echo $total_biaya
                 ?>
            </td>
            <td colspan="10"></td>
        </tr>
    @endforeach
    </tbody>
</table>
</body>
</html>