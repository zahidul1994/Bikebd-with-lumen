@extends('layouts.user')

@section('user')
<section id="find-area">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="filter-content p-3" style="background-color: #fff">
                    <div class="row">
                        <div class="col-md-7">

                            <p>
                                <label for="amount">Price range:</label>
                                <input type="text" id="amount" readonly style="border:0; color:#f6931f; font-weight:bold;">
                            </p>

                            <div id="slider-range"></div>

                        </div>
                        <div class="col-md-5">
                            <div class="row by-product">
                                <div class="col-md-6">
                                    <p><strong>By Brand</strong></p>
                                    <ul class="mb-0">
                                        <li><a href="#">Honda</a></li>
                                        <li><a href="#">Yamaha</a></li>
                                        <li><a href="#">Bajaj</a></li>
                                        <li><a href="#">Suzuki</a></li>
                                        <li><a href="#">Runner</a></li>
                                        <li><a href="#">TVS</a></li>
                                        <li><a href="#">Roadmaster</a></li>
                                        <li><a href="#">Vespa</a></li>


                                    </ul>
                                </div>
                                <div class="col-md-6">
                                    <p><strong>By CC</strong></p>
                                    <ul class="mb-0">
                                        <li><a href="#">50</a></li>
                                        <li><a href="#">80</a></li>
                                        <li><a href="#">100</a></li>
                                        <li><a href="#">110</a></li>
                                        <li><a href="#">125</a></li>
                                        <li><a href="#">135</a></li>
                                        <li><a href="#">150</a></li>
                                        <li><a href="#">160</a></li>

                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 align-self-center">
                <div class="card" style="">
                    <div class="card-slider">
                        <div class="card-slide">
                            <div class="c-head">
                                <p class="mb-0 p-3">Sport Motorcycle</p>
                            </div>
                            <div class="c-body pb-4">
                                <div class="row">
                                    <div class="col-md-5">
                                        <img src="{{@asset('/images/Fontimage/pulsar.webp')}}" alt="" class="w-100">
                                    </div>
                                    <div class="col-md-7">
                                        <p class="mb-0">Bajaj Pulsar 150</p>
                                        <p class="mb-0">Price: 172000</p>
                                    </div>
                                </div>
                                <div class="row pt-3">
                                    <div class="col-md-5">
                                        <img src="{{@asset('/images/Fontimage/pulsar.webp')}}" alt="" class="w-100">
                                    </div>
                                    <div class="col-md-7">
                                        <p class="mb-0">Bajaj Pulsar 150</p>
                                        <p class="mb-0">Price: 172000</p>
                                    </div>
                                </div>
                                <div class="row pt-3">
                                    <div class="col-md-5">
                                        <img src="{{@asset('/images/Fontimage/pulsar.webp')}}" alt="" class="w-100">
                                    </div>
                                    <div class="col-md-7">
                                        <p class="mb-0">Bajaj Pulsar 150</p>
                                        <p class="mb-0">Price: 172000</p>
                                    </div>
                                </div>
                                <div class="row pt-3">
                                    <div class="col-md-5">
                                        <img src="{{@asset('/images/Fontimage/pulsar.webp')}}" alt="" class="w-100">
                                    </div>
                                    <div class="col-md-7">
                                        <p class="mb-0">Bajaj Pulsar 150</p>
                                        <p class="mb-0">Price: 172000</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-slide">
                            <div class="c-head">
                                <p class="mb-0 p-3">Standard Motorcycle</p>
                            </div>
                            <div class="c-body pb-4">
                                <div class="row">
                                    <div class="col-md-5">
                                        <img src="{{@asset('/images/Fontimage/pulsar.webp')}}" alt="" class="w-100">
                                    </div>
                                    <div class="col-md-7">
                                        <p class="mb-0">Bajaj Pulsar 150</p>
                                        <p class="mb-0">Price: 172000</p>
                                    </div>
                                </div>
                                <div class="row pt-3">
                                    <div class="col-md-5">
                                        <img src="{{@asset('/images/Fontimage/pulsar.webp')}}" alt="" class="w-100">
                                    </div>
                                    <div class="col-md-7">
                                        <p class="mb-0">Bajaj Pulsar 150</p>
                                        <p class="mb-0">Price: 172000</p>
                                    </div>
                                </div>
                                <div class="row pt-3">
                                    <div class="col-md-5">
                                        <img src="{{@asset('/images/Fontimage/pulsar.webp')}}" alt="" class="w-100">
                                    </div>
                                    <div class="col-md-7">
                                        <p class="mb-0">Bajaj Pulsar 150</p>
                                        <p class="mb-0">Price: 172000</p>
                                    </div>
                                </div>
                                <div class="row pt-3">
                                    <div class="col-md-5">
                                        <img src="{{@asset('/images/Fontimage/pulsar.webp')}}" alt="" class="w-100">
                                    </div>
                                    <div class="col-md-7">
                                        <p class="mb-0">Bajaj Pulsar 150</p>
                                        <p class="mb-0">Price: 172000</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-slide">
                            <div class="c-head">
                                <p class="mb-0 p-3">Naked Sport Motorcycle</p>
                            </div>
                            <div class="c-body pb-4">
                                <div class="row">
                                    <div class="col-md-5">
                                        <img src="{{@asset('/images/Fontimage/pulsar.webp')}}" alt="" class="w-100">
                                    </div>
                                    <div class="col-md-7">
                                        <p class="mb-0">Bajaj Pulsar 150</p>
                                        <p class="mb-0">Price: 172000</p>
                                    </div>
                                </div>
                                <div class="row pt-3">
                                    <div class="col-md-5">
                                        <img src="{{@asset('/images/Fontimage/pulsar.webp')}}" alt="" class="w-100">
                                    </div>
                                    <div class="col-md-7">
                                        <p class="mb-0">Bajaj Pulsar 150</p>
                                        <p class="mb-0">Price: 172000</p>
                                    </div>
                                </div>
                                <div class="row pt-3">
                                    <div class="col-md-5">
                                        <img src="{{@asset('/images/Fontimage/pulsar.webp')}}" alt="" class="w-100">
                                    </div>
                                    <div class="col-md-7">
                                        <p class="mb-0">Bajaj Pulsar 150</p>
                                        <p class="mb-0">Price: 172000</p>
                                    </div>
                                </div>
                                <div class="row pt-3">
                                    <div class="col-md-5">
                                        <img ssrc="{{@asset('/images/Fontimage/pulsar.webp')}}" alt="" class="w-100">
                                    </div>
                                    <div class="col-md-7">
                                        <p class="mb-0">Bajaj Pulsar 150</p>
                                        <p class="mb-0">Price: 172000</p>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
         <!--    contant area-->
<section id="main-contant" class="mt-4">
    <div class="container">
        <div class="contant p-5 bg-white">
            <!--               recent area-->
            <div class="recent-view">
                <h3 class="mb-4">
                    Recently Viewed and Recommended
                </h3>
                <div class="row product-slider">
                    <div class="col-md-12">
                        <div class="card c-bdr">
                            <a href="#">
                                <img src="{{@asset('/images/Fontimage/pulsar.webp')}}" class="card-img-top w-100" alt="...">
                                <div class="card-body pb-0">
                                    <h5 class="bike-n text-dark">Bajaj Pulsar 150</h5>
                                    <p class="bike-p">Price:000000</p>

                                </div>
                                <div class="c-bottom text-center">
                                    <span class="">View Details</span>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="card c-bdr">
                            <a href="#">
                                <img src="{{@asset('/images/Fontimage/pulsar.webp')}}" class="card-img-top w-100" alt="...">
                                <div class="card-body pb-0">
                                    <h5 class="bike-n text-dark">Bajaj Pulsar 150</h5>
                                    <p class="bike-p">Price:000000</p>

                                </div>
                                <div class="c-bottom text-center">
                                    <span class="">View Details</span>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="card c-bdr">
                            <a href="#">
                                <img src="{{@asset('/images/Fontimage/pulsar.webp')}}" class="card-img-top w-100" alt="...">
                                <div class="card-body pb-0">
                                    <h5 class="bike-n text-dark">Bajaj Pulsar 150</h5>
                                    <p class="bike-p">Price:000000</p>

                                </div>
                                <div class="c-bottom text-center">
                                    <span class="">View Details</span>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="card c-bdr">
                            <a href="#">
                                <img src="{{@asset('/images/Fontimage/pulsar.webp')}}" class="card-img-top w-100" alt="...">
                                <div class="card-body pb-0">
                                    <h5 class="bike-n text-dark">Bajaj Pulsar 150</h5>
                                    <p class="bike-p">Price:000000</p>

                                </div>
                                <div class="c-bottom text-center">
                                    <span class="">View Details</span>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="card c-bdr">
                            <a href="#">
                                <img src="{{@asset('/images/Fontimage/pulsar.webp')}}" class="card-img-top w-100" alt="...">
                                <div class="card-body pb-0">
                                    <h5 class="bike-n text-dark">Bajaj Pulsar 150</h5>
                                    <p class="bike-p">Price:000000</p>

                                </div>
                                <div class="c-bottom text-center">
                                    <span class="">View Details</span>
                                </div>
                            </a>
                        </div>
                    </div>



                </div>
            </div>


            <!--                latest-news area-->

            <div class="latest-news mt-5">
                <h3 class="mb-4">
                    Latest News 
                   
                </h3>
                <div class="row product-slider1">
                    @foreach ($blogpost as $bloglist)
                    <div class="col-md-12">
                                <div class="card c-bdr">
                             <a href="{{url('lblogpostdetails/'.$bloglist->id)}}">
                                        <img src="{{@asset('/images/blogpost/'.$bloglist->postimage)}}" class="card-img-top w-100" alt="...">
                                        <div class="card-body pb-0">
                                            <h5 class="bike-n text-dark">{{$bloglist->title}}</h5>
                                            <p class="bike-p">Price:000000</p>

                                        </div>
                                        <div class="c-bottom text-center">
                                            <span class="">View Details</span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                    @endforeach

                </div>
            </div>


            <!--                upcoming area-->
            <div class="row">
                <div class="col-md-9">
                    <div class="recent-view mt-5">
                        <h3 class="mb-4">
                            Upcoming Bikes
                        </h3>
                        <div class="row product-slider">
                            <div class="col-md-12">
                                <div class="card c-bdr">
                                    <a href="#">
                                        <img src="{{@asset('/images/Fontimage/pulsar.webp')}}" class="card-img-top w-100" alt="...">
                                        <div class="card-body pb-0">
                                            <h5 class="bike-n text-dark">Bajaj Pulsar 150</h5>
                                            <p class="bike-p">Price:000000</p>

                                        </div>
                                        <div class="c-bottom text-center">
                                            <span class="">View Details</span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="card c-bdr">
                                    <a href="#">
                                        <img src="{{@asset('/images/Fontimage/pulsar.webp')}}" class="card-img-top w-100" alt="...">
                                        <div class="card-body pb-0">
                                            <h5 class="bike-n text-dark">Bajaj Pulsar 150</h5>
                                            <p class="bike-p">Price:000000</p>

                                        </div>
                                        <div class="c-bottom text-center">
                                            <span class="">View Details</span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="card c-bdr">
                                    <a href="#">
                                        <img src="{{@asset('/images/Fontimage/pulsar.webp')}}" class="card-img-top w-100" alt="...">
                                        <div class="card-body pb-0">
                                            <h5 class="bike-n text-dark">Bajaj Pulsar 150</h5>
                                            <p class="bike-p">Price:000000</p>

                                        </div>
                                        <div class="c-bottom text-center">
                                            <span class="">View Details</span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="card c-bdr">
                                    <a href="#">
                                        <img src="{{@asset('/images/Fontimage/pulsar.webp')}}" class="card-img-top w-100" alt="...">
                                        <div class="card-body pb-0">
                                            <h5 class="bike-n text-dark">Bajaj Pulsar 150</h5>
                                            <p class="bike-p">Price:000000</p>

                                        </div>
                                        <div class="c-bottom text-center">
                                            <span class="">View Details</span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="card c-bdr">
                                    <a href="#">
                                        <img src="{{@asset('/images/Fontimage/pulsar.webp')}}" class="card-img-top w-100" alt="...">
                                        <div class="card-body pb-0">
                                            <h5 class="bike-n text-dark">Bajaj Pulsar 150</h5>
                                            <p class="bike-p">Price:000000</p>

                                        </div>
                                        <div class="c-bottom text-center">
                                            <span class="">View Details</span>
                                        </div>
                                    </a>
                                </div>
                            </div>



                        </div>
                    </div>


                    <!--                latest bike area-->
                    <div class="recent-view mt-5">
                        <h3 class="mb-4">
                            Latest and Popular Bikes
                        </h3>
                        <div class="row product-slider">
                            <div class="col-md-12">
                                <div class="card c-bdr">
                                    <a href="#">
                                        <img src="{{@asset('/images/Fontimage/pulsar.webp')}}" class="card-img-top w-100" alt="...">
                                        <div class="card-body pb-0">
                                            <h5 class="bike-n text-dark">Bajaj Pulsar 150</h5>
                                            <p class="bike-p">Price:000000</p>

                                        </div>
                                        <div class="c-bottom text-center">
                                            <span class="">View Details</span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="card c-bdr">
                                    <a href="#">
                                        <img src="{{@asset('/images/Fontimage/pulsar.webp')}}" class="card-img-top w-100" alt="...">
                                        <div class="card-body pb-0">
                                            <h5 class="bike-n text-dark">Bajaj Pulsar 150</h5>
                                            <p class="bike-p">Price:000000</p>

                                        </div>
                                        <div class="c-bottom text-center">
                                            <span class="">View Details</span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="card c-bdr">
                                    <a href="#">
                                        <img src="{{@asset('/images/Fontimage/pulsar.webp')}}" class="card-img-top w-100" alt="...">
                                        <div class="card-body pb-0">
                                            <h5 class="bike-n text-dark">Bajaj Pulsar 150</h5>
                                            <p class="bike-p">Price:000000</p>

                                        </div>
                                        <div class="c-bottom text-center">
                                            <span class="">View Details</span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="card c-bdr">
                                    <a href="#">
                                        <img src="{{@asset('/images/Fontimage/pulsar.webp')}}" class="card-img-top w-100" alt="...">
                                        <div class="card-body pb-0">
                                            <h5 class="bike-n text-dark">Bajaj Pulsar 150</h5>
                                            <p class="bike-p">Price:000000</p>

                                        </div>
                                        <div class="c-bottom text-center">
                                            <span class="">View Details</span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="card c-bdr">
                                    <a href="#">
                                        <img src="{{@asset('/images/Fontimage/pulsar.webp')}}" class="card-img-top w-100" alt="...">
                                        <div class="card-body pb-0">
                                            <h5 class="bike-n text-dark">Bajaj Pulsar 150</h5>
                                            <p class="bike-p">Price:000000</p>

                                        </div>
                                        <div class="c-bottom text-center">
                                            <span class="">View Details</span>
                                        </div>
                                    </a>
                                </div>
                            </div>



                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <h1>ad</h1>
                </div>


            </div>


            <!--                brand area-->
            <div class="recent-view mt-5">
                <h3 class="mb-4">
                    Featured Mobile Brands

                </h3>
                <div class="row product-slider">
                    <div class="col-md-12">
                        <div class="card c-bdr">
                            <a href="#">
                                <img src="{{@asset('/images/Fontimage/brand-Logo.png')}}" class="card-img-top w-100" alt="...">

                                <div class="c-bottom text-center">
                                    <span class="">View Details</span>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="card c-bdr">
                            <a href="#">
                                <img src="{{@asset('/images/Fontimage/brand-Logo.png')}}" class="card-img-top w-100" alt="...">

                                <div class="c-bottom text-center">
                                    <span class="">View Details</span>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="card c-bdr">
                            <a href="#">
                                <img src="{{@asset('/images/Fontimage/brand-Logo.png')}}" class="card-img-top w-100" alt="...">

                                <div class="c-bottom text-center">
                                    <span class="">View Details</span>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="card c-bdr">
                            <a href="#">
                                <img src="{{@asset('/images/Fontimage/brand-Logo.png')}}" class="card-img-top w-100" alt="...">

                                <div class="c-bottom text-center">
                                    <span class="">View Details</span>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="card c-bdr">
                            <a href="#">
                                <img src="{{@asset('/images/Fontimage/brand-Logo.png')}}" class="card-img-top w-100" alt="...">

                                <div class="c-bottom text-center">
                                    <span class="">View Details</span>
                                </div>
                            </a>
                        </div>
                    </div>



                </div>
            </div>



            <!--                best price area-->
            <div class="recent-view mt-5">
                <h3 class="mb-4">
                    Best Bike by Price

                </h3>
                <div class="row product-slider">
                    <div class="col-md-12">
                        <div class="card pt-3 pb-3 bg-secondary p-2">
                            <div class="row">
                                <div class="col-md-5 align-self-center pr-0">
                                    <img src="{{@asset('/images/Fontimage/bike-icon.png')}}" alt="" class="w-100">
                                </div>
                                <div class="col-md-7 text-center align-self-center">
                                    <p class="mb-0 text-white">
                                        Best Bike Under
                                    </p>
                                    <p class="font-weight-bold text-white">
                                        Tk 10000
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="card pt-3 pb-3 bg-success p-2">
                            <div class="row">
                                <div class="col-md-5 align-self-center pr-0">
                                    <img src="{{@asset('/images/Fontimage/bike-icon.png')}}" alt="" class="w-100">
                                </div>
                                <div class="col-md-7 text-center align-self-center">
                                    <p class="mb-0 text-white">
                                        Best Bike Under
                                    </p>
                                    <p class="font-weight-bold text-white">
                                        Tk 10000
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="card pt-3 pb-3 bg-danger p-2">
                            <div class="row">
                                <div class="col-md-5 align-self-center pr-0">
                                    <img src="{{@asset('/images/Fontimage/bike-icon.png')}}" alt="" class="w-100">
                                </div>
                                <div class="col-md-7 text-center align-self-center">
                                    <p class="mb-0 text-white">
                                        Best Bike Under
                                    </p>
                                    <p class="font-weight-bold text-white">
                                        Tk 10000
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="card pt-3 pb-3 bg-warning p-2">
                            <div class="row">
                                <div class="col-md-5 align-self-center pr-0">
                                    <img src="{{@asset('/images/Fontimage/bike-icon.png')}}" alt="" class="w-100">
                                </div>
                                <div class="col-md-7 text-center align-self-center">
                                    <p class="mb-0 text-white">
                                        Best Bike Under
                                    </p>
                                    <p class="font-weight-bold text-white">
                                        Tk 10000
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="card pt-3 pb-3 bg-warning p-2">
                            <div class="row">
                                <div class="col-md-5 align-self-center pr-0">
                                    <img src="{{@asset('/images/Fontimage/bike-icon.png')}}" alt="" class="w-100">
                                </div>
                                <div class="col-md-7 text-center align-self-center">
                                    <p class="mb-0 text-white">
                                        Best Bike Under
                                    </p>
                                    <p class="font-weight-bold text-white">
                                        Tk 10000
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>





                </div>
            </div>



            <!--Trending Collections area-->

            <div class="recent-view mt-5">
                <h3 class="mb-4">
                    Trending Collections

                </h3>
                <div class="row product-slider">
                    <div class="col-md-12">
                        <div class="card">
                            <a href="#">
                                <img src="{{@asset('/images/Fontimage/newly_launched.jpg')}}" class="card-img-top w-100" alt="...">

                                <div class="pl-2">
                                    <span class="text-dark">Newly Lounched</span>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="card">
                            <a href="#">
                                <img src="{{@asset('/images/Fontimage/newly_launched.jpg')}}" class="card-img-top w-100" alt="...">

                                <div class="pl-2">
                                    <span class="text-dark">Powerful Headlight</span>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="card">
                            <a href="#">
                                <img src="{{@asset('/images/Fontimage/newly_launched.jpg')}}" class="card-img-top w-100" alt="...">

                                <div class="pl-2">
                                    <span class="text-dark">Max Speed</span>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="card">
                            <a href="#">
                                <img src="{{@asset('/images/Fontimage/newly_launched.jpg')}}" class="card-img-top w-100" alt="...">

                                <div class="pl-2">
                                    <span class="text-dark">Best Outlooking</span>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="card">
                            <a href="#">
                                <img src="{{@asset('/images/Fontimage/newly_launched.jpg')}}" class="card-img-top w-100" alt="...">

                                <div class="pl-2">
                                    <span class="text-dark">Best Outlooking</span>
                                </div>
                            </a>
                        </div>
                    </div>




                </div>
            </div>


            <!--                Comparisons area-->



            <div class="recent-view mt-5">
                <h3 class="mb-4">
                    Comparisons

                </h3>
                <div class="row Comparison-slider">
                    <div class="col-md-12">
                        <div class="card p-5 cmpr">
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="card">
                                        <img src="{{@asset('/images/Fontimage/pulsar.webp')}}" alt="" class="w-100">
                                        <p class="text-center">
                                            Bajaj Pulsar 150 <br>
                                            Brand: Bajaj <br>
                                            Origin: india <br>
                                        </p>

                                    </div>
                                </div>
                                <div class="col-md-2 align-self-center">
                                    <h3 class="text-center">
                                        VS
                                    </h3>
                                </div>
                                <div class="col-md-5">
                                    <div class="card">
                                        <img src="{{@asset('/images/Fontimage/pulsar.webp')}}" alt="" class="w-100">
                                        <p class="text-center">
                                            Bajaj Pulsar 150 <br>
                                            Brand: Bajaj <br>
                                            Origin: india <br>
                                        </p>

                                    </div>
                                </div>
                            </div>


                            <button class="compare">
                                Compare
                            </button>

                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="card p-5 cmpr">
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="card">
                                        <img src="{{@asset('/images/Fontimage/pulsar.webp')}}" alt="" class="w-100">
                                        <p class="text-center">
                                            Bajaj Pulsar 150 <br>
                                            Brand: Bajaj <br>
                                            Origin: india <br>
                                        </p>

                                    </div>
                                </div>
                                <div class="col-md-2 align-self-center">
                                    <h3 class="text-center">
                                        VS
                                    </h3>
                                </div>
                                <div class="col-md-5">
                                    <div class="card">
                                        <img src="{{@asset('/images/Fontimage/pulsar.webp')}}" alt="" class="w-100">
                                        <p class="text-center">
                                            Bajaj Pulsar 150 <br>
                                            Brand: Bajaj <br>
                                            Origin: india <br>
                                        </p>

                                    </div>
                                </div>
                            </div>

                            <button class="compare">
                                Compare
                            </button>

                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="card p-5 cmpr">
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="card">
                                        <img src="{{@asset('/images/Fontimage/pulsar.webp')}}" alt="" class="w-100">
                                        <p class="text-center">
                                            Bajaj Pulsar 150 <br>
                                            Brand: Bajaj <br>
                                            Origin: india <br>
                                        </p>

                                    </div>
                                </div>
                                <div class="col-md-2 align-self-center">
                                    <h3 class="text-center">
                                        VS
                                    </h3>
                                </div>
                                <div class="col-md-5">
                                    <div class="card">
                                        <img src="{{@asset('/images/Fontimage/pulsar.webp')}}" alt="" class="w-100">
                                        <p class="text-center">
                                            Bajaj Pulsar 150 <br>
                                            Brand: Bajaj <br>
                                            Origin: india <br>
                                        </p>

                                    </div>
                                </div>
                            </div>

                            <button class="compare">
                                Compare
                            </button>

                        </div>
                    </div>





                </div>
            </div>





        </div>
    </div>
</section>
 <!--subscribe area-->
    <section id="subscribe">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h3 class="mb-0 sbs-txt">

                        SUBSCRIBE FOR FUTURE UPDATES

                    </h3>

                </div>
                <div class="col-md-6">
                    <form class="form-inline my-2 my-lg-0">
                        <input class="form-control subs-form" type="email" placeholder="Type your email" style="">
                        <button class="btn subs-btn my-2 my-sm-0 " type="submit" style="">Subscribe</button>
                    </form>


                </div>
            </div>
        </div>
    </section>           
    
  
       
    
@endsection
