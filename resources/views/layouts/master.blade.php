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
                @include('subviews/menu')
            </div>
            <div class="col-md-3 hidden-xs hidden-sm left-main-col menu-side">
                @include('subviews/menu')
            </div>
            <div class="col-xs-12 hidden-md hidden-lg hidden-xl right-main-col">
                <div class="artist-name-container">
                    <span class="artist-name">Artist Name</span>
                </div>
                <div class="content">
                    @yield('to-master-content')
                </div>
            </div>
            <div class="col-md-9 hidden-xs hidden-sm right-main-col">
                <div class="artist-name-container">
                    <span class="artist-name">Artist Name</span>
                </div>
                <div class="content">
                    @yield('to-master-content')
                </div>
            </div>
        </div>
    </div>
</body>
</html>