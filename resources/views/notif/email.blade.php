<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Postingan Baru</title>
</head>
<body>
    <img src="{{ asset('user_profile/default.png') }}" alt="">
    <h4>Hai, {{ $namaCustomer }}</h4>
    <p>Selamat pengiriman barang anda sedang diproses, 
    dengan penerima paket atas nama {{ $penerima}}, dan dikirim ke alamat {{$alamatPenerima }}. untuk  melacak pesanan anda bisa dengan nomor resi <b>{{$penjualan_id}}<b> </p>
</body>
</html>