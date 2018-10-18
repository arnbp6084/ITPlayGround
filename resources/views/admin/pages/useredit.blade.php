@extends('admin.layouts.default')

@section('content')

<div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>User Add</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li class="active">User Add</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
<div class="content mt-3">

<div class="col-sm-12">


<h1>Add New User</h1>
@if ($errors->any())
<div class="alert alert-danger">
<ul>
@foreach ($errors->all() as $error)
<li>{{ $error }}</li>
@endforeach
</ul>
</div>
@endif
<hr>
<form action="{{url('adminuser', [$user['id']])}}" method="POST" enctype="multipart/form-data">
<input type="hidden" name="_method" value="PUT">
{{ csrf_field() }}
<div class="form-group">
<label for="name">User Name</label>
<input autofocus type="text" value="{{$user['name']}}" class="form-control" id="UserName"  name="name">
</div>

@php
$imge=$user['image'];
if(file_exists( public_path() . "/upload/$imge") && !empty($imge))
     $prflepth="/upload/$imge";
else
    $prflepth="/images/profile.png";
@endphp
<div class="form-group">
    <img style="width:15%;box-shadow: 0px 0px 100px 10px grey;border-radius: 80px 80px 80px 80px;" src="{{ asset($prflepth) }}" alt="Homepage">
</div>

<div class="form-group">
    <input id="image" type="file" class="form-control{{ $errors->has('image') ? ' is-invalid' : '' }}" name="image" value="{{$user['image']}}">

    @if ($errors->has('image'))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('image') }}</strong>
        </span>
    @endif
</div>

<div class="form-group">
<input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $user['email'] }}" >

    @if ($errors->has('email'))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('email') }}</strong>
        </span>
    @endif
</div>

<div class="cont" style="width: 100%; margin-left: 2%;">
    <input id="uid" type="hidden" class="" name="uid" value="{{ Auth::user()->id }}">
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

<div class="form-group">
    <input id="address" type="text" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" value="{{ $user['address'] }}" >
    @if ($errors->has('address'))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('address') }}</strong>
        </span>
    @endif
</div>

<div class="form-group">
    <input id="phone" type="text" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" value="{{ $user['phone'] }}" >

    @if ($errors->has('phone'))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('phone') }}</strong>
        </span>
    @endif
</div>


<button type="submit" class="btn btn-primary">Submit</button>
</form>

</div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $('.menu-item-has-children:eq( 3 )').addClass('show');
        $('.sub-menu:eq( 3 )').addClass('show');
        $('.sub-menu:eq( 3 ) a').addClass('activa');

        //changepassword
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
    });
</script>
@endsection
