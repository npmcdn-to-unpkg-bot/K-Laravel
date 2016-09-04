<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Kortby</title>

    <!-- Fonts -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel='stylesheet' type='text/css'>

    <!-- Styles -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{url('css/bootflat.min.css')}}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/dropzone.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lity/1.6.5/lity.css">
    <link rel="stylesheet" href="{{url('css/style.css')}}">
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}

    <style>
        body {
            font-family: 'Lato';
        }

        .fa-btn {
            margin-right: 6px;
        }
    </style>
</head>
<body id="app-layout">
    
    @include('layouts.navbar')

    @yield('content')

    <!-- JavaScripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://unpkg.com/masonry-layout@4.0/dist/masonry.pkgd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/dropzone.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lity/1.6.5/lity.js"></script>
    <script>
        $('.grid').masonry({
          // options
          itemSelector: '.grid-item',
          //columnWidth: 200
          gutter: 10,
        });
        $('[data-toggle="tooltip"]').tooltip()
    </script>
    <script>
        Dropzone.options.myAwesomeDropzone = {
          paramName: "photo", // The name that will be used to transfer the file
          maxFilesize: 3, // MB
          acceptedFiles: '.jpg, .jpeg, .png, .bmp'
        };
    </script>
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
    @yield('script')
</body>
</html>
