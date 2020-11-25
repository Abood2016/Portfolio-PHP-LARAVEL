<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Home @yield('title')</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="{{ asset('frontend-assets/assets/img/favicon.ico') }}" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v5.15.1/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet"
        type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{ asset('frontend-assets/css/styles.css') }}" rel="stylesheet" />
</head>

<body>
<nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav">
    <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="#page-top">{{ $setting->site_title }}</a>
        <button
            class="navbar-toggler navbar-toggler-right text-uppercase font-weight-bold bg-primary text-white rounded"
            type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive"
            aria-expanded="false" aria-label="Toggle navigation">
            Menu
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger"
                        href = "{{ route('front.index') }}">Home</a></li>
                <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger"
                        href="#portfolio">Portfolio</a></li>
                <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger"
                        href="#about">About</a></li>
                <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger"
                        href="#contact">Contact</a></li>
            </ul>
        </div>
    </div>
</nav>
<br><br>
<section class="page-section bg-primary text-white mb-0" id="about">

    <div class="container text-center">
        <!-- About Section Heading-->
        <h4 class="page-section-heading text-center text-uppercase text-white">Porject Name : {{ $portfolio->name }}
        </h4>
        <br>
        <div class="row ">
            <div class="col-lg-12">
                <a href="{{asset('images/portfolio') .'/' .$portfolio->image}}" target="_blank"><img width="400px"
                        height="500px" src="{{ asset('images/portfolio/' . $portfolio->image) }}" alt=""></a>
            </div>
        </div><br>
        <a href="https://inorderwebsite.000webhostapp.com/"><small class="btn btn-secondary">Vist Site</small></a>
        <hr>
        <h2 class="">Porject Description : {!! $portfolio->description !!}</h2><br>
        <small class="">Created By : {{ $portfolio->user->name }}</small>
        <div class="text-center mt-4">
            <a class="btn btn-xl btn-outline-light" href="{{ route('document.download',['file' => $document->file]) }}">
                <i class="fas fa-download mr-2"></i>
                Download Cv!
            </a>
        </div>
    </div>

</section>


</body>

</html>