@extends('master.layout')
@section('content')

        <div class="panel panel-profile">
            <div class="clearfix">
                <!-- LEFT COLUMN -->
                <div class="profile-left">
                    <!-- PROFILE HEADER -->
                    @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}                        
                    </div>
                    @endif
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
                    
                <div class="profile-right" style="height: 320px;">
                <!-- AWARDS -->
                    <div class="profile-detail">
                        <div class="profile-info">
                            <h4 class="heading" style="margin-top: -50px;">Update Password</h4>
                            <ul class="list-unstyled list-justify">
                                <form action="{{ url('/profile/update/password') }}" method="POST">
                                {{ csrf_field() }}
                                {{ method_field('PUT') }}
                                    <li>Password Lama : <br>
                                        <input class="form-control" type="password" name="old_password">

                                        @error('old_password')
                                            <div class="text-danger">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </li>
                                        <li>Password Baru : <br>
                                        <input class="form-control" type="password" name="password">

                                        @error('password')
                                            <div class="text-danger">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </li>
                                    <li>Konfirmasi Passowrd : <br>
                                        <input class="form-control" type="password" name="password_confirmation"><br>

                                        @error('password_confirmation')
                                            <div class="text-danger">
                                                {{ $message }}
                                            </div>
                                        @enderror

                                        <input class="btn btn-primary" type="submit" name="simpan" value="Simpan">
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
