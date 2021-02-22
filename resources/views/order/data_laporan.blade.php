<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan</title>
    <style>
        img{
            width: 90px;
            height: 107px;
        }
    </style>
 
</head>
<body onload="window.print()">
    <?php
    header("Content-type: application/vnd.ms-word");
    header("Content-Disposition: attachment;Filename=Laporan.xls");
    
?>
  <table>
  <thead>
            <tr>
                <th>Nomor Resi</th>
                <th>Tanggal Order</th>
                <th>Harga Per Kg</th>
                <th>Penerima</th>
            </tr>
        </thead>

        <tbody>
            @foreach($data as $data)
                <tr>
                    <td>{{ $data->noResi }}</td>
                    <td>{{ $data->tanggal }}</td>
                    <td>{{ $data->hargaKg }}</td>
                    <td>{{ $data->penerima }}</td>
                </tr>
            @endforeach
        </tbody>
  </table>
</body>
</html>