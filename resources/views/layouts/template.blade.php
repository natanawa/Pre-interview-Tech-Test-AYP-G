<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>{{ config('app.name', 'Pre-interview Tech Test') }}</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{ asset("css/bootstrap.min.css") }}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{ asset("css/simple-sidebar.css") }}" rel="stylesheet">

    <!-- jQuery -->
    <script src="{{ asset("js/jquery-2.1.4.js") }}"></script>
</head>

<body>
    <div id="wrapper">
        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            @include('partials.sidebar')
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">

            <div class="container-fluid">
                <div class="page-header">
                    <h1>{{ config('app.name', 'Pre-interview Tech Test') }}</h1>
                    <p>Wahyu Nugroho Indrawinata</p>
                </div>
                @yield('content')
            </div>
        </div>
        <!-- /#page-content-wrapper -->
    </div>
    <!-- /#wrapper -->
@yield('custom_script')
</body>

</html>
