@extends('layouts.other')

@section('content')

<style type="text/css">
  .aboutwatermark{
  background:url("/images/services.jpg") center center no-repeat;opacity:0.3;
  opacity: 0.8;
    }
</style>
  <!-- home
    ================================================== -->


    <!-- about
    ================================================== -->
    
        @php
        if((!empty($contentinfobyid[0]['id'])) && ($contentinfobyid[0]['id'] != 3)){ @endphp
            <section id="about" class="s-about target-section aboutwatermark">
               @php echo html_entity_decode($contentinfobyid[0]['description']); @endphp
            </section>
        @php } @endphp        
    


    <!-- services
    ================================================== -->
    


    <!-- works
    ================================================== -->
    


    <!-- clients
    ================================================== -->
    


    <!-- testimonies
    ================================================== -->
   

    <!-- contact
    ================================================== -->
    

@stop