<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->

@include('admin.includes.head')

<body>

    @include('admin.includes.sidebar')

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        @include('admin.includes.header')

        @yield('content')

    </div><!-- /#right-panel -->

    <!-- Right Panel -->

    @include('admin.includes.footer')

</body>

</html>











