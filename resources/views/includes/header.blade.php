<header class="s-header">
@php
$uid='';
$nme=session()->get('name');
if(!empty(Auth::user()->id)){
    $uid=Auth::user()->id;
}
$pid='';
if(!empty($projectinfobyid['id'])){
    $pid=$projectinfobyid['id'];
}

@endphp


        <div class="header-logo">
            <a class="site-logo" href="{{ route('home') }} ">
                <img src="{{ URL::asset('images/lgo1.png') }}" alt="Homepage">
            </a>
        </div> <!-- end header-logo -->
        
        <input id="usrid" type="hidden" class="" name="usrid" value="{{ $uid }}">
        <input id="pid" type="hidden" class="" name="pid" value="{{ $pid }}">

        <div class="dropdown">
          <button class="dropbtn">Welcome {{{ $nme or 'Guest' }}}</button>
          <!-- Auth::user()->name -->
          <div class="dropdown-content">
            <!-- <a href="#">Sign In</a> -->
            <!--Call your modal-->
            @if( !Auth::check() )
            <a id="" href="#" data-toggle="modal" data-target="#signinmodal">Sign In</a>
            <a id="" href="#" data-toggle="modal" data-target="#signupmodal">Sign Up</a>
            <!-- <a href="#">Sign Up</a> -->
            @endif
            @php
            if( Auth::check() ){
             $uid=Session::get('id'); @endphp
            
            <a href="{{ url('profile/'.$uid.'/edit') }}">Profile</a>
            <!-- <a href="#">Log Out</a> -->

            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> Logout </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>
            @php } @endphp
          </div>
        </div>

        <nav class="header-nav">
            
            <a href="#0" class="header-nav__close" title="close"><span>Close</span></a>

            <h3>Navigate to</h3>

            <div class="header-nav__content">
                
                <ul class="header-nav__list">
                    <li><a class=""  href="{{ route('home') }}" title="home">Home</a></li>
                    @php
                    if(!empty($contentallinfo)){ 
                    @endphp
                        @foreach ($contentallinfo as $contentall)
                          @php
                            $contentname=$contentall['title'];
                            $contentid=$contentall['id'];
                          @endphp
                        <a class=""  href="{{ url('content/'.$contentid) }}" title="{{ $contentname }}">{{ ucwords($contentname) }}</a>
                        @endforeach
                    @php }else{ 
                        echo 'No content';
                    } @endphp
                    
                    {{-- <!-- <li><a class=""  href="{{ route('about') }}" title="about">About</a></li>
                    <li><a class=""  href="{{ route('services') }}" title="services">Services</a></li>                    
                    <li><a class=""  href="{{ route('contact') }}" title="contact">Contact</a></li> -->
                    <!-- <li><a class=""  href="{{ route('works') }}" title="works">Works</a></li> --> --}}

                    
                    <li><a class="allcourses" href="#" title="services">All Courses >></a></li>
                    <p class="subcourses" style="display: none; padding: 5%; font-size: 18px;">  
                        @php
                        if(!empty($projectinfo)){ 
                        @endphp
                            @foreach ($projectinfo as $proj)
                              @php
                                $projname=$proj['name'];
                                $projid=$proj['id'];
                              @endphp
                            <a class=""  href="{{ url('courses/'.$projid) }}" title="{{ $projname }}">{{ $projname }}</a>
                            @endforeach
                        @php }else{ 
                            echo 'No course';
                        } @endphp
                       
                    </p>
                    
                </ul>
    
                <!-- <p>Perspiciatis hic praesentium nesciunt. Et neque a dolorum <a href='#0'>voluptatem</a> porro iusto sequi veritatis libero enim. Iusto id suscipit veritatis neque reprehenderit.</p>
    
                <ul class="header-nav__social">
                    <li>
                        <a href="#0"><i class="fab fa-facebook"></i></a>
                    </li>
                    <li>
                        <a href="#0"><i class="fab fa-twitter"></i></a>
                    </li>
                    <li>
                        <a href="#0"><i class="fab fa-instagram"></i></a>
                    </li>
                    <li>
                        <a href="#0"><i class="fab fa-behance"></i></a>
                    </li>
                    <li>
                        <a href="#0"><i class="fab fa-dribbble"></i></a>
                    </li>
                </ul> -->

            </div> <!-- end header-nav__content -->

        </nav> <!-- end header-nav -->

        <a class="header-menu-toggle" href="#0">
            <span class="header-menu-icon"></span>
        </a>

    </header> <!-- end s-header -->

    <!-- signin modal-->
      <div class="modal fade" id="signinmodal" role="dialog">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header box">
              <a href="#">
                  <img class="close" data-dismiss="modal" src="http://cdn3.iconfinder.com/data/icons/iconic-1/32/x_alt-128.png" alt="X" />
              </a>
              <h4 class="modal-title">{{ __('Login') }}</h4>
            </div>
            <div class="modal-body">
              <div class="card">
                    <div class="card-header"></div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="email" class="col-sm-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <!-- <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label> -->
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Login') }}
                                    </button>

                                    <a id="fyp" href="#" data-toggle="modal" data-target="#forgotpasswordmodal" class="btn btn-link">{{ __('Forgot Your Password?') }}</a>

                                    <!-- <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a> -->
                                </div>
                            </div>
                        </form>
                    </div>
              </div>
            </div>
            <div class="modal-footer">
              <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
              Powered by IT PlayGround
            </div>
          </div>
        </div>
      </div>


    <!-- signup modal-->
      <div class="modal fade" id="signupmodal" role="dialog">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header box">
              <a href="#">
                  <img class="close" data-dismiss="modal" src="http://cdn3.iconfinder.com/data/icons/iconic-1/32/x_alt-128.png" alt="X" />
              </a>
              <h4 class="modal-title">{{ __('Register') }}</h4>
            </div>
            <div class="modal-body">
              
                <div class="card">
                  <div class="card-header"></div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('register') }}" aria-label="{{ __('Register') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

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
                                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>

                                <div class="col-md-6">
                                    <input id="address" type="text" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" value="{{ old('address') }}" required autofocus>

                                    @if ($errors->has('address'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('address') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Phone') }}</label>

                                <div class="col-md-6">
                                    <input id="phone" type="text" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" value="{{ old('phone') }}" required autofocus>

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
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>


            </div>
            <div class="modal-footer">
              <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
              Powered by IT PlayGround
            </div>
          </div>
        </div>
      </div>


    <!-- forgotpassword modal-->
      <div class="modal fade" id="forgotpasswordmodal" role="dialog">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header box">
              <a href="#">
                  <img class="close" data-dismiss="modal" src="http://cdn3.iconfinder.com/data/icons/iconic-1/32/x_alt-128.png" alt="X" />
              </a>
              <h4 class="modal-title">{{ __('Forgot Password') }}</h4>
            </div>
            <div class="modal-body">
              
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}" aria-label="{{ __('Reset Password') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>


            </div>
            <div class="modal-footer">
              <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
              Powered by IT PlayGround
            </div>
          </div>
        </div>
      </div>


    <!-- enrol modal-->
      <div class="" id="enrolmodal" style="display: none;">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header box">
              <a href="#">
                  <img class="close" data-dismiss="modal" src="http://cdn3.iconfinder.com/data/icons/iconic-1/32/x_alt-128.png" alt="X" />
              </a>
              <h4 class="modal-title">{{ __('Enrol here') }}</h4>
            </div>
            <div class="modal-body">
              
                <div class="card">
                  <div class="card-header"></div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('register') }}" aria-label="{{ __('Register') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

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
                                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>

                                <div class="col-md-6">
                                    <input id="address" type="text" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" value="{{ old('address') }}" required autofocus>

                                    @if ($errors->has('address'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('address') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Phone') }}</label>

                                <div class="col-md-6">
                                    <input id="phone" type="text" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" value="{{ old('phone') }}" required autofocus>

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
                                        {{ __('Enrol Now') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>


            </div>
            <div class="modal-footer">
              <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
              Powered by IT PlayGround
            </div>
          </div>
        </div>
      </div>


      <div class="contactus">
        <div class="card-header" style="background-color: #4CAF50 !important;">
            <div class="incont">
                <a data-id="0" class="contactus-min"><img src="{{ URL::asset('images/min.png') }}" alt="Homepage"></a>
                <a data-id="0" class="contactus-close"><img src="{{ URL::asset('images/closecontact.jpg') }}" alt="Homepage"></a>
            </div>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('contactus') }}" aria-label="{{ __('Contact Us') }}">
                            @csrf
                            <input id="usid" type="hidden" class="" name="usid" value="{{ $uid }}">
                            
                            <div class="form-group row">

                                <div class="col-md-12">
                                    <input placeholder="Enter title" id="title" type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" value="{{ old('title') }}" required>

                                    @if ($errors->has('title'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('title') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>            
                            <div class="form-group row">

                                <div class="col-md-12">
                                    <textarea placeholder="Enter message" id="message" class="form-control{{ $errors->has('message') ? ' is-invalid' : '' }}" name="message" rows="2" value="" required></textarea>
                                    @if ($errors->has('message'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('message') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>            
                            <div class="form-group row mb-0">
                                <div class="col-md-12 offset-md-4">
                                    <button id="contactussubmit" type="submit" class="btn btn-primary">
                                        {{ __('Contact') }}
                                    </button>
                                </div>
                            </div>
            </form>
        </div>
      </div>

    <!-- script
    ================================================== -->    
        
    <script>
    $(document).ready(function(){
        $('#fyp').click(function(){
            $('#signinmodal .close').click();
        });

        $(".chngepass").click(function(){
            //alert('liuoiuoiu');
            $(".chngepasssec").slideToggle();
        });

        $('.setpass').click(function(e){
            //alert($('#passwordchange').val());
            if($('#passwordchange').val() != ''){
               e.preventDefault();
               /*$.ajaxSetup({
                  headers: { 'csrftoken' : '{{ csrf_token() }}' }
              });*/
               /*alert($('#uid').val());
               alert($('#passwordchange').val());*/
               var token = "{{ csrf_token() }}";
                $.ajax({
                  url: "{{ route('formSubmit') }}",
                  method: 'POST',
                  dataType: 'json',
                  data: {'_token':token,'password':$('#passwordchange').val(),'uid':$('#uid').val()},
                  success: function(result){
                    //alert('success');
                     alert(result.success);
                     $(".chngepasssec").slideToggle();
                     /*$('.alert').show();
                     $('.alert').html(result.success);*/
                  }});
            }else{
                alert('Set a password to change new.');
                return false;
            }
        });
        //submenu
        $(".allcourses").click(function(){
            $(".subcourses").slideToggle();
            return false;
        }); 

        $(".enrollnow").click(function(){
            //alert('clicked');
            if($("#usrid").val() != ''){
                if($("#pid").val() != ''){
                    enrollherenow();
                    //alert('in')
                }else{
                    alert('There went something wrong. Project not found.');    
                    return false;
                }
            }else{
                //$("#enrolmodal").slideDown();
                alert('Please login to enroll.');
                return false;
            }
        }); 

        //contactusform
        $(".contactus-min").click(function(){
            if($(this).attr('data-id') == '1'){
                $('.contactus-min img').attr("src","{{ URL::asset('images/min.png') }}" );
                $('.contactus').css('top','49%');
                $(this).attr('data-id','0');
            }else{
                $('.contactus-min img').attr("src","{{ URL::asset('images/max.png') }}" );
                $('.contactus').css('top','95%');
                $(this).attr('data-id','1');
            }
            return false;
        });


        $(".contactus-close").click(function(){
                $('.contactus').remove();
            return false;
        });

        $('#contactussubmit1').click(function(e){
            //alert($('#passwordchange').val());
            if($('#usrid').val() != ''){
               e.preventDefault();
               /*$.ajaxSetup({
                  headers: { 'csrftoken' : '{{ csrf_token() }}' }
              });*/
               /*alert($('#uid').val());
               alert($('#passwordchange').val());*/
               var token = "{{ csrf_token() }}";
                $.ajax({
                  url: "{{ route('formSubmit') }}",
                  method: 'POST',
                  dataType: 'json',
                  data: {'_token':token,'password':$('#passwordchange').val(),'uid':$('#uid').val()},
                  success: function(result){
                    //alert('success');
                     alert(result.success);
                     $(".chngepasssec").slideToggle();
                     /*$('.alert').show();
                     $('.alert').html(result.success);*/
                  }});
            }else{
                alert('Please login for this.');
                return false;
            }
        });

        
    });

    function enrollherenow(){
       var token = "{{ csrf_token() }}";
        $.ajax({
          url: "{{ route('enrollYou') }}",
          method: 'POST',
          dataType: 'json',
          data: {'_token':token,'usrid':$('#usrid').val(),'pid':$('#pid').val()},
          success: function(result){
            //alert('success');
             alert(result.success);
        }});
    }
    </script>