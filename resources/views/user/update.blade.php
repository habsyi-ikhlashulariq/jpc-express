@extends('master.layout')
@section('content')
<div class="panel panel-profile">
    <div class="clearfix">
        <!-- LEFT COLUMN -->
        <div class="profile-left">
            <!-- PROFILE HEADER -->
            <div class="profile-header">
                <div class="overlay"></div>
                <div class="profile-main">
                    <img src="{{ asset('/user_profile/'.Auth::user()->avatar) }}" class="img-circle" alt="Avatar" style="width:90px; height=107px;">
                    
                </div>
                <div class="profile-stat">
                    <div class="row">
                    <h3 class="name">{{ $user->name }}</h3>
                    <span class="online-status status-available">Available</span>
                    
                    </div>
                    
                </div>
            </div>
            <div class="profile-detail">
                <div class="profile-info">
                    <h4 class="heading"></h4>
                    <ul class="list-unstyled list-justify" style="text-align: center;">
                        <li><a href="{{ url('profile/ubah/password') }}" class="btn btn-primary">Change Password</a></li>
                        <li><a href="{{ url('profile/ubah') }}" class="btn btn-primary">Update Profil</a></li>
                    </ul>
                </div>
            </div>
            
        </div>
        <!-- END LEFT COLUMN -->
        <!-- RIGHT COLUMN -->
        <div class="profile-right" style="height: 460px;">
        <!-- AWARDS -->
            <div class="profile-detail">
                <div class="profile-info">
                    <h4 class="heading" style="margin-top: -50px;">My Profile</h4>
                    <ul class="list-unstyled list-justify">
                       <form action="{{ url('/profile/update') }}" method="POST" enctype="multipart/form-data">
                       {{ csrf_field() }}
                        {{ method_field('PUT') }}
                            <li>Nama <br>
                                <input class="form-control" type="text" name="name" value="{{$user->name}}">
                            </li>
                            <li>Jenis Kelamin : <br>
                            <select class="form-control" name="gender" >
                                @foreach($jk as $jk)
                                    @if($jk == $user->gender)
                                        <option value="{{$jk}}" selected>{{$jk}}</option>
                                    @else
                                        <option value="{{$jk}}">{{$jk}}</option>
                                     @endif
                                @endforeach
                            </select>
                            </li>
                            <li>Email : <br>
                                <input class="form-control" type="text" name="email" value="{{$user->email}}">
                            </li>
                            <li>Telp : <br>
                                <input class="form-control" type="text" name="telp" value="{{$user->telp}}">
                            </li> 
                            <li>Alamat : <br>
                                <input class="form-control" type="text" name="address" value="{{$user->address}}">
                            </li> 
                            <li>Foto :<br>
                            <input type="file" name="avatar"><br>
                                <input class="btn btn-primary" type="submit" name="simpan" value="Simpan">
                                <input class="form-control" type="hidden" name="id" value="{{$user->id}}">
                            </li>
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