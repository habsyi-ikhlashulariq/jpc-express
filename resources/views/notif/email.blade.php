<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pengiriman Paket</title>
</head>
<body>
    <h4>Pelanggan YTH, {{ $namaCustomer }}</h4>
    <p>Selamat, Paket anda sedang kami proses untuk pengiriman ,<br> 
    paket diproses pada tanggal {{ $tanggal }}paket dengan nomor <br> resi <b>{{$penjualan_id}}</b>, bisa ditrace dalam website kita yaitu <a href="">JPC EXpress</a></p>

    <p>Paket dikirim dari kota {{ $kotaAsal }} dengan tujuan akhir {{ $kotaTujuan }} <br> penerima paket atas nama saudara/i,<b> {{ $penerima}} </b>, dengan alamat lengkap yaitu <br> {{ $alamatPenerima }} berikut detail barang yang dikirimkan :<p>
    <table>
        <tr>
            <th>Berat Barang</th>
            <th>Panjang Barang</th>
            <th>Status Pengiriman</th>
        </tr>
        <tr>
            <td>{{ $berat}}</td>
            <td>{{ $panjang}}</td>
            <td>{{ $keterangan}}</td>
        </tr>
    </table>
    <p>Terima kasih telah menggunakan JPC Express untuk pengiriman paket anda, mohon <br> untuk ditunggu, apabila ada permasalahan dengan pengiriman anda, <br> silahkan ulangi Email ini.</p>

    <h3>
    Hormat Kami </h3>
    <br><br>
    <p>JPC Expreess</p>
</body>
</html>