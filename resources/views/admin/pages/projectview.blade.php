@extends('admin.layouts.default')

@section('content')

<div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Project Show</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li class="active">Project Show</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
<div class="content mt-3">

<div class="col-sm-12">


<h1>Show Project</h1>
<hr>
<form action="/tasks" method="post">
{{ csrf_field() }}
<div class="form-group">
<label for="title">Project Name</label>
<input type="text" disabled class="form-control" id="taskTitle"  value="{{$project['name']}}" name="name">
</div>
<div class="form-group">
<label for="description">Project Description</label>
<!-- <input type="text" class="form-control" id="taskDescription" name="description"> -->
<div class="col-sm-10" style="margin: 2%;">
@php
echo html_entity_decode($project['description']);
@endphp
</div>

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
        $('.menu-item-has-children:eq( 0 )').addClass('show');
        $('.sub-menu:eq( 0 )').addClass('show');
        $('.sub-menu:eq( 0 ) a').addClass('activa');
    });
</script>
@endsection
