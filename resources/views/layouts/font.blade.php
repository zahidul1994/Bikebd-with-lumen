<!DOCTYPE html>
<html>

<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
     <title>@yield('title')</title>
    <meta name="csrf-token" content="{{csrf_token()}}">
    <link href="https://fonts.googleapis.com/css?family=Cambo|Unna:400,400i,700,700i&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/fontcss/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/fontcss/slick.css')}}">
    <link rel="stylesheet" href="{{asset('css/fontcss/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/fontcss/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/fontcss/responsive.css')}}">
</head>

<body>
        <!--    top bar-->
        <section id="top-bar">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 align-self-center">
                        <div class="logo">
                            <a href="#">
                                <img src="{{url('storage/images/logo.png')}}" alt="vvv">
                            </a>
                        </div>
                    </div>
                    <div class="col-md-6 align-self-center">
                        <ul>
                            <li><a href="http://applyonline.uob.edu.bd/admission"><button class="apply">Apply Online</button></a></li>
                            <li>
                                <form class="form-inline my-2 my-lg-0">
                                    <input class="form-control" type="search" placeholder="Search" aria-label="Search">
                                    <button class="btn my-2 my-sm-0" type="submit"><i class="fas fa-search"></i></button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <!--    top bar end-->
        <!--    menu bar-->
    <section id="menu">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav text-center">

                        <li class="nav-item">
                            <a class="nav-link" href="http://uob.edu.bd/">Home</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                About UB
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="http://uob.edu.bd/chairman.html">Chairman's Message</a>


                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="http://uob.edu.bd/vc.html">VC's Message</a>

                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="http://uob.edu.bd/Treasurer.html">Treasurer's Message</a>

                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="http://uob.edu.bd/mission & vission.htm">Mission & Vision</a>

                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="why.html">Why Study With Us</a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="http://uob.edu.bd/under-construction.html">Academic</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="http://uob.edu.bd/under-construction.html">Faculty Member</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="http://uob.edu.bd/admi-requ.html" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Admission
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="admi-requ.html">Requirement</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="http://uob.edu.bd/applyonline/index.html">Apply Online</a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="http://uob.edu.bd/under-construction.html">Result Board</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="http://uob.edu.bd/complain.html">Complain</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link border-right-0" href="http://uob.edu.bd/contact.html">Contact</a>
                        </li>

                    </ul>

                </div>
            </div>
        </nav>
    </section>
    <!--    menu bar end-->
@yield('font')
    <!--    footer area-->
    <br/>
    <section id="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d455.759977681677!2d91.11008185834692!3d23.957617383004585!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3754058c3c06f3c1%3A0x1dbb016d348dbcb7!2sDC%20Office!5e0!3m2!1sen!2sbd!4v1575284985505!5m2!1sen!2sbd" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <p>

                    </p>
                </div>
            </div>
        </div>
    </section>
    <!--    footer area end-->

    <!--    devl area-->
    <section id="dev">
        <div class="container">
            <div class="col-md-12 text-center">
                <p>© 2019 All Rights Reserved, <a href="http://uob.edu.bd/">
                        University of Brahmanbaria
                    </a> | Developed By: <a href="https://www.virtuanic.com/">Virtuanic Solutions</a></p>

            </div>
        </div>
    </section>
<!-- jQuery -->
<script src="{{asset('js/dashboardjs/jquery/jquery.min.js')}}"></script>
<script src="{{asset('js/fontjs/slick.min.js')}}"></script>
<script src="{{asset('js/fontjs/popper.min.js')}}"></script>
<script src="{{asset('js/fontjs/bootstrap.min.js')}}"></script>
<script src="{{asset('js/fontjs/custom.js')}}"></script>
<!--    devl area end-->
<script>
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
</script>                              
@yield('script')
</body>

</html>