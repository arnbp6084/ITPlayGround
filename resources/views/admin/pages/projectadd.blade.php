@extends('admin.layouts.default')

@section('content')

<div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Project Add</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li class="active">Project Add</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
<div class="content mt-3">

<div class="col-sm-12">


<h1>Add New Project</h1>
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
<form action="/adminproject" method="post" enctype="multipart/form-data">
{{ csrf_field() }}
<div class="form-group">
<label for="name">Project Name</label>
<input type="text" class="form-control" id="projectName"  name="name">
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
<label for="description">Project Description</label>
<textarea class="form-control" id="ProjectDescription" name="description"></textarea>
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
        $('.menu-item-has-children:eq( 0 )').addClass('show');
        $('.sub-menu:eq( 0 )').addClass('show');
        $('.sub-menu:eq( 0 ) a').addClass('activa');
    });
</script>
@endsection
