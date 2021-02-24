@extends('master.layout')
@section('content')

        <div class="profile-right" style="height: 320px;">
        <!-- AWARDS -->
            <div class="profile-detail">
                <div class="profile-info">
                    <h4 class="heading" style="margin-top: -50px;">Update Password</h4>
                    <ul class="list-unstyled list-justify">
                        <form action="{{ url('/cek/') }}" method="get">
                        {{ csrf_field() }}
                            <li>Password Lama : <br>
                                <input class="form-control" type="text" name="cari">
                            </li>
                            @if($data->isEmpty())
                                <p>Data Tidak Ada</p>
                            @else
                                {{$data}}
                            @endif
                        <input class="btn btn-primary" type="submit" name="simpan" value="Simpan">
                    </form>
            </ul>
                </div>
            </div>
            <!-- END AWARDS -->
            
        </div>
        <!-- END RIGHT COLUMN -->
    </div>
</div>
@endsection  
