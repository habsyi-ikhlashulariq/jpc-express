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
										<img src="{{ asset('user_profile/'.Auth::user()->avatar) }}"  style="width:90px; height=107px; " class="img-circle" alt="Avatar">
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
											<li><a href="" class="btn btn-primary">Change Password</a></li>
                                            <li><a href="{{ url('profile/ubah') }}" class="btn btn-primary">Update Profil</a></li>
										</ul>
									</div>
								</div>
								
							</div>
							<!-- END LEFT COLUMN -->
							<!-- RIGHT COLUMN -->
							<div class="profile-right" style="height: 310px;">
							<!-- AWARDS -->
								<div class="profile-detail">
									<div class="profile-info">
                                    <h4 class="heading" style="margin-top: -50px;">Profil Saya</h4>
										<ul class="list-unstyled list-justify">
											<li>Kode Admin <span>{{$user->id}}</span></li>
											<li>Nama <span>{{$user->name}}</span></li>
											<li>Jenis Kelamin <span>{{$user->gender}}</span></li>
											<li>Email <span>{{$user->email}}</span></li>
											<li>Password <span>***</span></li>
											<li>Telp <span>{{$user->telp}}</span></li>
											<li>Alamat <span>{{$user->address}}</span></li>
										</ul>
									</div>
								</div>
								<!-- END AWARDS -->
								
							</div>
							<!-- END RIGHT COLUMN -->
						</div>
					</div>
@endsection        
		