@extends('layouts.other')

@section('content')

  <!-- home
    ================================================== -->
    

    <!-- about
    ================================================== -->
    

    <!-- services
    ================================================== -->
    <section id='services' class="s-services target-section darker">
             @php
               $userinfo=$user;
               $prflepth='';
               
             @endphp
        <div class="row section-header bit-narrow" data-aos="fade-up">
            <div class="col-full">
                @php
                if (file_exists( public_path() . "/upload/$userinfo->image") && !empty($userinfo->image))
                     $prflepth="/upload/$userinfo->image";
                else
                    $prflepth="/images/profile.png";
                @endphp

                <img style="width:15%;box-shadow: 0px 0px 100px 10px grey;border-radius: 80px 80px 80px 80px;" src="{{ asset($prflepth) }}" alt="Homepage">
                <br><br>
                <h3 class="subhead">My Profile</h3>
                <div class="card">
                   
                  <div class="card-header"></div>

                    <div class="card-body">
                        @if (session('status'))
                            <div id="siteMsg" class="alert alert-success" role="alert">
                            <!-- <div class="alert alert-success" role="alert"> -->
                                {{ session('status') }}
                            </div>
                        @endif
                        @php Session::forget(['status']) @endphp
                        <script type="text/javascript">
                            $("#siteMsg").show().delay(10000).fadeOut();    
                        </script>

                        <!-- <form method="POST" action="{{ url('profile/update/'.$userinfo->id) }}" aria-label="{{ __('Register') }}"> -->

                        <form action="{{url('profile', [$userinfo->id])}}" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="_method" value="PUT">
                            
                            @csrf

                            <input id="uid" type="hidden" class="" name="uid" value="{{ $userinfo['id'] }}">

                            <div class="form-group row">
                                <label for="image" class="col-md-4 col-form-label text-md-right">{{ __('My Image') }}</label>

                                <div class="col-md-6">
                                    <input id="image" type="file" class="form-control{{ $errors->has('image') ? ' is-invalid' : '' }}" name="image" value="">

                                    @if ($errors->has('image'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('image') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $userinfo['name'] }}" required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $userinfo['email'] }}" required>

                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <!--change password-->
                            <div class="cont" style="width: 100%; margin-left: 2%;">
                                <div class="form-group row">
                                    <div class="col-md-6 offset-md-4">
                                        <input type="button" class="btn btn-primary chngepass"/ value="{{ __('Change Password') }}">
                                        <!-- <button class="btn btn-primary chngepass">
                                            {{ __('Change Password') }}
                                        </button> -->
                                    </div>
                                    <label class="col-md-4 col-form-label text-md-right"></label>
                                </div>

                                <div class="form-group row chngepasssec" style="margin-top: 2%; margin-bottom: 2%; display: none;">
                                        <label class="col-md-4 col-form-label text-md-right">{{ __('New Password') }}</label>
                                        <div class="col-md-6">
                                            <input style="box-shadow: 0px 0px 200px 0px silver;" id="passwordchange" type="text" class="form-control" name="" value="">

                                            <button class="btn btn-primary setpass">
                                                {{ __('Set Password') }}
                                            </button>
                                        </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>

                                <div class="col-md-6">
                                    <input id="address" type="text" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" value="{{ $userinfo['address'] }}" required autofocus>

                                    @if ($errors->has('address'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('address') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Phone no.') }}</label>

                                <div class="col-md-6">
                                    <input id="phone" type="text" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" value="{{ $userinfo['phone'] }}" required autofocus>

                                    @if ($errors->has('phone'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('phone') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Edit Profile') }}
                                    </button>
                                    
                                </div>
                            </div>

                        </form>
                        
                    </div>
                </div>
            </div>
        </div> <!-- end section-header -->

         <!-- end services -->

    </section> <!-- end s-services -->


    <!-- works
    ================================================== -->
    

    <!-- clients
    ================================================== -->
    

    <!-- testimonies
    ================================================== -->
    

    <!-- contact
    ================================================== -->
    

@stop