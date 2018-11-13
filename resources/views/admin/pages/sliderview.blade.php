@extends('admin.layouts.default')

@section('content')

<div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Slider Show</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li class="active">Slider Show</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
<div class="content mt-3">

<div class="col-sm-12">


<h1>Show Slider</h1>
<hr>
<form action="/tasks" method="post">
{{ csrf_field() }}
@php
    $imge=$slider['image'];
    if(file_exists( public_path() . "/upload/$imge") && !empty($imge))
         $prflepth="/upload/$imge";
    else
        $prflepth="/images/profile.png";
    @endphp
    <div class="form-group">
        <img style="width:15%;box-shadow: 0px 0px 100px 10px grey;border-radius: 80px 80px 80px 80px;" src="{{ asset($prflepth) }}" alt="Homepage">
    </div>

<div class="form-group">
<label for="title">Slider Title</label>
<input type="text" disabled class="form-control" id="sliderTitle"  value="{{$slider['title']}}" name="title">
</div>
<div class="form-group">
<label for="text1">Slider Text1</label>
<input type="text" disabled class="form-control" id="sliderText1"  value="{{$slider['text1']}}" name="text1">
</div>
<div class="form-group">
<label for="text2">Slider Text2</label>
<input type="text" disabled class="form-control" id="sliderText2"  value="{{$slider['text2']}}" name="text2">
</div>

@if ($errors->any())
<div class="alert alert-danger">
<ul>
@foreach ($errors->all() as $error)
<li>{{ $error }}</li>
@endforeach
</ul>
</div>
@endif
<!-- <button type="submit" class="btn btn-primary">Submit</button> -->
</form>

</div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $('.menu-item-has-children:eq( 6 )').addClass('show');
        $('.sub-menu:eq( 6 )').addClass('show');
        $('.sub-menu:eq( 6 ) a').addClass('activa');
    });
</script>
@endsection
