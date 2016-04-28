<!DOCTYPE html>
<html>
<head>
    <!-- Bootstrap Library -->
    <link rel="stylesheet" type="text/css" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
    <!-- jQuery Library -->
    <script src="{{asset('jquery.min.js')}}"></script>

    <!-- JS -->
    @yield('to-master-head-js')

    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="{{asset('css/master.css')}}">
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
                <div class="artist-name-container well well-sm">
                    <span class="artist-name">{{$artistName}}</span>
                </div>
                <div class="content">
                    @yield('to-master-content')
                </div>
            </div>
            <div class="col-md-9 hidden-xs hidden-sm right-main-col">
                <div class="artist-name-container well well-sm">
                    <span class="artist-name">{{$artistName}}</span>
                </div>
                <div class="content">
                    @yield('to-master-content')
                </div>
            </div>
        </div>
    </div>
    {{--Blocking right click for imgs--}}
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <script type="text/javascript">
        $(function() {
            var pixelSource = '{{url('Transparent.gif')}}}';
            var useOnAllImages = true;
            // Preload the pixel
            var preload = new Image();
            preload.src = pixelSource;
            $('img').live('mouseenter touchstart', function(e) {
                // Only execute if this is not an overlay or skipped
                var img = $(this);
                if (img.hasClass('protectionOverlay')) return;
                if (!useOnAllImages && !img.hasClass('protectMe')) return;
                // Get the real image's position, add an overlay
                var pos = img.offset();
                var overlay = $('<img class="protectionOverlay" src="' + pixelSource + '" width="' + img.width() + '" height="' + img.height() + '" />').css({position: 'absolute', zIndex: 9999999, left: pos.left, top: pos.top}).appendTo('body').bind('mouseleave', function() {
                    setTimeout(function(){ overlay.remove(); }, 0, $(this));
                });
                if ('ontouchstart' in window) $(document).one('touchend', function(){ setTimeout(function(){ overlay.remove(); }, 0, overlay); });
            });
        });
    </script>
    @yield('to-master-body-js')
</body>
</html>