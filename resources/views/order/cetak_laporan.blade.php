@extends('master.layout')
@section('content')
<div class="panel-body">
    <form action="{{ url('/admin/order/cetak_laporan') }}" method="post">
    {{ csrf_field() }}
        <div class="form-group">
            <label for="">Tanggal Awal</label>
            <input type="date" class="form-control" name="tglAwal" id="tglAwal"><br>
            <label for="">Tanggal Akhir</label>
            <input type="date" class="form-control" name="tglAkhir" id="tglAkhir">
            <br>
            <!-- <a onclick="this.href='cetak_laporan/'+document.getElementById('tglAwal').value + '/' + document.getElementById('tglAkhir').value "   class="btn btn-primary">Cari</a> -->
            <input type="submit" value="submit" class="btn btn-primary">
        </div>
    </form>
</div>
@endsection