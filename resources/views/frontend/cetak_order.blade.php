<!DOCTYPE html>
<html>
<head>
<title>Laporan Penjualan</title>
</head>
<body onload="window.print()">
<!--  -->
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
        <tr>
            <td>
                <p>{{$data->noResi}}</p>
            </td>
        </tr>
    </tbody>
</table>
</body>
</html>