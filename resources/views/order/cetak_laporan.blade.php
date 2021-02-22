@extends('master.layout')
@section('content')
<div class="panel-body">
        <div class="form-group">
            <label for="">Tanggal Awal</label>
            <input type="date" class="form-control" name="tglAwal" id="tglAwal"><br>
            <label for="">Tanggal Akhir</label>
            <input type="date" class="form-control" name="tglAKhir" id="tglAkhir">
            <br>
            <a onclick="this.href='cetak_laporan/'+document.getElementById('tglAwal').value + '/' + document.getElementById('tglAkhir').value "   class="btn btn-primary">Cari</a>
        </div>
</div>
@endsection