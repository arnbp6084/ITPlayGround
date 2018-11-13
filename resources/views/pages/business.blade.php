@extends('layouts.other')

@section('content')

  <!-- home
    ================================================== -->
    

    <!-- about
    ================================================== -->
    

    <!-- services
    ================================================== -->
    <section id='services' class="s-services target-section darker">
             
        <div class="row section-header bit-narrow" data-aos="fade-up">
            <div class="col-full">
                
                <h3 class="subhead">My Business</h3>
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
                        @php
                           $userinfo=$user;
                        @endphp
                        
                        <form action="/business" method="POST">
                            
                            @csrf

                            <input id="uid" type="hidden" class="" name="uid" value="{{ $userinfo['id'] }}">
                            <input id="pid" type="hidden" class="" name="pid" value="{{ $pid }}">

                            <div class="form-group row">
                                <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Title') }}</label>

                                <div class="col-md-6">
                                    <input id="title" type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" value="" required autofocus>

                                    @if ($errors->has('title'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('title') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Desription') }}</label>

                                <div class="col-md-6">
                                    <textarea style="color:black;" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" id="contentDescription" name="description" required="required"></textarea>

                                    
                                    @if ($errors->has('description'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('description') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Post your proposal') }}
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