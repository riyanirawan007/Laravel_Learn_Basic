<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('/assets/bootstrap/css/bootstrap.min.css')}}">
    <style>footer {
        position: relative;
        margin-top: 40px;
        /* negative value of footer height */
        height: 70px;
        color: whitesmoke;
        background-color: darkcyan;
        clear: both;
        padding: 10px;
    }

    .f-link {
        color: wheat;
    }

    html,
    body {
        height: 100%;
    }

    .container {
        padding: 16px;
        height: 100%;
    }

    </style>
</head>

<body>
    <script src="{{asset('/js/jquery.min.js')}}"></script>
    <script src="{{asset('/assets/bootstrap/js/bootstrap.min.js')}}"></script>

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <!-- Navbar content -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01"
            aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
            <a class="navbar-brand" href="#">Laravel Basic CRUD</a>
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item active">
                    <a class="nav-link" href="{{url('/')}}">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="{{url('/user')}}">Users</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container">
        {{-- Content --}}
        @include($rynx_view)
    </div>
</body>

</html>
