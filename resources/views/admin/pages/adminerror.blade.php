@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Admin Login') }}</div>

                <div class="card-body">
                    @php
                    echo 'You are not admin. Please login as Admin.</br></br>';
                    @endphp

                    @if( Auth::check() )
                        <a href="{{ route('adminlogout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> Logout </a>

                                <form id="logout-form" action="{{ route('adminlogout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">

    $(function(){        
        //$('#navbarSupportedContent').css('display','none !important');
        $('#navbarSupportedContent').hide();
    })
</script>
