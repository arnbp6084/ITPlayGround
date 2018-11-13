@extends('admin.layouts.default')

@section('content')

<div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Slider Add</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li class="active">Slider Add</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
<div class="content mt-3">

<div class="col-sm-12">


<h1>Add New Slider</h1>
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
<form action="/adminslider" method="post" enctype="multipart/form-data">
{{ csrf_field() }}
<div class="form-group">    
<label for="pid">Project name</label>
<select id="pid"  name="pid" class="form-control">
    @foreach($projectlists as $plist)
    <option value="{{ $plist['id'] }}">{{ $plist['name'] }}</option>
    @endforeach
</select>
</div>
<div class="form-group">
<label for="title">Slider Title</label>
<input type="text" class="form-control" id="sliderTitle"  name="title">
</div>
<div class="form-group">
<label for="text1">Slider Text1</label>
<input type="text" class="form-control" id="sliderText1"  name="text1">
</div>
<div class="form-group">
<label for="text2">Slider Text2</label>
<input type="text" class="form-control" id="sliderText2"  name="text2">
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
<label for="name">Status</label><br>
<input type="checkbox" name="status" value="1">
</div>

<button type="submit" class="btn btn-primary">Submit</button>
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
