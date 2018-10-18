@extends('admin.layouts.default')

@section('content')

<div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Content Edit</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li class="active">Content Edit</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
<div class="content mt-3">

<div class="col-sm-12">
<h1>Edit content</h1>
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
<form action="{{url('admincontent', [$content['id']])}}" method="POST" enctype="multipart/form-data">
<input type="hidden" name="_method" value="PUT">
{{ csrf_field() }}
<div class="form-group">
<label for="name">Content title</label>
<input type="text" value="{{$content['title']}}" class="form-control" id="contenttitle"  name="title">
</div>

@php
	$imge=$content['images'];
	if(file_exists( public_path() . "/upload/$imge") && !empty($imge))
	     $prflepth="/upload/$imge";
	else
	    $prflepth="/images/profile.png";
	@endphp
	<div class="form-group">
		<img style="width:15%;box-shadow: 0px 0px 100px 10px grey;border-radius: 80px 80px 80px 80px;" src="{{ asset($prflepth) }}" alt="Homepage">
	</div>

<div class="form-group">
    <input id="image" type="file" class="form-control{{ $errors->has('image') ? ' is-invalid' : '' }}" name="image" value="">

    @if ($errors->has('image'))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('image') }}</strong>
        </span>
    @endif
</div>

<div class="form-group">
<label for="description">Content Description</label>
<textarea class="form-control" id="contentDescription" name="description">{{$content['description']}}</textarea>
</div>
<div class="form-group">
<label for="name">Status</label><br>
@if($content['status'] == 1)
<input id="check" type="checkbox" checked name="status" value="1">
@else
<input id="check" type="checkbox" name="status" value="0">
@endif
</div>

<button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        $('.menu-item-has-children:eq( 1 )').addClass('show');
        $('.sub-menu:eq( 1 )').addClass('show');
        $('.sub-menu:eq( 1 ) a').addClass('activa');

        
    });
</script>
@endsection
