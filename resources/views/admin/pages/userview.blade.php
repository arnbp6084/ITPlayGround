@extends('admin.layouts.default')

@section('content')

<div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>User View</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li class="active">User View</li>
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
<form action="/adminproject" method="post">
{{ csrf_field() }}
<div class="form-group">
<label for="name">User Name</label>
<input disabled type="text" value="{{$user['name']}}" class="form-control" id="UserName"  name="name">
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
<label for="name">User Email</label>
<input id="email" disabled type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $user['email'] }}" disabled>

    @if ($errors->has('email'))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('email') }}</strong>
        </span>
    @endif
</div>

<div class="form-group">
    <label for="name">User Address</label>
    <input id="address" disabled type="text" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" value="{{ $user['address'] }}" disabled autofocus>
    @if ($errors->has('address'))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('address') }}</strong>
        </span>
    @endif
</div>

<div class="form-group">
    <label for="name">User Phone</label>
    <input id="phone" disabled type="text" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" value="{{ $user['phone'] }}" disabled autofocus>

    @if ($errors->has('phone'))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('phone') }}</strong>
        </span>
    @endif
</div>

</form>

</div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $('.menu-item-has-children:eq( 3 )').addClass('show');
        $('.sub-menu:eq( 3 )').addClass('show');
        $('.sub-menu:eq( 3 ) a').addClass('activa');


    });
</script>
@endsection
