<template>

   <div>
     <section id="top-area">
        <nav class="navbar navbar-expand-lg navbar-light bg-dark">
            <div class="container">
                <a class="navbar-brand" href="#">
                   
                    <img :src="'/images/Fontimage/bikebd-logo.jpg'" alt="">
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
                    <li><button type="button" class="btn btn-outline-primary mr-2 t-btn t-btn-act">লগইন</button></li>
                    <li><button type="button" class="btn btn-outline-primary t-btn">নিবন্ধন </button></li>
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
                                                
                            <router-link class="nav-link" :to="`/bn`" >প্রথম পৃষ্ঠা</router-link>
                           
                        </li>
                        <li class="nav-item">
                       
                             <router-link class="nav-link" :to="`/bn`" >দাম</router-link>
                        </li>
                        <li class="nav-item">
                              <router-link class="nav-link" :to="`/bn`" >প্রথম পৃষ্ঠা</router-link>
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
                                পেজ
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <span v-for="pagename in Pagelist" :key="(pagename.id)">
                                   <router-link class="dropdown-item" :to="`/bn/page/${encodeURI(pagename.slug)}`">{{pagename.pagename}}</router-link>
                               <div class="dropdown-divider"></div>
                                </span>
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
                    <img :src="'/images/Fontimage/add1.webp'" alt="" class="w-100">
                </div>
            </div>
        </div>
    </section>
<!--find area-->
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
                                        <img :src="'/images/Fontimage/pulsar.webp'" alt="" class="w-100">
                                    </div>
                                    <div class="col-md-7">
                                        <p class="mb-0">Bajaj Pulsar 150</p>
                                        <p class="mb-0">Price: 172000</p>
                                    </div>
                                </div>
                                <div class="row pt-3">
                                    <div class="col-md-5">
                                        <img :src="'/images/Fontimage/pulsar.webp'" alt="" class="w-100">
                                    </div>
                                    <div class="col-md-7">
                                        <p class="mb-0">Bajaj Pulsar 150</p>
                                        <p class="mb-0">Price: 172000</p>
                                    </div>
                                </div>
                                <div class="row pt-3">
                                    <div class="col-md-5">
                                        <img :src="'/images/Fontimage/pulsar.webp'" alt="" class="w-100">
                                    </div>
                                    <div class="col-md-7">
                                        <p class="mb-0">Bajaj Pulsar 150</p>
                                        <p class="mb-0">Price: 172000</p>
                                    </div>
                                </div>
                                <div class="row pt-3">
                                    <div class="col-md-5">
                                        <img :src="'/images/Fontimage/pulsar.webp'" alt="" class="w-100">
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
                                        <img :src="'/images/Fontimage/pulsar.webp'" alt="" class="w-100">
                                    </div>
                                    <div class="col-md-7">
                                        <p class="mb-0">Bajaj Pulsar 150</p>
                                        <p class="mb-0">Price: 172000</p>
                                    </div>
                                </div>
                                <div class="row pt-3">
                                    <div class="col-md-5">
                                        <img :src="'/images/Fontimage/pulsar.webp'" alt="" class="w-100">
                                    </div>
                                    <div class="col-md-7">
                                        <p class="mb-0">Bajaj Pulsar 150</p>
                                        <p class="mb-0">Price: 172000</p>
                                    </div>
                                </div>
                                <div class="row pt-3">
                                    <div class="col-md-5">
                                        <img :src="'/images/Fontimage/pulsar.webp'" alt="" class="w-100">
                                    </div>
                                    <div class="col-md-7">
                                        <p class="mb-0">Bajaj Pulsar 150</p>
                                        <p class="mb-0">Price: 172000</p>
                                    </div>
                                </div>
                                <div class="row pt-3">
                                    <div class="col-md-5">
                                        <img :src="'/images/Fontimage/pulsar.webp'" alt="" class="w-100">
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
                                        <img :src="'/images/Fontimage/pulsar.webp'" alt="" class="w-100">
                                    </div>
                                    <div class="col-md-7">
                                        <p class="mb-0">Bajaj Pulsar 150</p>
                                        <p class="mb-0">Price: 172000</p>
                                    </div>
                                </div>
                                <div class="row pt-3">
                                    <div class="col-md-5">
                                        <img :src="'/images/Fontimage/pulsar.webp'" alt="" class="w-100">
                                    </div>
                                    <div class="col-md-7">
                                        <p class="mb-0">Bajaj Pulsar 150</p>
                                        <p class="mb-0">Price: 172000</p>
                                    </div>
                                </div>
                                <div class="row pt-3">
                                    <div class="col-md-5">
                                        <img :src="'/images/Fontimage/pulsar.webp'" alt="" class="w-100">
                                    </div>
                                    <div class="col-md-7">
                                        <p class="mb-0">Bajaj Pulsar 150</p>
                                        <p class="mb-0">Price: 172000</p>
                                    </div>
                                </div>
                                <div class="row pt-3">
                                    <div class="col-md-5">
                                        <img s:src="'/images/Fontimage/pulsar.webp'" alt="" class="w-100">
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
                                <img :src="'/images/Fontimage/pulsar.webp'" class="card-img-top w-100" alt="...">
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
                                <img :src="'/images/Fontimage/pulsar.webp'" class="card-img-top w-100" alt="...">
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
                                <img :src="'/images/Fontimage/pulsar.webp'" class="card-img-top w-100" alt="...">
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
                                <img :src="'/images/Fontimage/pulsar.webp'" class="card-img-top w-100" alt="...">
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
                                <img :src="'/images/Fontimage/pulsar.webp'" class="card-img-top w-100" alt="...">
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
                <div class="row product-slider">
                   
                                <div class="card ">
                                    <slick ref="slick" :options="slickOptions"  v-if="AllLatestBlog.length">
                     <div class="col-md-12" v-for="bloginfo in AllLatestBlog" :key="(bloginfo.id)">
                                   <router-link  :to="`/bn/blog/${encodeURI(bloginfo.slug)}`" class="card c-bdr">
                                        <img :src="'/images/blogpost/'+ bloginfo.postimage" class="card-img-top w-10" alt="...">
                                        <div class="card-body pb-0">
                                            <h5 class="bike-n text-dark">{{bloginfo.title|shortlength(30,"..")}}</h5>
                                         <span class="bike-p">{{bloginfo.shortdescription|shortlength(40,"..")}}"</span>
                                              <!-- <span v-html="bloginfo.description"> </span> -->
                                          

                                        </div>
                                        
                                    </router-link>
                                </div>
                                  </slick> 
                            </div>
                       

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
                                        <img :src="'/images/Fontimage/pulsar.webp'" class="card-img-top w-100" alt="...">
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
                                        <img :src="'/images/Fontimage/pulsar.webp'" class="card-img-top w-100" alt="...">
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
                                        <img :src="'/images/Fontimage/pulsar.webp'" class="card-img-top w-100" alt="...">
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
                                        <img :src="'/images/Fontimage/pulsar.webp'" class="card-img-top w-100" alt="...">
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
                                        <img :src="'/images/Fontimage/pulsar.webp'" class="card-img-top w-100" alt="...">
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
                                        <img :src="'/images/Fontimage/pulsar.webp'" class="card-img-top w-100" alt="...">
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
                                        <img :src="'/images/Fontimage/pulsar.webp'" class="card-img-top w-100" alt="...">
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
                                        <img :src="'/images/Fontimage/pulsar.webp'" class="card-img-top w-100" alt="...">
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
                                        <img :src="'/images/Fontimage/pulsar.webp'" class="card-img-top w-100" alt="...">
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
                                        <img :src="'/images/Fontimage/pulsar.webp'" class="card-img-top w-100" alt="...">
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
                                <img :src="'/images/Fontimage/brand-Logo.png'" class="card-img-top w-100" alt="...">

                                <div class="c-bottom text-center">
                                    <span class="">View Details</span>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="card c-bdr">
                            <a href="#">
                                <img :src="'/images/Fontimage/brand-Logo.png'" class="card-img-top w-100" alt="...">

                                <div class="c-bottom text-center">
                                    <span class="">View Details</span>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="card c-bdr">
                            <a href="#">
                                <img :src="'/images/Fontimage/brand-Logo.png'" class="card-img-top w-100" alt="...">

                                <div class="c-bottom text-center">
                                    <span class="">View Details</span>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="card c-bdr">
                            <a href="#">
                                <img :src="'/images/Fontimage/brand-Logo.png'" class="card-img-top w-100" alt="...">

                                <div class="c-bottom text-center">
                                    <span class="">View Details</span>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="card c-bdr">
                            <a href="#">
                                <img :src="'/images/Fontimage/brand-Logo.png'" class="card-img-top w-100" alt="...">

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
                                    <img :src="'/images/Fontimage/bike-icon.png'" alt="" class="w-100">
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
                                    <img :src="'/images/Fontimage/bike-icon.png'" alt="" class="w-100">
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
                                    <img :src="'/images/Fontimage/bike-icon.png'" alt="" class="w-100">
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
                                    <img :src="'/images/Fontimage/bike-icon.png'" alt="" class="w-100">
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
                                    <img :src="'/images/Fontimage/bike-icon.png'" alt="" class="w-100">
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
                                <img :src="'/images/Fontimage/newly_launched.jpg'" class="card-img-top w-100" alt="...">

                                <div class="pl-2">
                                    <span class="text-dark">Newly Lounched</span>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="card">
                            <a href="#">
                                <img :src="'/images/Fontimage/newly_launched.jpg'" class="card-img-top w-100" alt="...">

                                <div class="pl-2">
                                    <span class="text-dark">Powerful Headlight</span>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="card">
                            <a href="#">
                                <img :src="'/images/Fontimage/newly_launched.jpg'" class="card-img-top w-100" alt="...">

                                <div class="pl-2">
                                    <span class="text-dark">Max Speed</span>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="card">
                            <a href="#">
                                <img :src="'/images/Fontimage/newly_launched.jpg'" class="card-img-top w-100" alt="...">

                                <div class="pl-2">
                                    <span class="text-dark">Best Outlooking</span>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="card">
                            <a href="#">
                                <img :src="'/images/Fontimage/newly_launched.jpg'" class="card-img-top w-100" alt="...">

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
                                        <img :src="'/images/Fontimage/pulsar.webp'" alt="" class="w-100">
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
                                        <img :src="'/images/Fontimage/pulsar.webp'" alt="" class="w-100">
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
                                        <img :src="'/images/Fontimage/pulsar.webp'" alt="" class="w-100">
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
                                        <img :src="'/images/Fontimage/pulsar.webp'" alt="" class="w-100">
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
                                        <img :src="'/images/Fontimage/pulsar.webp'" alt="" class="w-100">
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
                                        <img :src="'/images/Fontimage/pulsar.webp'" alt="" class="w-100">
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
    

              
</template>

<script>

import Slick from 'vue-slick';
 
    
export default {
    
       components: { Slick },
  name: "BNIndex",
      data(){
        return {
            slickOptions: {
             slidesToShow: 4,
        slidesToScroll: 1,
        dots: false,
        arrows: true,
        prevArrow: '<span class="right-round"><i class="fal fa-angle-right"></i></span>',
        nextArrow: '<span class="left-round"><i class="fal fa-angle-left"></i></span>',

                    },
          authenticatedname:null,
         authenticatedimage:null,
         AllLatestBlog:[],
         Pagelist:[],
      
        }
    },
      created () {
            document.title = "Home";
        },
  mounted() {
 

        var token= localStorage.getItem("token");
      var user= localStorage.getItem("user");
     
      if( token && user){
       
           this.authenticatedimage=JSON.parse(localStorage.getItem("user")).userimage;
        this.authenticatedname= JSON.parse(localStorage.getItem("user")).username;
      
         
      };
       
       
       axios.post('/bn/pagelist')
        .then(response => {
            (this.Pagelist = response.data.bnpage);
           
        });
       
        
         axios.get('bn/latestblog')
        .then(response => {
            (this.AllLatestBlog = response.data.blogpost);
                                    
        });
            
       
      
  },
   
  methods: {
      logOutNow(){
        //alert(5);
       localStorage.clear();
        this.$router.push("/login")
      },
    
       
    }

};
</script>
