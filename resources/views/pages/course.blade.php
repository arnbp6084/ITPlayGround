@extends('layouts.other')

@section('content')

@php

@endphp
  <!-- home
    ================================================== -->
    

    <!-- about
    ================================================== -->
    
<style type="text/css">
  .serviceswatermark{
  background:url("/images/services.jpg") center center no-repeat;opacity:0.6;
  opacity: 0.8;
    }
    .display-1 li { color: #fff; }
</style>
    <!-- services
    ================================================== -->
    <section id="" class="s-services target-section darker serviceswatermark">

        <div class="row section-header bit-narrow" data-aos="fade-up">
            <h1 class="subhead">Our Courses {{ $projectinfobyid['name'] }}</h1>
            @php
            echo html_entity_decode($projectinfobyid['description']);
            @endphp
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