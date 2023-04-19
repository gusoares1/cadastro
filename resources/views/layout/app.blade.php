<html>
    <head>
        <link  href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
        <title>Cadastro de pessoa</title>
        <meta name ="csrf-token" content="{{ csrf_token() }}">
        <style>
            body {
                padding: 20;
            }
            .navbar {
                margin-bottom: 20;
            }
        </style>
    </head>
    <body>   
        <div class="container">
            @component('component_navbar', [ "current" => $current ])
            @endcomponent
            <main role="main">
                @hasSection('body')
                    @yield('body')
                @endif
            </main>
        </div>
        <script src="https://code.jquery.com/jquery-1.9.1.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

        @hasSection('javascript')
        @yield('javascript')
        @endif
    </body>
</html>