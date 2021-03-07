<!DOCTYPE html>
<html>
<head>
<title>Laporan Penjualan</title>
</head>
<body>
<?php
    header("Content-type: application/vnd.ms-word");
    header("Content-Disposition: attachment;Filename=Mutasi_Siswa_.doc");
    
?>
    <h1 style="text-align:center;">Report Penjualan</h1>
<table border="1" style="text-align: center;">
    <thead>
        <tr>
            <th rowspan="2">No</th>
            <th rowspan="2"> No Resi</th>
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
            <td>{{$data->penjualan_id}}</td>
        </tr>
        <tr>
            <td colspan="13" style="background-color:grey;">Total Biaya</td>
            <td>
            <td colspan="10"></td>
        </tr>
    @endforeach
    </tbody>
</table>
</body>
</html>