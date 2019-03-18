<!DOCTYPE html>
<html>
    @include('templates.partials._head')

    <body class="hold-transition skin-green-light sidebar-mini">
    <div class="wrapper">
    
        @include('templates.partials._header')
      <!-- Left side column. contains the logo and sidebar -->
    
        @include('templates.partials._aside')
        <div class="content-wrapper">
        @yield('content')
        </div>
 
        @include('templates.partials._footer') 
    </div>
<!-- ./wrapper -->

    @include('templates.partials._scripts') 
    </body>
</html>
