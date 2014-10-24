

<head>

    @section('head')


    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css"/>
    @show

</head>
<body>
    @include('templates.partials.header')
    <!-- Latest compiled and minified JavaScript -->
    <div class="container" id="content">
        <div class="navbar">
            <div class="jumbotron" style="min-height:700px">
                
                @if(@Session::has('success'))
                <div class="alert alert-success">
                    {{Session::get('success')}}

                </div>
                @elseif (@Session::has('fail'))
                <div class="alert alert-danger">
                    {{Session::get('fail')}}

                </div>
                @endif

                <div class="container">
                    @yield('content') 
                </div>
                
            </div>
        </div>
    </div>
    

    @include('templates.partials.footer')
    @section('javascript')
    
    {{ HTML::script('http://code.jquery.com/jquery-2.1.1.min.js') }}
    {{ HTML::script('https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js') }}
   <!-- <script src="http://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript" ></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script> -->
    @show
</body>

</html>
