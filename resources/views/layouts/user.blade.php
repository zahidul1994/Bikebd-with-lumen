<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        {{-- csrf token tag --}}
        {{-- <meta name="csrf-token" content="{{csrf_token()}}"> --}}
    
        <title>@yield('title')</title>
        <link rel="shortcut icon" href="{{ asset('storage/images/dashboardimage/titile.png') }}" type="image/x-icon">
      {{-- <link href="{{ @asset('css/app.css') }}" rel="stylesheet"> --}}
   <link rel="stylesheet" href="{{@asset('FontStyle/css/all.min.css')}}" />
   <link rel="stylesheet" href="{{@asset('FontStyle/css/slick.css')}}" />
   <link rel="stylesheet" href="{{@asset('FontStyle/css/com_ui_1.12.1_themes_base_jquery-ui.css')}}" />
   <link rel="stylesheet" href="{{@asset('FontStyle/css/bootstrap.min.css')}}" />
   <link rel="stylesheet" href="{{@asset('FontStyle/css/style.css')}}" />
        
    
    
    </head>
    <body class="hold-transition sidebar-mini">
        <div class="wrapper" >

            <section id="top-area">
                <nav class="navbar navbar-expand-lg navbar-light bg-dark">
                    <div class="container">
                        <a class="navbar-brand" href="#">
                           
                            <img src="{{@asset('/images/Fontimage/logo.png')}}" alt="">
                        </a>
        
                        <div class="">
        
                            <form class="form-inline my-2 my-lg-0 m-auto">
                                <input class="form-control" type="search" placeholder="Search" aria-label="Search">
                                <button class="btn btn-outline-success my-2 my-sm-0" type="submit"><i class="far fa-search"></i></button>
                            </form>
                        </div>
        
        
                        <select name="" id="" class="pr-5 py-1">
                            <option value="" disabled="" selected="">Language</option>
                            <option value="">বাংলা</option>
                            <option value="">English</option>
        
                        </select>
                        <ul class="tr-btn mb-0">
                            <li><button type="button" class="btn btn-outline-primary mr-2 t-btn t-btn-act">Login</button></li>
                            <li><button type="button" class="btn btn-outline-primary t-btn">Signup</button></li>
                        </ul>
        
                    </div>
        
        
        
        
                </nav>
            </section>
            <!--    menu area-->
            <section id="menu">
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <div class="container">
        
        
        
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
        
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav m-auto">
                                <li class="nav-item">
                                    <a class="nav-link" href="#">HOME</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">PRICE</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">SHOWROOMS</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        REVIEW
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="#">User Review’s</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#">Test Ride Review’s</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#">Technical Review’s</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#">Feature Review’s</a>
        
                                    </div>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">COMPARISON</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle"  id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        TIPS
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="#">TIPS FOR BEGINERS</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#">RIDING TIPS</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#">CARE & TECHNICAL TIPS</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#">STUNTMANIA</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#">MODIFICATION</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#">MOTORCYCLE LEGAL MATTERS</a>
        
                                    </div>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        GALLERY
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="#">Photo Gallery</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#">Videos</a>
                                    </div>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">STORY</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">NEWS</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">TOP10</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">UPCOMING</a>
                                </li>
                                <li>
                                <li class="nav-item">
                                    <a class="nav-link border-right-0" href="#">SUBMIT REVIEW WIN T-SHIRT</a>
                                </li>
        
                            </ul>
        
                        </div>
                    </div>
                </nav>
            </section>
            <!--    1st add-->
            <section id="add">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <img src="{{@asset('/images/Fontimage/add1.webp')}}" alt="" class="w-100">
                        </div>
                    </div>
                </div>
            </section>
        <!--find area-->
   

                @yield('user')
                <!--    foter area-->

<section id="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4>Experience Bike Reviews, News, and Latest Motorcycle Price In Bangladesh At BikeBD.com</h4>
                <p>
                    BikeBD.com is #1 motorcycle oriented website in Bangladesh where Bike enthusiasts from all over the country can find all the information about any bike. From motorcycle price in Bangladesh and Motorcycle Specification, to the test ride reviews of various bikes and first impression reviews of any newly launched bikes. Since 2012, BikeBD is providing information to everyone across the nation about various offers from motorcycle or related companies, news, coverage of motorcycle based or related events, and any update on any rules about motorcycle sector in Bangladesh. BikeBD.com also provides tips on motorcycle maintenance, motorcycle buying, riding, safety tips, traffic rules tips, and more. BikeBD.com is considered as the Motorcyclepedia of Bangladesh, reaching to millions of people with latest news, tips and articles.
                </p>
                <p>
                    BikeBD.com has a vast social wing – BikeBD Facebook Fanpage has a follower range of over 1 million. It is a platform where bikers or bike lovers of Bangladesh gets their daily dose of updates about various things and tips, humors, awareness, and more. BikeBD YouTube Channel has more than 1 lac subscriber – and we publish videos every week about motorcycle test ride video, latest motorcycle first impression, tips, motorcycle event coverage video, motorcycle tips video, and many more! In BikeBD Facebook Group, over 7 lac Bikers are connected to each other and they can easily reach out to one another for any problem. Bikers can exchange each other’s opinion, express any problems with their bikes, place a query, talk about machines that are not even available in Bangladesh, talk about their dream bikes, experience, and anything! BikeBD Instagram, BikeBD Twitter, and other BikeBD social wings serves similar purpose – to help and reach out to all the bikers. BikeBD.com is not just a motorcycle based website, but it is a complete platform for Bikers, Bike enthusiasts and Bike lovers of Bangladesh.
                </p>
            </div>
        </div>
    </div>
</section>

<!--bottom menu area-->
<section id="bottom-menu">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ul class="btm-menu">
                    <li><a href="#">Showroom List</a></li>
                    <li><a href="#">Latest Price</a></li>
                    <li><a href="#">Offer/Discount</a></li>
                    <li><a href="#">Dealers</a></li>
                    <li><a href="#">Accessories</a></li>
                    <li><a href="#" class="border-right-0">Contact</a></li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!--copy area-->
<section id="copy">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <a href="#">
                    &copy; Bikebd
                </a>
            </div>
        </div>
    </div>
</section>
               
            </div>

           <!-- /.card -->
           
         
           <script src="{{@asset('FontStyle/js/jquery-1.12.4.min.js')}}"></script>
           <script src="{{@asset('FontStyle/js/bootstrap.min.js')}}"></script>
           <script src="{{@asset('FontStyle/js/slick.min.js')}}"></script>
           <script src="{{@asset('FontStyle/js/com_ui_1.12.1_jquery-ui.js')}}"></script>
           <script src="{{@asset('FontStyle/js/popper.min.js')}}"></script>
          
           <script src="{{@asset('FontStyle/js/custom.js')}}"></script>

      
          
        <script>
                     

         var url = "{{URL::to('/')}}";
     
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

         
        </script>

@yield('script')
</body>

</html>