<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>ToucanTech </title>
    @include('includes.stylesheets')
    @stack('styles')
</head>
<body>
    <div id="wrapper">
        
        @include('includes.sidebar')

        <div id="page-wrapper" class="gray-bg dashbard-1">
            <div class="row border-bottom">
                <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
                    <div class="navbar-header">
                        <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
                    </div>
                </nav>
            </div>
            @yield('content')
        </div>
    </div>

    @include('includes.footer')     
    @include('includes.javascript')
    @stack('scripts')

</body>
</html>
