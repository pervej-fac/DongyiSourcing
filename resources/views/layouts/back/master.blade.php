<!DOCTYPE html>
<html lang="en">

<head>

    @include('layouts.back._head')

</head>

<body>

<div id="wrapper">

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
        @include('layouts.back._header')

        <div class="navbar-default sidebar" role="navigation">
            @include('layouts.back._sideNavbar')
            <!-- /.sidebar-collapse -->
        </div>
        <!-- /.navbar-static-side -->
    </nav>

    <div id="page-wrapper" style="min-height: auto;">
        @yield('content')
    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<!-- jQuery -->
@include('layouts.back._scripts')
<!-- Morris Charts JavaScript -->
@stack('library-js')

@stack('custom-js')


</body>

</html>
