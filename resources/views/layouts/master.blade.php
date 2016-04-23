<!DOCTYPE html>
<html>
<head>
    <!-- Bootstrap Library -->
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
    <!-- jQuery Library -->
    <script src="jquery.min.js"></script>

    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="css/master.css">
    @yield('to-master-css')

</head>
<body>
    <div class="container-fluid master-container">
        <div class="row master-row">
            <div class="col-xs-12 hidden-md hidden-lg hidden-xl left-main-col menu-top">
                @include('subviews/side-bar')
            </div>
            <div class="col-md-3 hidden-xs hidden-sm left-main-col menu-side">
                @include('subviews/side-bar')
            </div>
            <div class="col-xs-12 right-main-col">

            </div>

        </div>
    </div>
</body>
</html>