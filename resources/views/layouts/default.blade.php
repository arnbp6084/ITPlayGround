<!DOCTYPE html>
<html class="no-js" lang="en">

@include('includes.head')

<body id="top">
    
    <!-- preloader
    ================================================== -->
    <div id="preloader">
        <div id="loader" class="dots-jump">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>

    <!-- header
    ================================================== -->
    @include('includes.header')

    @yield('content')

    <!-- footer
    ================================================== -->
    @include('includes.footer')

</body>