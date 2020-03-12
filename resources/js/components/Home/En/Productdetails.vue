<template>

<span>



<section id="single-product">
    <div class="container">
        <!--       overview area-->
        <div class="product-contant mt-4" style="border: 1px solid #">
            <div class="row">
                <div class="col-md-12">
                    <div class="row mr-0 ml-0" style="border-bottom:1px solid #ddd">
                        <div class="col-md-6 align-self-center">

                            <h3 class="p-3 mb-0 m-bikename">
                                {{allProductdetails.title}}  {{allProductdetails.cc}}
                               
                                <span v-if="allProductdetails.marketstatus == 'Yes'">Marlet Status: Avalable in Bangladesh</span>
                               
                     
                            </h3>
                           
                    <p class="text-blue">
                     <span>{{allProductdetails.clickview}} <i class="far fa-eye" aria-hidden="true"></i> Views</span>
                     </p>
                        </div>
                        <div class="col-md-6 align-self-center">
                            <div class="top-btn">
                                <ul class="tr-btn mb-0 float-right p-3">
                                    <li><button type="button" class="btn btn-outline-primary mr-2 t-btn t-btn-act"><i class="far fa-heart"></i> SHORTLIST</button></li>
                                    <li><button type="button" class="btn btn-outline-primary t-btn"><i class="fas fa-plus"></i> COMPARE</button></li>
                                </ul>
                            </div>
                        </div>
                    </div>


                    <div class="row mr-0 ml-0">
                        <div class="col-md-5 col-sm-12" style="border-right: 1px solid #ddd; border-bottom: 1px solid #ddd">
                             <img :src="'/images/productimages/'+allProductdetails.featureimage" alt="not" class="w-100">
                            <!-- <img src="image/pulsar.webp4" alt="" class="w-100"> -->
                        </div>
                        <div class="col-md-7 col-sm-12" style="border-bottom:1px solid #ddd">
                            <div class="row mr-0 text-center" style="border-bottom:1px solid #ddd">
                                <div class="col-md-4 mt-3 mb-3" style="border-right:1px solid #ddd">
                                    <div class="rev">
                                        <p class="mb-0"><span style="font-size:26px; font-weight:700; color:#3F3F3F;">4.5</span>/5</p>
                                        <a href="#" style="font-size:12px; color:#757575; text-decoration:underline;">
                                            2,367 User Reviews
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-4 mt-3 mb-3" style="border-right:1px solid #ddd">
                                    <div class="rev">
                                        <p class="mb-0"><span style="font-size:26px; font-weight:700; color:#3F3F3F;">4.5</span>/5</p>
                                        <a href="#" style="font-size:12px; color:#757575; text-decoration:underline;">
                                            1 Expart Reviews
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-4 mt-3 mb-3">
                                    <ul class="top-lg0 mb-0">
                                        <li><a href="#" style="color:#543C70">
                                                <img src="image/expertpick.png" alt="">
                                            </a></li>
                                        <li><a href="#" style="color:#4A7B59">
                                                <img src="image/expertpick.png" alt="">

                                            </a></li>


                                    </ul>
                                </div>
                            </div>

                            <div class="row mr-0" style="border-bottom:1px solid #ddd">
                                <div class="col-nd-7">
                                    <h3 class="p-3 text-danger mb-0" style="font-size:20px; font-weight:700; padding-bottom:0 !important">
                                        
                                        <del class="" v-if="allProductdetails.offerprice">Bike Price:{{allProductdetails.regularprice}}</del>
                                        <p class="" v-else="">Bike Price:{{allProductdetails.regularprice}}</p>

                                    </h3>
                                    
                                    <h3 class="p-3 mb-0" style="font-size:20px; font-weight:700;" v-if="allProductdetails.offerprice">
                                        Offer Price: {{allProductdetails.offerprice}} <a href="#" style="font-size:14px;">(Offer Details)</a>

                                    </h3>

                                </div>

                                <div class="col-md-5 align-self-center text-right offer-btn">
                                <button type="button" class="btn btn-success">You Have A Offer !!!</button>

                                </div>
                            </div>


                            <div class="row p-2 k-spcs">
                                <div class="col-md-6 pl-2">
                                    <h3 class="text-left">
                                        Key Specs
                                    </h3>
                                </div>
                                <div class="col-md-6 text-right fl-spcs">
                                    <a href="#speca" class="p-3 spk-btn">
                                        
      
                                        See Full Specs <i class="fas fa-angle-double-right"></i>
                                        
                                    </a>
                                </div>
                            </div>


                            <div class="row ks-details">
                                <div class="col-md-3" style="border-right:1px solid #ddd">
                                    <h5>Displacement</h5>
                                    <ul>
                                        <li class="bg-success"></li>
                                        <li class="bg-success"></li>
                                        <li class="bg-success"></li>
                                        <li class="bg-success"></li>
                                        <li></li>
                                    </ul>
                                    <p class="gclr">
                                        {{allProductdetails.displacement}}.0cc
                                    </p>
                                </div>
                                <div class="col-md-3" style="border-right:1px solid #ddd">
                                    <h5> Mileage</h5>
                                    <ul>
                                        <li class="bg-warning"></li>
                                        <li class="bg-warning"></li>
                                        <li class="bg-warning"></li>
                                        <li></li>
                                        <li></li>
                                    </ul>
                                    <p class="gclr">mileage
                                        {{allProductdetails.mileage}}kmpl
                                    </p>
                                </div>
                                <div class="col-md-3" style="border-right:1px solid #ddd">
                                    <h5>Maximum Power</h5>
                                    <ul>
                                        <li class="bg-danger"></li>
                                        <li class="bg-danger"></li>
                                        <li class="bg-danger"></li>
                                        <li class="bg-danger"></li>
                                        <li></li>
                                    </ul>
                                    <p class="gclr">
                                         {{allProductdetails.rm}}PS@ <br>{{allProductdetails.rpm}}RPM
                                        
                                    </p>
                                </div>
                                <div class="col-md-3">
                                    <h5>Maximum Torque</h5>
                                    <ul>
                                        <li class="bg-info"></li>
                                        <li class="bg-info"></li>
                                        <li class="bg-info"></li>
                                        <li class="bg-info"></li>
                                        <li class="bg-info"></li>
                                    </ul>
                                    <p class="gclr">
                                       {{allProductdetails.torquenm}}NM @ <br>{{allProductdetails.torquerpm}}RPM

                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="row mr-0 ml-0">
                        <div class="col-md-5 col-sm-12" style="border-right: 1px solid #ddd">
                            <div class="add" style="height:600px; width:300px; margin: 0 auto">
                                <img src="image/300&600.png" alt="">

                            </div>
                        </div>
                        <div class="col-md-7 col-sm-12 top-competitor suggest-product">





                            <div class="row" style="border-bottom: 1px solid #ddd">
                                <div class="col-md-12 articale">
                                    <h3>Articale that can help you</h3>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <ul>
                                                <li><a href="#">Lorem ipsum dolor sit amet.</a></li>
                                                <li><a href="#">Lorem ipsum dolor sit amet.</a></li>
                                                <li><a href="#">Lorem ipsum dolor sit amet.</a></li>
                                            </ul>
                                        </div>
                                        <div class="col-md-6">
                                            <ul>
                                                <li><a href="#">Lorem ipsum dolor sit amet.</a></li>
                                                <li><a href="#">Lorem ipsum dolor sit amet.</a></li>
                                                <li><a href="#">Lorem ipsum dolor sit amet.</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>










                            <div class="row" style="border-bottom: 1px solid #ddd">
                                <div class="col-md-12 showroom">
                                    <form class="my-2 my-lg-0 text-center">
                                        <input class="form-control mr-sm-2" type="search" placeholder="Type Here Your District Name" aria-label="Search">
                                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search Nearest Bajaj Showroom</button>
                                    </form>
                                </div>
                            </div>


                            <div class="row pt-2">
                                <div class="col-md-12">
                                    <h3 class="pl-3">
                                        Top Competitors
                                    </h3>
                                </div>
                            </div>
                            <div class="row p-3 compitor-slider">
                                <div class="col-md-12">
                                    <div class="card">
                                        <img src="image/pulsar.webp" class="w-100" alt="...">
                                        <div class="card-body">
                                            <p class="text-center"><a href="#" class="d-block ">Pulsar 150</a> BDT: 0000</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="card">
                                        <img src="image/pulsar.webp" class="w-100" alt="...">
                                        <div class="card-body">
                                            <p class="text-center"><a href="#" class="d-block ">Pulsar 150</a> BDT: 0000</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="card">
                                        <img src="image/pulsar.webp" class="w-100" alt="...">
                                        <div class="card-body">
                                            <p class="text-center"><a href="#" class="d-block ">Pulsar 150</a> BDT: 0000</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="card">
                                        <img src="image/pulsar.webp" class="w-100" alt="...">
                                        <div class="card-body">
                                            <p class="text-center"><a href="#" class="d-block ">Pulsar 150</a> BDT: 0000</p>
                                        </div>
                                    </div>
                                </div>
                            </div>




                        </div>




                    </div>





                </div>
            </div>

        </div>
        <!--       overview area end-->








        <!--        details area-->
        <div class="product-contant mt-4" style="border: 1px solid #ddd">
            <div class="details-head">
                <p class="p-3 mb-0" style="border-bottom: 1px solid #ddd">
                    BAJAJ PULSAR 150 DETAILS
                </p>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <div class="all-details p-3">
                        <h4 class="mb-0">
                            Heading
                        </h4>
                        <p class="mb-0 gclr">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa, magnam.
                        </p>
                    </div>
                    <div class="all-details p-3" style="padding-top:0 !important">
                        <h4 class="mb-0">
                            Heading
                        </h4>
                        <p class="mb-0 gclr">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa, magnam.
                        </p>
                    </div>
                    <div class="all-details p-3" style="padding-top:0 !important">
                        <h4 class="mb-0">
                            Heading
                        </h4>
                        <p class="mb-0 gclr">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa, magnam.
                        </p>

                        <a href="#" class="p-3 text-dark" style="padding-left:0 !important">Read more</a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="add-ps" style="height:280px; width:336px;">
                        <img src="image/336&280.png" alt="" class="w-100">
                    </div>
                </div>
            </div>
        </div>

        <!--details area end-->








        <!--        RECENTLY VIEWED area-->
        <div class="recent-product-contant mt-4" style="border: 1px solid #ddd">

            <div class="details-head">
                <p class="p-3 mb-0">
                    RECENTLY VIEWED & RECOMMENDED PRODUCTS
                </p>
            </div>
            <div class="row recently-product p-4" style="padding-top:0 !important">
                <div class="col-md-12">
                    <div class="recent-content" style="border: 1px solid #ddd">

                        <div class="row">
                            <div class="col-md-4 align-self-center">
                                <img src="image/pulsar.webp" alt="" class="w-100">
                            </div>
                            <div class="col-md-8 align-self-center" style="padding-top:5px; padding-bottom:5px; padding-left:0;">
                                <p class="mb-1">
                                    <a href="#" style="color:#424242;"> Bajaj Pulsar 150 </a>
                                </p>
                                <p class="mb-1" style="font-weight:600; color:#212121">
                                    Tk.0000
                                </p>
                                <p class="mb-0" style="font-size:14px; color:#212121">
                                    <input type="checkbox"> Add to compare
                                </p>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-md-12">
                    <div class="recent-content" style="border: 1px solid #ddd">

                        <div class="row">
                            <div class="col-md-4 align-self-center">
                                <img src="image/pulsar.webp" alt="" class="w-100">
                            </div>
                            <div class="col-md-8 align-self-center" style="padding-top:5px; padding-bottom:5px; padding-left:0;">
                                <p class="mb-1">
                                    <a href="#" style="color:#424242;"> Bajaj Pulsar 150 </a>
                                </p>
                                <p class="mb-1" style="font-weight:600; color:#212121">
                                    Tk.0000
                                </p>
                                <p class="mb-0" style="font-size:14px; color:#212121">
                                    <input type="checkbox"> Add to compare
                                </p>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-md-12">
                    <div class="recent-content" style="border: 1px solid #ddd">

                        <div class="row">
                            <div class="col-md-4 align-self-center">
                                <img src="image/pulsar.webp" alt="" class="w-100">
                            </div>
                            <div class="col-md-8 align-self-center" style="padding-top:5px; padding-bottom:5px; padding-left:0;">
                                <p class="mb-1">
                                    <a href="#" style="color:#424242;"> Bajaj Pulsar 150 </a>
                                </p>
                                <p class="mb-1" style="font-weight:600; color:#212121">
                                    Tk.0000
                                </p>
                                <p class="mb-0" style="font-size:14px; color:#212121">
                                    <input type="checkbox"> Add to compare
                                </p>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-md-12">
                    <div class="recent-content" style="border: 1px solid #ddd">

                        <div class="row">
                            <div class="col-md-4 align-self-center">
                                <img src="image/pulsar.webp" alt="" class="w-100">
                            </div>
                            <div class="col-md-8 align-self-center" style="padding-top:5px; padding-bottom:5px; padding-left:0;">
                                <p class="mb-1">
                                    <a href="#" style="color:#424242;"> Bajaj Pulsar 150 </a>
                                </p>
                                <p class="mb-1" style="font-weight:600; color:#212121">
                                    Tk.0000
                                </p>
                                <p class="mb-0" style="font-size:14px; color:#212121">
                                    <input type="checkbox"> Add to compare
                                </p>
                            </div>
                        </div>

                    </div>
                </div>


            </div>


        </div>
        <!--        RECENTLY VIEWED area end-->










        <!--review area-->
        <div class="product-contant mt-4" style="border: 1px solid #ddd">

            <div class="details-head eprt-review">
                <div class="row mr-0 ml-0" style="border-bottom: 1px solid #ddd">
                    <div class="col-md-6 align-self-center">
                        <p class="p-3 mb-0">
                            BAJAJ PULSAR 150 REVIEW
                        </p>
                    </div>
                    <div class="col-md-6 align-self-center text-right">
                        <a href="#" class="p-3 mb-0 Read">
                            Read Full Review <i class="fas fa-angle-right"></i>
                        </a>

                    </div>
                </div>

            </div>


            <div class="details-head ex-rating">
                <div class="row mr-0 ml-0" style="border-bottom: 1px solid #ddd">
                    <div class="col-md-2 align-self-center text-center">
                        <div class="rev">
                            <p class="mb-0" style="font-size:20px;"><span style="font-size:46px; font-weight:700; color:#3F3F3F;">3.5</span>/5</p>

                        </div>
                    </div>
                    <div class="col-md-10 align-self-center p-3" style="border-left: 1px solid #ddd">
                        <a href="#" class="mb-0">
                            Bajaj Pulsar 150 Review

                        </a>
                        <p class="">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ratione, odio.
                        </p>


                        <p class="mb-0" style="font-size:14px; color:#9e9e9e">
                            Jan 31 2020 By Kshitij Pujari
                        </p>

                    </div>
                </div>
            </div>


            <!--            p&c-->
            <div class="row p-3 pr-cns">
                <div class="col-md-6">
                    <p class="mb-0">
                        <i class="far fa-thumbs-up text-success"></i> PROS
                    </p>

                    <ul class="p-3" style="color:#616161">
                        <li>Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.</li>
                        <li>Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.</li>
                        <li>Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.</li>
                        <li>Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.</li>
                        <li>Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.</li>
                    </ul>
                </div>
                <div class="col-md-6">

                    <p class="mb-0">
                        <i class="far fa-thumbs-down text-danger"></i> CONS
                    </p>

                    <ul class="p-3" style="color:#616161">
                        <li>Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.</li>
                        <li>Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.</li>
                        <li>Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.</li>
                        <li>Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.</li>
                        <li>Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.</li>
                    </ul>
                </div>
            </div>

            <div class="row mr-0 ml-0" style="border-bottom: 1px solid #ddd">
                <div class="col-md-12">
                    <p class="pr-3 pl-3 text-justify" style="color:#616161">VERDICT</p>
                    <p class="pr-3 pl-3 text-justify" style="color:#616161">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dicta non saepe explicabo blanditiis quo sunt, inventore accusamus at ea, quam necessitatibus repellat, dolore. Pariatur inventore sapiente repudiandae voluptate obcaecati! Esse quam, modi facere, quisquam numquam a assumenda libero impedit sunt error quibusdam illum placeat, ea in. Dolorum earum error voluptatem commodi autem similique natus amet consequuntur consectetur, libero quos qui ex perspiciatis impedit molestias voluptatibus id reiciendis sunt dolor accusantium!
                    </p>
                </div>
            </div>




            <div class="row p-3 btm-ex-rating">
                <div class="col-md-12">
                    <a href="#" class="p-3 mb-0">
                        Read Full Review <i class="fas fa-angle-right"></i>
                    </a>
                </div>
            </div>



        </div>
        <!--review area end-->





        <!--user review area-->
        <div class="product-contant mt-4" style="border: 1px solid #ddd">

            <div class="details-head eprt-review">
                <div class="row mr-0 ml-0" style="border-bottom: 1px solid #ddd">
                    <div class="col-md-6 align-self-center">
                        <p class="p-3 mb-0">
                            User Reviews
                        </p>
                    </div>
                    <div class="col-md-6 align-self-center text-right">
                        <a href="#" class="p-3 mb-0 Read">
                            Read All User Reviews <i class="fas fa-angle-right"></i>
                        </a>

                    </div>
                </div>

            </div>


            <div class="details-head ex-rating">
                <div class="row mr-0 ml-0" style="border-bottom: 1px solid #ddd">
                    <div class="col-md-2 align-self-strat text-center p-3">
                        <div class="rev">
                            <p class="mb-0" style="font-size:14px; color:#777; padding-bottom:10px;">OVERALL RATING</p>
                            <p class="mb-0" style="font-size:20px;"><span style="font-size:46px; font-weight:700; color:#3F3F3F;">4.5</span>/5</p>
                            <p style="font-size:12px; color:#757575" class="mb-0">
                                BASED ON 565 RATING(S)
                            </p>

                        </div>
                    </div>
                    <div class="col-md-5 align-self-center p-3" style="border-left: 1px solid #ddd; border-right:1px solid #ddd">




                        <div class="rev">
                            <p class="mb-0 text-center" style="font-size:14px; color:#777; padding-bottom:10px;">OVERALL RATING</p>
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>


                            <div class="progress">
                                <div class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>

                            <div class="progress">
                                <div class="progress-bar" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>









                    </div>


                    <div class="col-md-5 align-self-start p-3">
                        <div class="rev text-center">
                            <p class="mb-0 text-center" style="font-size:14px; color:#777; padding-bottom:10px;">SHARE YOUR THOUGHTS</p>
                            <button type="button" class="btn">WRITE A REVIEW </button>
                        </div>
                    </div>
                </div>
            </div>




            <div class="row mr-0 ml-0 py-3" style="border-bottom: 1px solid #ddd">
                <div class="col-md-12 pb-2 pl-3 user-btns-a">
                    <p class="pr-3 user-btns-h" style="color:#616161">User Review Summary</p>
                    <button type="button" class="btn btn-active">Primary</button> <button type="button" class="btn">awesome looks</button> <button type="button" class="btn">Primary</button> <button type="button" class="btn">Primary</button> <button type="button" class="btn">Good Quality</button> <button type="button" class="btn">Primary</button> <button type="button" class="btn">Primary</button> <button type="button" class="btn">Primary</button> <button type="button" class="btn">Primary</button> <button type="button" class="btn">Primary</button> <button type="button" class="btn">Primary</button> <button type="button" class="btn">Primary</button> <button type="button" class="btn">Primary</button> <button type="button" class="btn">Primary</button> <button type="button" class="btn">Primary</button> <button type="button" class="btn">Primary</button>
                </div>
            </div>


            <div class="row mr-0 ml-0 py-3" style="border-bottom: 1px solid #ddd">
                <div class="col-md-12">
                    <p class="pr-3 text-justify" style="color:#616161; text-transform:uppercase"><strong>1,186</strong> User Review(s)</p>
                    <h6 style="font-size:18px; font-weight:700; color:#424242">Best in the market!</h6>
                    <p class="rv-date" style="font-size:14px; color:#9e9e9e">
                        15 Feb 2020 By Sumit Mishra
                    </p>
                    <p style="color:#616161">
                        best bike in this budget price / i am happy to buy this bike.
                    </p>
                </div>
            </div>




            <div class="row mr-0 ml-0" style="border-bottom: 1px solid #ddd">
                <div class="col-md-12">
                    <h6 style="font-size:18px; font-weight:700; color:#424242">Best in the market!</h6>
                    <p class="rv-date" style="font-size:14px; color:#9e9e9e">
                        15 Feb 2020 By Sumit Mishra
                    </p>
                    <p style="color:#616161">
                        best bike in this budget price / i am happy to buy this bike.
                    </p>
                </div>
            </div>





            <div class="row p-3 btm-ex-rating">
                <div class="col-md-12">
                    <a href="#" class="p-3 mb-0">
                        Bajaj Pulsar 150 User Reviews <i class="fas fa-angle-right"></i>
                    </a>
                </div>
            </div>



        </div>
        <!--user review area end-->







        <!--        add area-->
        <img src="image/2fd54f31d1f59b7f222d6ce20432e485.gif" alt="" class="w-100 mt-4">
        <!--        add area end-->








        <!--        video area-->

        <div class="product-contant mt-4" style="border: 1px solid #ddd">

            <div class="details-head">
                <p class="p-3 mb-0" style="border: 1px solid #ddd">
                    Video
                </p>
            </div>
            <div class="row">
                <div class="col-md-12 text-center p-3">
                    <iframe width="100%" height="515" :src="allProductdetails.embedurl" class="p-3" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            </div>


        </div>
        <!--        video area end-->




        <!--        Recent Stories area-->

        <div class="product-contant mt-4" style="border: 1px solid #ddd">

            <div class="details-head">
                <p class="p-3 mb-0" style="border: 1px solid #ddd">
                    Recent Stories
                </p>
            </div>
            <div class="row p-3 mx-2 recent-slide">
                <div class="col-md-12">
                    <div class="card" style="">
                        <img src="image/pulsar.webp" class="card-img-top" alt="...">
                        <div class="card-body">
                            <p style="font-size:20px; font-weight:700;">Heading</p>
                            <p class="card-text" style="color:#616161">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis, doloremque.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolor, veritatis..</p>
                        </div>

                        <div class="card-bottom p-1" style="border-top:1px solid #ddd;">
                            <p style="font-size:14px; color:#9e9e9e" class="mb-0">
                                Feb 24 2020 By Ravi Sharma
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card" style="">
                        <img src="image/pulsar.webp" class="card-img-top" alt="...">
                        <div class="card-body">
                            <p style="font-size:20px; font-weight:700;">Heading</p>
                            <p class="card-text" style="color:#616161">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis, doloremque.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolor, veritatis..</p>
                        </div>

                        <div class="card-bottom p-1" style="border-top:1px solid #ddd;">
                            <p style="font-size:14px; color:#9e9e9e" class="mb-0">
                                Feb 24 2020 By Ravi Sharma
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card" style="">
                        <img src="image/pulsar.webp" class="card-img-top" alt="...">
                        <div class="card-body">
                            <p style="font-size:20px; font-weight:700;">Heading</p>
                            <p class="card-text" style="color:#616161">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis, doloremque.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolor, veritatis..</p>
                        </div>

                        <div class="card-bottom p-1" style="border-top:1px solid #ddd;">
                            <p style="font-size:14px; color:#9e9e9e" class="mb-0">
                                Feb 24 2020 By Ravi Sharma
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card" style="">
                        <img src="image/pulsar.webp" class="card-img-top" alt="...">
                        <div class="card-body">
                            <p style="font-size:20px; font-weight:700;">Heading</p>
                            <p class="card-text" style="color:#616161">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis, doloremque.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolor, veritatis..</p>
                        </div>

                        <div class="card-bottom p-1" style="border-top:1px solid #ddd;">
                            <p style="font-size:14px; color:#9e9e9e" class="mb-0">
                                Feb 24 2020 By Ravi Sharma
                            </p>
                        </div>
                    </div>
                </div>
            </div>


        </div>
        <!--        Recent Stories end-->




        <!--        Recent user review area-->

        <div class="product-contant mt-4" style="border: 1px solid #ddd">

            <div class="details-head">
                <p class="p-3 mb-0" style="border: 1px solid #ddd">
                    User Reviews
                </p>
            </div>
            <div class="row p-3 mx-2 recent-slide">
                <div class="col-md-12">
                    <div class="card" style="">
                        <img src="image/pulsar.webp" class="card-img-top" alt="...">
                        <div class="card-body">
                            <p style="font-size:20px; font-weight:700;">Heading</p>
                            <p class="card-text" style="color:#616161">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis, doloremque.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolor, veritatis..</p>
                        </div>

                        <div class="card-bottom p-1" style="border-top:1px solid #ddd;">
                            <p style="font-size:14px; color:#9e9e9e" class="mb-0">
                                Feb 24 2020 By Ravi Sharma
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card" style="">
                        <img src="image/pulsar.webp" class="card-img-top" alt="...">
                        <div class="card-body">
                            <p style="font-size:20px; font-weight:700;">Heading</p>
                            <p class="card-text" style="color:#616161">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis, doloremque.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolor, veritatis..</p>
                        </div>

                        <div class="card-bottom p-1" style="border-top:1px solid #ddd;">
                            <p style="font-size:14px; color:#9e9e9e" class="mb-0">
                                Feb 24 2020 By Ravi Sharma
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card" style="">
                        <img src="image/pulsar.webp" class="card-img-top" alt="...">
                        <div class="card-body">
                            <p style="font-size:20px; font-weight:700;">Heading</p>
                            <p class="card-text" style="color:#616161">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis, doloremque.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolor, veritatis..</p>
                        </div>

                        <div class="card-bottom p-1" style="border-top:1px solid #ddd;">
                            <p style="font-size:14px; color:#9e9e9e" class="mb-0">
                                Feb 24 2020 By Ravi Sharma
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card" style="">
                        <img src="image/pulsar.webp" class="card-img-top" alt="...">
                        <div class="card-body">
                            <p style="font-size:20px; font-weight:700;">Heading</p>
                            <p class="card-text" style="color:#616161">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis, doloremque.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolor, veritatis..</p>
                        </div>

                        <div class="card-bottom p-1" style="border-top:1px solid #ddd;">
                            <p style="font-size:14px; color:#9e9e9e" class="mb-0">
                                Feb 24 2020 By Ravi Sharma
                            </p>
                        </div>
                    </div>
                </div>
            </div>


        </div>
        <!--        Recent Stories end-->




        <!--        Recent user review area-->

        <div class="product-contant mt-4" style="border: 1px solid #ddd">

            <div class="details-head">
                <p class="p-3 mb-0" style="border: 1px solid #ddd">
                    Test Ride Reviews
                </p>
            </div>
            <div class="row p-3 mx-2 recent-slide">
                <div class="col-md-12">
                    <div class="card" style="">
                        <img src="image/pulsar.webp" class="card-img-top" alt="...">
                        <div class="card-body">
                            <p style="font-size:20px; font-weight:700;">Heading</p>
                            <p class="card-text" style="color:#616161">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis, doloremque.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolor, veritatis..</p>
                        </div>

                        <div class="card-bottom p-1" style="border-top:1px solid #ddd;">
                            <p style="font-size:14px; color:#9e9e9e" class="mb-0">
                                Feb 24 2020 By Ravi Sharma
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card" style="">
                        <img src="image/pulsar.webp" class="card-img-top" alt="...">
                        <div class="card-body">
                            <p style="font-size:20px; font-weight:700;">Heading</p>
                            <p class="card-text" style="color:#616161">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis, doloremque.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolor, veritatis..</p>
                        </div>

                        <div class="card-bottom p-1" style="border-top:1px solid #ddd;">
                            <p style="font-size:14px; color:#9e9e9e" class="mb-0">
                                Feb 24 2020 By Ravi Sharma
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card" style="">
                        <img src="image/pulsar.webp" class="card-img-top" alt="...">
                        <div class="card-body">
                            <p style="font-size:20px; font-weight:700;">Heading</p>
                            <p class="card-text" style="color:#616161">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis, doloremque.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolor, veritatis..</p>
                        </div>

                        <div class="card-bottom p-1" style="border-top:1px solid #ddd;">
                            <p style="font-size:14px; color:#9e9e9e" class="mb-0">
                                Feb 24 2020 By Ravi Sharma
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card" style="">
                        <img src="image/pulsar.webp" class="card-img-top" alt="...">
                        <div class="card-body">
                            <p style="font-size:20px; font-weight:700;">Heading</p>
                            <p class="card-text" style="color:#616161">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis, doloremque.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolor, veritatis..</p>
                        </div>

                        <div class="card-bottom p-1" style="border-top:1px solid #ddd;">
                            <p style="font-size:14px; color:#9e9e9e" class="mb-0">
                                Feb 24 2020 By Ravi Sharma
                            </p>
                        </div>
                    </div>
                </div>
            </div>


        </div>
        <!--        Recent Stories end-->








        <!--spec area-->
        <div class="product-contant mt-4 specs specks" id="speca" style="border: 1px solid #ddd">
            <div class="row mr-0 ml-0" style="border-bottom: 1px solid #ddd;">
                <div class="col-md-12">
                    <p class="p-3 mb-0">
                      
                          {{allProductdetails.title}}  {{allProductdetails.cc}}  CC  SPECIFICATION
                    </p>
                </div>
            </div>


            <div class="row mr-0 ml-0 p-3" style="border-bottom: 1px solid #ddd;">
                <div class="col-md-2 align-self-start">
                    <h4 class="p-0 mb-0">
                        Engine
                    </h4>
                </div>
                <div class="col-md-10">
                    <div class="row py-1">
                        <div class="col-md-3">
                            <p class="mb-0 spec-titel">
                                Engine Type
                            </p>
                        </div>
                        <div class="col-md-9">
                            <p class="mb-0 spec-detail">
                                {{allProductdetails.engine}}
                            </p>
                        </div>
                    </div>
                    <div class="row py-1">
                        <div class="col-md-3">
                            <p class="mb-0 spec-titel">
                                Maximum Power
                            </p>
                        </div>
                        <div class="col-md-9">
                            <p class="mb-0 spec-detail">
                                  {{allProductdetails.enginemaximumpower}}
                            </p>
                        </div>
                    </div>
                    <div class="row py-1">
                        <div class="col-md-3">
                            <p class="mb-0 spec-titel">
                                Maximum Torque
                            </p>
                        </div>
                        <div class="col-md-9">
                            <p class="mb-0 spec-detail">
                             {{allProductdetails.enginemaximumtorque}}
                            </p>
                        </div>
                    </div>
                    <div class="row py-1">
                        <div class="col-md-3">
                            <p class="mb-0 spec-titel">
                                Bore
                            </p>
                        </div>
                        <div class="col-md-9">
                            <p class="mb-0 spec-detail">
                                 {{allProductdetails.bore}}
                            </p>
                        </div>
                    </div>
                    <div class="row py-1">
                        <div class="col-md-3">
                            <p class="mb-0 spec-titel">
                                Stroke
                            </p>
                        </div>
                        <div class="col-md-9">
                            <p class="mb-0 spec-detail">
                                 {{allProductdetails.stroke}}
                            </p>
                        </div>
                    </div>
                    <div class="row py-1">
                        <div class="col-md-3">
                            <p class="mb-0 spec-titel">
                                Compression Ratio
                            </p>
                        </div>
                        <div class="col-md-9">
                            <p class="mb-0 spec-detail">
                                 {{allProductdetails.compressionratio}}
                            </p>
                        </div>
                    </div>
                    <div class="row py-1">
                        <div class="col-md-3">
                            <p class="mb-0 spec-titel">
                                No of Cylinders
                            </p>
                        </div>
                        <div class="col-md-9">
                            <p class="mb-0 spec-detail">
                                {{allProductdetails.cylinder}}
                            </p>
                        </div>
                    </div>



                </div>
            </div>
            <div class="row mr-0 ml-0 p-3" style="border-bottom: 1px solid #ddd;">
                <div class="col-md-2 align-self-start">
                    <h4 class="p-0 mb-0">
                        Transmission
                    </h4>
                </div>
                <div class="col-md-10">
                    <div class="row py-1">
                        <div class="col-md-3">
                            <p class="mb-0 spec-titel">
                                Transmission Type
                            </p>
                        </div>
                        <div class="col-md-9">
                            <p class="mb-0 spec-detail">
                               {{allProductdetails.transmission}}
                            </p>
                        </div>
                    </div>
                    <div class="row py-1">
                        <div class="col-md-3">
                            <p class="mb-0 spec-titel">
                                No of Gears
                            </p>
                        </div>
                        <div class="col-md-9">
                            <p class="mb-0 spec-detail">
                            {{allProductdetails.gears}}
                            </p>
                        </div>
                    </div>
                    <div class="row py-1">
                        <div class="col-md-3">
                            <p class="mb-0 spec-titel">
                                Clutch Type
                            </p>
                        </div>
                        <div class="col-md-9">
                            <p class="mb-0 spec-detail">
                               {{allProductdetails.clutch}}
                            </p>
                        </div>
                    </div>




                </div>
            </div>
            <div class="row mr-0 ml-0 p-3" style="border-bottom: 1px solid #ddd;">
                <div class="col-md-2 align-self-start">
                    <h4 class="p-0 mb-0">
                        Chassis & Suspension
                    </h4>
                </div>
                <div class="col-md-10">
                    <div class="row py-1">
                        <div class="col-md-3">
                            <p class="mb-0 spec-titel">
                                Chassis Type
                            </p>
                        </div>
                        <div class="col-md-9">
                            <p class="mb-0 spec-detail">
                               {{allProductdetails.chassis}}
                            </p>
                        </div>
                    </div>
                    <div class="row py-1">
                        <div class="col-md-3">
                            <p class="mb-0 spec-titel">
                                Front Suspension
                            </p>
                        </div>
                        <div class="col-md-9">
                            <p class="mb-0 spec-detail">
                                {{allProductdetails.frontsuspension}} (Stroke 135 mm)
                            </p>
                        </div>
                    </div>
                    <div class="row py-1">
                        <div class="col-md-3">
                            <p class="mb-0 spec-titel">
                                Rear Suspension
                            </p>
                        </div>
                        <div class="col-md-9">
                            <p class="mb-0 spec-detail">
                               {{allProductdetails.rearsuspension}} (Stroke 110 mm)
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mr-0 ml-0 p-3" style="border-bottom: 1px solid #ddd;">
                <div class="col-md-2 align-self-start">
                    <h4 class="p-0 mb-0">
                        Brakes
                    </h4>
                </div>
                <div class="col-md-10">
                    <div class="row py-1">
                        <div class="col-md-3">
                            <p class="mb-0 spec-titel">
                                Front Brake Type
                            </p>
                        </div>
                        <div class="col-md-9">
                            <p class="mb-0 spec-detail">
                             {{allProductdetails.frontbrake}}
                            </p>
                        </div>
                    </div>
                    <div class="row py-1">
                        <div class="col-md-3">
                            <p class="mb-0 spec-titel">
                                Rear Brake Type
                            </p>
                        </div>
                        <div class="col-md-9">
                            <p class="mb-0 spec-detail">
                              {{allProductdetails.rearbrake}}
                            </p>
                        </div>
                    </div>
                    <div class="row py-1">
                        <div class="col-md-3">
                            <p class="mb-0 spec-titel">
                                Front Brake Diameter
                            </p>
                        </div>
                        <div class="col-md-9">
                            <p class="mb-0 spec-detail">
                             {{allProductdetails.frontbrakediameter}}
                            </p>
                        </div>
                    </div>
                    <div class="row py-1">
                        <div class="col-md-3">
                            <p class="mb-0 spec-titel">
                                Rear Brake Diameter
                            </p>
                        </div>
                        <div class="col-md-9">
                            <p class="mb-0 spec-detail">
                             {{allProductdetails.rearbrakediameter}}
                            </p>
                        </div>
                    </div>
                    <div class="row py-1">
                        <div class="col-md-3">
                            <p class="mb-0 spec-titel">
                                Anti-Lock Braking System (ABS)
                            </p>
                        </div>
                        <div class="col-md-9">
                            <p class="mb-0 spec-detail">
                            {{allProductdetails.abs}}
                            </p>
                        </div>
                    </div>




                </div>
            </div>
            <div class="row mr-0 ml-0 p-3" style="border-bottom: 1px solid #ddd;">
                <div class="col-md-2 align-self-start">
                    <h4 class="p-0 mb-0">
                        Wheels & Tires
                    </h4>
                </div>
                <div class="col-md-10">
                    <div class="row py-1">
                        <div class="col-md-3">
                            <p class="mb-0 spec-titel">
                                Front Tire Size
                            </p>
                        </div>
                        <div class="col-md-9">
                            <p class="mb-0 spec-detail">
                                {{allProductdetails.ftyre}}
                            </p>
                        </div>
                    </div>
                    <div class="row py-1">
                        <div class="col-md-3">
                            <p class="mb-0 spec-titel">
                                Rear Tire Size
                            </p>
                        </div>
                        <div class="col-md-9">
                            <p class="mb-0 spec-detail">
                                {{allProductdetails.rtyre}}
                            </p>
                        </div>
                    </div>
                    <div class="row py-1">
                        <div class="col-md-3">
                            <p class="mb-0 spec-titel">
                                Tubeless Tires
                            </p>
                        </div>
                        <div class="col-md-9">
                            <p class="mb-0 spec-detail">
                           {{allProductdetails.tubeless}}
                            </p>
                        </div>
                    </div>




                </div>
            </div>
            <div class="row mr-0 ml-0 p-3" style="border-bottom: 1px solid #ddd;">
                <div class="col-md-2 align-self-start">
                    <h4 class="p-0 mb-0">
                        Dimensions
                    </h4>
                </div>
                <div class="col-md-10">
                    <div class="row py-1">
                        <div class="col-md-3">
                            <p class="mb-0 spec-titel">
                                Overall Length
                            </p>
                        </div>
                        <div class="col-md-9">
                            <p class="mb-0 spec-detail">
                                {{allProductdetails.overalllength}}
                            </p>
                        </div>
                    </div>
                    <div class="row py-1">
                        <div class="col-md-3">
                            <p class="mb-0 spec-titel">
                                Overall Width
                            </p>
                        </div>
                        <div class="col-md-9">
                            <p class="mb-0 spec-detail">
                                {{allProductdetails.overallwidth}}
                            </p>
                        </div>
                    </div>
                    <div class="row py-1">
                        <div class="col-md-3">
                            <p class="mb-0 spec-titel">
                                Ground Clearance
                            </p>
                        </div>
                        <div class="col-md-9">
                            <p class="mb-0 spec-detail">
                               {{allProductdetails.groundclearness}}
                            </p>
                        </div>
                    </div>
                    <div class="row py-1">
                        <div class="col-md-3">
                            <p class="mb-0 spec-titel">
                                Weight
                            </p>
                        </div>
                        <div class="col-md-9">
                            <p class="mb-0 spec-detail">
                                {{allProductdetails.weight}}
                            </p>
                        </div>
                    </div>
                    <div class="row py-1">
                        <div class="col-md-3">
                            <p class="mb-0 spec-titel">
                                Fuel Tank Capacity
                            </p>
                        </div>
                        <div class="col-md-9">
                            <p class="mb-0 spec-detail">
                                {{allProductdetails.ftcapacity}}
                            </p>
                        </div>
                    </div>
                    <div class="row py-1">
                        <div class="col-md-3">
                            <p class="mb-0 spec-titel">
                                Wheelbase
                            </p>
                        </div>
                        <div class="col-md-9">
                            <p class="mb-0 spec-detail">
                               {{allProductdetails.wheelbase}}
                            </p>
                        </div>
                    </div>




                </div>
            </div>
            <div class="row mr-0 ml-0 p-3" style="border-bottom: 1px solid #ddd;">
                <div class="col-md-2 align-self-start">
                    <h4 class="p-0 mb-0">
                        Electricals
                    </h4>
                </div>
                <div class="col-md-10">
                    <div class="row py-1">
                        <div class="col-md-3">
                            <p class="mb-0 spec-titel">
                                Battery Type
                            </p>
                        </div>
                        <div class="col-md-9">
                            <p class="mb-0 spec-detail">
                                {{allProductdetails.battery}}
                            </p>
                        </div>
                    </div>
                    <div class="row py-1">
                        <div class="col-md-3">
                            <p class="mb-0 spec-titel">
                                Battery Voltage
                            </p>
                        </div>
                        <div class="col-md-9">
                            <p class="mb-0 spec-detail">
                               {{allProductdetails.bvoltage}}
                            </p>
                        </div>
                    </div>
                    <div class="row py-1">
                        <div class="col-md-3">
                            <p class="mb-0 spec-titel">
                                Head Light
                            </p>
                        </div>
                        <div class="col-md-9">
                            <p class="mb-0 spec-detail">
                                {{allProductdetails.headlight}}(AHO)
                            </p>
                        </div>
                    </div>
                    <div class="row py-1">
                        <div class="col-md-3">
                            <p class="mb-0 spec-titel">
                                Tail Light
                            </p>
                        </div>
                        <div class="col-md-9">
                            <p class="mb-0 spec-detail">
                               {{allProductdetails.taillight}}
                            </p>
                        </div>
                    </div>
                    <div class="row py-1">
                        <div class="col-md-3">
                            <p class="mb-0 spec-titel">
                                Indicators
                            </p>
                        </div>
                        <div class="col-md-9">
                            <p class="mb-0 spec-detail">
                                 {{allProductdetails.indicators}}
                            </p>
                        </div>
                    </div>




                </div>
            </div>
            <div class="row mr-0 ml-0 p-3" style="border-bottom: 1px solid #ddd;">
                <div class="col-md-2 align-self-start">
                    <h4 class="p-0 mb-0">
                        Features
                    </h4>
                </div>
                <div class="col-md-10">
                    <div class="row py-1">
                        <div class="col-md-3">
                            <p class="mb-0 spec-titel">
                                Speedometer
                            </p>
                        </div>
                        <div class="col-md-9">
                            <p class="mb-0 spec-detail">
                               {{allProductdetails.speedometer}}
                            </p>
                        </div>
                    </div>
                    <div class="row py-1">
                        <div class="col-md-3">
                            <p class="mb-0 spec-titel">
                                Odometer
                            </p>
                        </div>
                        <div class="col-md-9">
                            <p class="mb-0 spec-detail">
                               {{allProductdetails.odometer}}
                            </p>
                        </div>
                    </div>
                    <div class="row py-1">
                        <div class="col-md-3">
                            <p class="mb-0 spec-titel">
                                RPM Meter
                            </p>
                        </div>
                        <div class="col-md-9">
                            <p class="mb-0 spec-detail">
                               {{allProductdetails.rpmmeter}}
                            </p>
                        </div>
                    </div>
                    <div class="row py-1">
                        <div class="col-md-3">
                            <p class="mb-0 spec-titel">
                                Handle Type
                            </p>
                        </div>
                        <div class="col-md-9">
                            <p class="mb-0 spec-detail">
                               {{allProductdetails.handle}}
                            </p>
                        </div>
                    </div>
                    <div class="row py-1">
                        <div class="col-md-3">
                            <p class="mb-0 spec-titel">
                                Seat Type
                            </p>
                        </div>
                        <div class="col-md-9">
                            <p class="mb-0 spec-detail">
                               {{allProductdetails.seattype}}
                            </p>
                        </div>
                    </div>
                    <div class="row py-1">
                        <div class="col-md-3">
                            <p class="mb-0 spec-titel">
                                Passenger Grab Rail
                            </p>
                        </div>
                        <div class="col-md-9">
                            <p class="mb-0 spec-detail">
                             {{allProductdetails.passenger}}
                            </p>
                        </div>
                    </div>
                    <div class="row py-1">
                        <div class="col-md-3">
                            <p class="mb-0 spec-titel">
                                Engine Kill Switch
                            </p>
                        </div>
                        <div class="col-md-9">
                            <p class="mb-0 spec-detail">
                               {{allProductdetails.engineks}}
                            </p>
                        </div>
                    </div>




                </div>
            </div>



            <div class="row">
                <div class="col-md-12">
                    <p class="mb-0 p-3 ml-3" style="font-size:12px; color:#999;">
                        Disclaimer: The price & specs shown may be different from actual. Please confirm on the retailer site before purchasing.
                    </p>
                </div>
            </div>

        </div>
        <!--spec area end-->




        <!--        photo area-->

        <div class="product-contant mt-4" style="border: 1px solid #ddd">

            <div class="details-head">
                <p class="p-3 mb-0" style="border: 1px solid #ddd">
                    Photo Albums
                </p>
            </div>
            <div class="row p-3">
                <div class="col-md-12 text-center p-3 ">
                    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <div  v-for="productimag,index in allProductdetails.images" :class="{ 'active' : index+1==1}"  class="carousel-item" >
                             
                                    <img :src="'/images/productimages/slider/'+productimag.productimage" alt="not" class="d-block w-100">
                            </div>
                           
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>

        </div>








        <!--        photo area-->

        <div class="product-contant Competitors mt-4" style="border: 1px solid #ddd">

            <div class="details-head">
                <p class="p-3 mb-0" style="border: 1px solid #ddd">
                    Competitors for Bajaj Pulsar 150
                </p>
            </div>
            <div class="row p-3">
                <div class="col-md-3">
                    <div class="card " style="">
                        <img src="image/pulsar.webp" class="card-img-top" alt="...">
                        <div class="card-body p-0">
                            <p style="font-size:18px; font-weight:400;" class="p-3">Pulsar 150</p>



                            <p class="mb-0 body-p p-3">
                                <a href="#">
                                    Available
                                    <span>Tk.0000</span>
                                </a>
                            </p>
                        </div>

                        <div class="card-bottom p-1" style="border-top:1px solid #ddd;">
                            <p style="font-size:14px; color:#9e9e9e;" class="mb-0">
                                <span>THIS COMPETITOR HAS</span>
                            </p>
                            <ul class="com-details pl-3">

                                <li><i class="far fa-thumbs-up text-success"></i> Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet.</li>
                                <li><i class="far fa-thumbs-up text-success"></i> Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet.</li>
                                <li><i class="far fa-thumbs-up text-success"></i> Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet.</li>
                                <li><i class="far fa-thumbs-up text-success"></i> Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet.</li>
                                <li><i class="far fa-thumbs-up text-success"></i> Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet.</li>
                                <li><i class="far fa-thumbs-down text-danger"></i> Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet.</li>
                                <li><i class="far fa-thumbs-down text-danger"></i> Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet.</li>
                                <li><i class="far fa-thumbs-down text-danger"></i> Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet.</li>
                                <li><i class="far fa-thumbs-down text-danger"></i> Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet.</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-9 pl-5 pr-5">
                    <div class="row Competitor-slider">
                        <div class="col-md-12">
                            <div class="card " style="">
                                <img src="image/pulsar.webp" class="card-img-top" alt="...">
                                <div class="card-body p-0">
                                    <p style="font-size:18px; font-weight:400;" class="p-3">Other 150</p>



                                    <p class="mb-0 body-p p-3">
                                        <a href="#">
                                            Available
                                            <span>Tk.0000</span>
                                        </a>
                                    </p>
                                </div>

                                <div class="card-bottom p-1" style="border-top:1px solid #ddd;">
                                    <p style="font-size:14px; color:#9e9e9e;" class="mb-0">
                                        <span>THIS COMPETITOR HAS</span>
                                    </p>
                                    <ul class="com-details pl-3">

                                        <li><i class="far fa-thumbs-up text-success"></i> Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet.</li>
                                        <li><i class="far fa-thumbs-up text-success"></i> Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet.</li>
                                        <li><i class="far fa-thumbs-up text-success"></i> Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet.</li>
                                        <li><i class="far fa-thumbs-up text-success"></i> Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet.</li>
                                        <li><i class="far fa-thumbs-up text-success"></i> Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet.</li>
                                        <li><i class="far fa-thumbs-down text-danger"></i> Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet.</li>
                                        <li><i class="far fa-thumbs-down text-danger"></i> Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet.</li>
                                        <li><i class="far fa-thumbs-down text-danger"></i> Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet.</li>
                                        <li><i class="far fa-thumbs-down text-danger"></i> Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet.</li>
                                    </ul>
                                </div>
                                <p class="vs text-center" style="border-top:1px solid #ddd">
                                    <a href="#">
                                        Pulsar 150 <br>
                                        <span>VS</span>
                                        Others
                                    </a>
                                </p>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="card " style="">
                                <img src="image/pulsar.webp" class="card-img-top" alt="...">
                                <div class="card-body p-0">
                                    <p style="font-size:18px; font-weight:400;" class="p-3">Other 150</p>



                                    <p class="mb-0 body-p p-3">
                                        <a href="#">
                                            Available
                                            <span>Tk.0000</span>
                                        </a>
                                    </p>
                                </div>

                                <div class="card-bottom p-1" style="border-top:1px solid #ddd;">
                                    <p style="font-size:14px; color:#9e9e9e;" class="mb-0">
                                        <span>THIS COMPETITOR HAS</span>
                                    </p>
                                    <ul class="com-details pl-3">

                                        <li><i class="far fa-thumbs-up text-success"></i> Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet.</li>
                                        <li><i class="far fa-thumbs-up text-success"></i> Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet.</li>
                                        <li><i class="far fa-thumbs-up text-success"></i> Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet.</li>
                                        <li><i class="far fa-thumbs-up text-success"></i> Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet.</li>
                                        <li><i class="far fa-thumbs-up text-success"></i> Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet.</li>
                                        <li><i class="far fa-thumbs-down text-danger"></i> Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet.</li>
                                        <li><i class="far fa-thumbs-down text-danger"></i> Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet.</li>
                                        <li><i class="far fa-thumbs-down text-danger"></i> Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet.</li>
                                        <li><i class="far fa-thumbs-down text-danger"></i> Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet.</li>
                                    </ul>
                                </div>

                                <p class="vs text-center" style="border-top:1px solid #ddd">
                                    <a href="#">
                                        Pulsar 150 <br>
                                        <span>VS</span>
                                        Others
                                    </a>
                                </p>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="card " style="">
                                <img src="image/pulsar.webp" class="card-img-top" alt="...">
                                <div class="card-body p-0">
                                    <p style="font-size:18px; font-weight:400;" class="p-3">Other 150</p>



                                    <p class="mb-0 body-p p-3">
                                        <a href="#">
                                            Available
                                            <span>Tk.0000</span>
                                        </a>
                                    </p>
                                </div>

                                <div class="card-bottom p-1" style="border-top:1px solid #ddd;">
                                    <p style="font-size:14px; color:#9e9e9e;" class="mb-0">
                                        <span>THIS COMPETITOR HAS</span>
                                    </p>
                                    <ul class="com-details pl-3">

                                        <li><i class="far fa-thumbs-up text-success"></i> Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet.</li>
                                        <li><i class="far fa-thumbs-up text-success"></i> Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet.</li>
                                        <li><i class="far fa-thumbs-up text-success"></i> Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet.</li>
                                        <li><i class="far fa-thumbs-up text-success"></i> Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet.</li>
                                        <li><i class="far fa-thumbs-up text-success"></i> Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet.</li>
                                        <li><i class="far fa-thumbs-down text-danger"></i> Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet.</li>
                                        <li><i class="far fa-thumbs-down text-danger"></i> Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet.</li>
                                        <li><i class="far fa-thumbs-down text-danger"></i> Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet.</li>
                                        <li><i class="far fa-thumbs-down text-danger"></i> Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet.</li>
                                    </ul>
                                </div>
                                <p class="vs text-center" style="border-top:1px solid #ddd">
                                    <a href="#">
                                        Pulsar 150 <br>
                                        <span>VS</span>
                                        Others
                                    </a>
                                </p>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="card " style="">
                                <img src="image/pulsar.webp" class="card-img-top" alt="...">
                                <div class="card-body p-0">
                                    <p style="font-size:18px; font-weight:400;" class="p-3">Other 150</p>



                                    <p class="mb-0 body-p p-3">
                                        <a href="#">
                                            Available
                                            <span>Tk.0000</span>
                                        </a>
                                    </p>
                                </div>

                                <div class="card-bottom p-1" style="border-top:1px solid #ddd;">
                                    <p style="font-size:14px; color:#9e9e9e;" class="mb-0">
                                        <span>THIS COMPETITOR HAS</span>
                                    </p>
                                    <ul class="com-details pl-3">

                                        <li><i class="far fa-thumbs-up text-success"></i> Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet.</li>
                                        <li><i class="far fa-thumbs-up text-success"></i> Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet.</li>
                                        <li><i class="far fa-thumbs-up text-success"></i> Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet.</li>
                                        <li><i class="far fa-thumbs-up text-success"></i> Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet.</li>
                                        <li><i class="far fa-thumbs-up text-success"></i> Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet.</li>
                                        <li><i class="far fa-thumbs-down text-danger"></i> Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet.</li>
                                        <li><i class="far fa-thumbs-down text-danger"></i> Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet.</li>
                                        <li><i class="far fa-thumbs-down text-danger"></i> Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet.</li>
                                        <li><i class="far fa-thumbs-down text-danger"></i> Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet.</li>
                                    </ul>
                                </div>
                                <p class="vs text-center" style="border-top:1px solid #ddd">
                                    <a href="#">
                                        Pulsar 150 <br>
                                        <span>VS</span>
                                        Others
                                    </a>
                                </p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>


        </div>
        <!--        photo area end-->










        <!--       ask qus area-->

        <div class="product-contant mt-4 ask-qus" style="border: 1px solid #ddd">



            <div class="row p-3" style="padding-top:0 !important; padding-bottom:0 !important">
                <div class="col-md-2">
                    <img src="image/ask-que.png" alt="" class="w-100 p-3">

                </div>
                <div class="col-md-10">
                    <div class="details-head">
                        <p class="p-3 mb-0" style="font-size:22px; color:#454545; font-weight:400; padding-left:0 !important; padding-bottom:0 !important; text-transform: capitalize">
                            Are you Confused?
                        </p>
                        <p class="" style="text-transform: capitalize">
                            Ask anything & get answer in 48 hours
                        </p>
                    </div>
                    <form class="form-inline" style="width:100%;">
                        <input class="form-control mr-sm-2 ask-form" type="search" placeholder="Ask Question" aria-label="Search">
                        <button class="btn my-2 my-sm-0" type="submit">Ask a Question</button>
                    </form>
                </div>


            </div>

            <div class="ans-content m-3 p-2" style="border:1px solid #ddd;">

                <div class="row">
                    <div class="col-md-12">
                        <div class="qus-area p-3" style="margin-top:0 !important; padding-top:0 !important; margin-bottom:0 !important; padding-bottom:0 !important;">
                            <p class="mb-2"><a href="#">Question?</a></p>
                        </div>
                    </div>
                </div>



                <div class="row">
                    <div class="col-md-12">
                        <div class="ans-area p-3" style="margin-top:0 !important; padding-top:0 !important; margin-bottom:0 !important; padding-bottom:0 !important;">


                            <ul class="mb-0 d-flex mb-2">
                                <li class="mr-2">
                                    <p class="n-icn mb-0">
                                        <span>
                                            N
                                        </span>
                                    </p>
                                </li>
                                <li>
                                    <p class=" mb-0" style="line-height:32px; font-size:12px; font-weight:300; color:#666">
                                        Answered by <a href="#" style="color:#000; text-decoration:underline">Nikhil Sengupta</a> | 5 months ago
                                    </p>
                                </li>
                            </ul>


                        </div>
                    </div>
                </div>




                <div class="row">
                    <div class="col-md-12">
                        <div class="ans-area p-3" style="margin-top:0 !important; padding-top:0 !important; margin-bottom:0 !important; padding-bottom:0 !important;">

                            <p class="ans">Answer.....</p>
                            <a href="#" class="qa-read">read more...</a>
                        </div>
                    </div>
                </div>





                <div class="row mt-2 mr-0 ml-0" style="border-top:1px solid #ddd">
                    <div class="col-md-6 align-self-center">
                        <div id="qa-bottom" class="p-3" style="padding-top:0 !important; padding-bottom:0 !important">
                            <ul class="mb-0">
                                <li><a href="#" style="border-right:1px solid #ddd" class="">0 <i class="far fa-thumbs-up"></i></a></li>
                                <li><a href="#" style="border-right:1px solid #ddd" class="">0 <i class="far fa-comment"></i></a></li>
                                <li><a href="#" class="">Spam?</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-6 align-self-center aa-button">
                        <button type="button" class="btn btn-outline-primary t-btn mt-1 mb-1"><i class="fas fa-plus"></i> Add Answer</button>
                    </div>
                </div>

            </div>

        </div>
        <!-- ask qus area end-->



        <!--        RECENTLY VIEWED area-->
        <div class="recent-product-contant mt-4" style="border: 1px solid #ddd">

            <div class="details-head mb-3">
                <p class="p-3 mb-0" style="border-bottom:1px solid #ddd">
                    Popular Bikes
                </p>
            </div>
            <div class="row  p-4" style="padding-top:0 !important">
                <div class="col-md-4">
                    <div class="recent-content" style="border: 1px solid #ddd">

                        <div class="row">
                            <div class="col-md-4 align-self-center">
                                <img src="image/pulsar.webp" alt="" class="w-100">
                            </div>
                            <div class="col-md-8 align-self-center" style="padding-top:5px; padding-bottom:5px; padding-left:0;">
                                <p class="mb-1">
                                    <a href="#" style="color:#424242;"> Bajaj Pulsar 150 </a>
                                </p>
                                <p class="mb-1" style="font-weight:600; color:#212121">
                                    Tk.0000
                                </p>
                                <p class="mb-0" style="font-size:14px; color:#212121">
                                    <input type="checkbox"> Add to compare
                                </p>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-md-4">
                    <div class="recent-content" style="border: 1px solid #ddd">

                        <div class="row">
                            <div class="col-md-4 align-self-center">
                                <img src="image/pulsar.webp" alt="" class="w-100">
                            </div>
                            <div class="col-md-8 align-self-center" style="padding-top:5px; padding-bottom:5px; padding-left:0;">
                                <p class="mb-1">
                                    <a href="#" style="color:#424242;"> Bajaj Pulsar 150 </a>
                                </p>
                                <p class="mb-1" style="font-weight:600; color:#212121">
                                    Tk.0000
                                </p>
                                <p class="mb-0" style="font-size:14px; color:#212121">
                                    <input type="checkbox"> Add to compare
                                </p>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-md-4">
                    <div class="recent-content" style="border: 1px solid #ddd">

                        <div class="row">
                            <div class="col-md-4 align-self-center">
                                <img src="image/pulsar.webp" alt="" class="w-100">
                            </div>
                            <div class="col-md-8 align-self-center" style="padding-top:5px; padding-bottom:5px; padding-left:0;">
                                <p class="mb-1">
                                    <a href="#" style="color:#424242;"> Bajaj Pulsar 150 </a>
                                </p>
                                <p class="mb-1" style="font-weight:600; color:#212121">
                                    Tk.0000
                                </p>
                                <p class="mb-0" style="font-size:14px; color:#212121">
                                    <input type="checkbox"> Add to compare
                                </p>
                            </div>
                        </div>

                    </div>
                </div>



            </div>
            <div class="row  p-4" style="padding-top:0 !important">
                <div class="col-md-4">
                    <div class="recent-content" style="border: 1px solid #ddd">

                        <div class="row">
                            <div class="col-md-4 align-self-center">
                                <img src="image/pulsar.webp" alt="" class="w-100">
                            </div>
                            <div class="col-md-8 align-self-center" style="padding-top:5px; padding-bottom:5px; padding-left:0;">
                                <p class="mb-1">
                                    <a href="#" style="color:#424242;"> Bajaj Pulsar 150 </a>
                                </p>
                                <p class="mb-1" style="font-weight:600; color:#212121">
                                    Tk.0000
                                </p>
                                <p class="mb-0" style="font-size:14px; color:#212121">
                                    <input type="checkbox"> Add to compare
                                </p>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-md-4">
                    <div class="recent-content" style="border: 1px solid #ddd">

                        <div class="row">
                            <div class="col-md-4 align-self-center">
                                <img src="image/pulsar.webp" alt="" class="w-100">
                            </div>
                            <div class="col-md-8 align-self-center" style="padding-top:5px; padding-bottom:5px; padding-left:0;">
                                <p class="mb-1">
                                    <a href="#" style="color:#424242;"> Bajaj Pulsar 150 </a>
                                </p>
                                <p class="mb-1" style="font-weight:600; color:#212121">
                                    Tk.0000
                                </p>
                                <p class="mb-0" style="font-size:14px; color:#212121">
                                    <input type="checkbox"> Add to compare
                                </p>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-md-4">
                    <div class="recent-content" style="border: 1px solid #ddd">

                        <div class="row">
                            <div class="col-md-4 align-self-center">
                                <img src="image/pulsar.webp" alt="" class="w-100">
                            </div>
                            <div class="col-md-8 align-self-center" style="padding-top:5px; padding-bottom:5px; padding-left:0;">
                                <p class="mb-1">
                                    <a href="#" style="color:#424242;"> Bajaj Pulsar 150 </a>
                                </p>
                                <p class="mb-1" style="font-weight:600; color:#212121">
                                    Tk.0000
                                </p>
                                <p class="mb-0" style="font-size:14px; color:#212121">
                                    <input type="checkbox"> Add to compare
                                </p>
                            </div>
                        </div>

                    </div>
                </div>



            </div>
            <div class="row  p-4" style="padding-top:0 !important">
                <div class="col-md-4">
                    <div class="recent-content" style="border: 1px solid #ddd">

                        <div class="row">
                            <div class="col-md-4 align-self-center">
                                <img src="image/pulsar.webp" alt="" class="w-100">
                            </div>
                            <div class="col-md-8 align-self-center" style="padding-top:5px; padding-bottom:5px; padding-left:0;">
                                <p class="mb-1">
                                    <a href="#" style="color:#424242;"> Bajaj Pulsar 150 </a>
                                </p>
                                <p class="mb-1" style="font-weight:600; color:#212121">
                                    Tk.0000
                                </p>
                                <p class="mb-0" style="font-size:14px; color:#212121">
                                    <input type="checkbox"> Add to compare
                                </p>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-md-4">
                    <div class="recent-content" style="border: 1px solid #ddd">

                        <div class="row">
                            <div class="col-md-4 align-self-center">
                                <img src="image/pulsar.webp" alt="" class="w-100">
                            </div>
                            <div class="col-md-8 align-self-center" style="padding-top:5px; padding-bottom:5px; padding-left:0;">
                                <p class="mb-1">
                                    <a href="#" style="color:#424242;"> Bajaj Pulsar 150 </a>
                                </p>
                                <p class="mb-1" style="font-weight:600; color:#212121">
                                    Tk.0000
                                </p>
                                <p class="mb-0" style="font-size:14px; color:#212121">
                                    <input type="checkbox"> Add to compare
                                </p>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-md-4">
                    <div class="recent-content" style="border: 1px solid #ddd">

                        <div class="row">
                            <div class="col-md-4 align-self-center">
                                <img src="image/pulsar.webp" alt="" class="w-100">
                            </div>
                            <div class="col-md-8 align-self-center" style="padding-top:5px; padding-bottom:5px; padding-left:0;">
                                <p class="mb-1">
                                    <a href="#" style="color:#424242;"> Bajaj Pulsar 150 </a>
                                </p>
                                <p class="mb-1" style="font-weight:600; color:#212121">
                                    Tk.0000
                                </p>
                                <p class="mb-0" style="font-size:14px; color:#212121">
                                    <input type="checkbox"> Add to compare
                                </p>
                            </div>
                        </div>

                    </div>
                </div>



            </div>
            <div class="row  p-4" style="padding-top:0 !important">
                <div class="col-md-4">
                    <div class="recent-content" style="border: 1px solid #ddd">

                        <div class="row">
                            <div class="col-md-4 align-self-center">
                                <img src="image/pulsar.webp" alt="" class="w-100">
                            </div>
                            <div class="col-md-8 align-self-center" style="padding-top:5px; padding-bottom:5px; padding-left:0;">
                                <p class="mb-1">
                                    <a href="#" style="color:#424242;"> Bajaj Pulsar 150 </a>
                                </p>
                                <p class="mb-1" style="font-weight:600; color:#212121">
                                    Tk.0000
                                </p>
                                <p class="mb-0" style="font-size:14px; color:#212121">
                                    <input type="checkbox"> Add to compare
                                </p>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-md-4">
                    <div class="recent-content" style="border: 1px solid #ddd">

                        <div class="row">
                            <div class="col-md-4 align-self-center">
                                <img src="image/pulsar.webp" alt="" class="w-100">
                            </div>
                            <div class="col-md-8 align-self-center" style="padding-top:5px; padding-bottom:5px; padding-left:0;">
                                <p class="mb-1">
                                    <a href="#" style="color:#424242;"> Bajaj Pulsar 150 </a>
                                </p>
                                <p class="mb-1" style="font-weight:600; color:#212121">
                                    Tk.0000
                                </p>
                                <p class="mb-0" style="font-size:14px; color:#212121">
                                    <input type="checkbox"> Add to compare
                                </p>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-md-4">
                    <div class="recent-content" style="border: 1px solid #ddd">

                        <div class="row">
                            <div class="col-md-4 align-self-center">
                                <img src="image/pulsar.webp" alt="" class="w-100">
                            </div>
                            <div class="col-md-8 align-self-center" style="padding-top:5px; padding-bottom:5px; padding-left:0;">
                                <p class="mb-1">
                                    <a href="#" style="color:#424242;"> Bajaj Pulsar 150 </a>
                                </p>
                                <p class="mb-1" style="font-weight:600; color:#212121">
                                    Tk.0000
                                </p>
                                <p class="mb-0" style="font-size:14px; color:#212121">
                                    <input type="checkbox"> Add to compare
                                </p>
                            </div>
                        </div>

                    </div>
                </div>



            </div>
            <div class="row  p-4" style="padding-top:0 !important">
                <div class="col-md-4">
                    <div class="recent-content" style="border: 1px solid #ddd">

                        <div class="row">
                            <div class="col-md-4 align-self-center">
                                <img src="image/pulsar.webp" alt="" class="w-100">
                            </div>
                            <div class="col-md-8 align-self-center" style="padding-top:5px; padding-bottom:5px; padding-left:0;">
                                <p class="mb-1">
                                    <a href="#" style="color:#424242;"> Bajaj Pulsar 150 </a>
                                </p>
                                <p class="mb-1" style="font-weight:600; color:#212121">
                                    Tk.0000
                                </p>
                                <p class="mb-0" style="font-size:14px; color:#212121">
                                    <input type="checkbox"> Add to compare
                                </p>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-md-4">
                    <div class="recent-content" style="border: 1px solid #ddd">

                        <div class="row">
                            <div class="col-md-4 align-self-center">
                                <img src="image/pulsar.webp" alt="" class="w-100">
                            </div>
                            <div class="col-md-8 align-self-center" style="padding-top:5px; padding-bottom:5px; padding-left:0;">
                                <p class="mb-1">
                                    <a href="#" style="color:#424242;"> Bajaj Pulsar 150 </a>
                                </p>
                                <p class="mb-1" style="font-weight:600; color:#212121">
                                    Tk.0000
                                </p>
                                <p class="mb-0" style="font-size:14px; color:#212121">
                                    <input type="checkbox"> Add to compare
                                </p>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-md-4">
                    <div class="recent-content" style="border: 1px solid #ddd">

                        <div class="row">
                            <div class="col-md-4 align-self-center">
                                <img src="image/pulsar.webp" alt="" class="w-100">
                            </div>
                            <div class="col-md-8 align-self-center" style="padding-top:5px; padding-bottom:5px; padding-left:0;">
                                <p class="mb-1">
                                    <a href="#" style="color:#424242;"> Bajaj Pulsar 150 </a>
                                </p>
                                <p class="mb-1" style="font-weight:600; color:#212121">
                                    Tk.0000
                                </p>
                                <p class="mb-0" style="font-size:14px; color:#212121">
                                    <input type="checkbox"> Add to compare
                                </p>
                            </div>
                        </div>

                    </div>
                </div>



            </div>
            <div class="row  p-4" style="padding-top:0 !important">
                <div class="col-md-4">
                    <div class="recent-content" style="border: 1px solid #ddd">

                        <div class="row">
                            <div class="col-md-4 align-self-center">
                                <img src="image/pulsar.webp" alt="" class="w-100">
                            </div>
                            <div class="col-md-8 align-self-center" style="padding-top:5px; padding-bottom:5px; padding-left:0;">
                                <p class="mb-1">
                                    <a href="#" style="color:#424242;"> Bajaj Pulsar 150 </a>
                                </p>
                                <p class="mb-1" style="font-weight:600; color:#212121">
                                    Tk.0000
                                </p>
                                <p class="mb-0" style="font-size:14px; color:#212121">
                                    <input type="checkbox"> Add to compare
                                </p>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-md-4">
                    <div class="recent-content" style="border: 1px solid #ddd">

                        <div class="row">
                            <div class="col-md-4 align-self-center">
                                <img src="image/pulsar.webp" alt="" class="w-100">
                            </div>
                            <div class="col-md-8 align-self-center" style="padding-top:5px; padding-bottom:5px; padding-left:0;">
                                <p class="mb-1">
                                    <a href="#" style="color:#424242;"> Bajaj Pulsar 150 </a>
                                </p>
                                <p class="mb-1" style="font-weight:600; color:#212121">
                                    Tk.0000
                                </p>
                                <p class="mb-0" style="font-size:14px; color:#212121">
                                    <input type="checkbox"> Add to compare
                                </p>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-md-4">
                    <div class="recent-content" style="border: 1px solid #ddd">

                        <div class="row">
                            <div class="col-md-4 align-self-center">
                                <img src="image/pulsar.webp" alt="" class="w-100">
                            </div>
                            <div class="col-md-8 align-self-center" style="padding-top:5px; padding-bottom:5px; padding-left:0;">
                                <p class="mb-1">
                                    <a href="#" style="color:#424242;"> Bajaj Pulsar 150 </a>
                                </p>
                                <p class="mb-1" style="font-weight:600; color:#212121">
                                    Tk.0000
                                </p>
                                <p class="mb-0" style="font-size:14px; color:#212121">
                                    <input type="checkbox"> Add to compare
                                </p>
                            </div>
                        </div>

                    </div>
                </div>



            </div>
            <div class="row  p-4" style="padding-top:0 !important">
                <div class="col-md-4">
                    <div class="recent-content" style="border: 1px solid #ddd">

                        <div class="row">
                            <div class="col-md-4 align-self-center">
                                <img src="image/pulsar.webp" alt="" class="w-100">
                            </div>
                            <div class="col-md-8 align-self-center" style="padding-top:5px; padding-bottom:5px; padding-left:0;">
                                <p class="mb-1">
                                    <a href="#" style="color:#424242;"> Bajaj Pulsar 150 </a>
                                </p>
                                <p class="mb-1" style="font-weight:600; color:#212121">
                                    Tk.0000
                                </p>
                                <p class="mb-0" style="font-size:14px; color:#212121">
                                    <input type="checkbox"> Add to compare
                                </p>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-md-4">
                    <div class="recent-content" style="border: 1px solid #ddd">

                        <div class="row">
                            <div class="col-md-4 align-self-center">
                                <img src="image/pulsar.webp" alt="" class="w-100">
                            </div>
                            <div class="col-md-8 align-self-center" style="padding-top:5px; padding-bottom:5px; padding-left:0;">
                                <p class="mb-1">
                                    <a href="#" style="color:#424242;"> Bajaj Pulsar 150 </a>
                                </p>
                                <p class="mb-1" style="font-weight:600; color:#212121">
                                    Tk.0000
                                </p>
                                <p class="mb-0" style="font-size:14px; color:#212121">
                                    <input type="checkbox"> Add to compare
                                </p>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-md-4">
                    <div class="recent-content" style="border: 1px solid #ddd">

                        <div class="row">
                            <div class="col-md-4 align-self-center">
                                <img src="image/pulsar.webp" alt="" class="w-100">
                            </div>
                            <div class="col-md-8 align-self-center" style="padding-top:5px; padding-bottom:5px; padding-left:0;">
                                <p class="mb-1">
                                    <a href="#" style="color:#424242;"> Bajaj Pulsar 150 </a>
                                </p>
                                <p class="mb-1" style="font-weight:600; color:#212121">
                                    Tk.0000
                                </p>
                                <p class="mb-0" style="font-size:14px; color:#212121">
                                    <input type="checkbox"> Add to compare
                                </p>
                            </div>
                        </div>

                    </div>
                </div>



            </div>


        </div>
        <!--        RECENTLY VIEWED area end-->




        <!--facebook comment area -->
        <div class="product-contant mt-4 p-3 text-center" style="border: 1px solid #ddd">

            <div id="fb-root"></div>
            <div class="fb-comments" data-href="https://developers.facebook.com/docs/plugins/comments#configurator" data-width="100%" data-numposts="5"></div>



        </div>
        <!--facebook comment area end-->



    </div>

</section>



</span>

              
</template>


<script>

export default {
  name: "Productdetails",

  data() {
    return {
        
      form: new Form({
        id: this.$route.params.id,
        name: "",
        comment:"",
        email: "",
        web: "",
        }),
        
        headful:{
            
        description:'',
        keywords:'',  
        },
         authenticatedname:null,
         authenticatedimage:null,
         title:null,
         name:null,
         description:null,
         blogpostdetails:[],
         Allrelatedblog:[],
         allProductdetails:[],
    }
    
  },
  
 
    //  created () {
    //    document.title = this.$route.params.id;
    //          axios.get(`/blog/${this.$route.params.id}`)
    //             .then(response => {
    //                   (this.blogpostdetails = response.data.blogpostdetails);
    //                   this.headful.description=response.data.blogpostdetails.metadescription;
    //                   this.headful.keywords=response.data.blogpostdetails.keyword;
    //                 });
            
    //     },
  mounted() {

                           
   var token= localStorage.getItem("token");
      var user= localStorage.getItem("user");
     
      if( token && user){
       
           this.authenticatedimage=JSON.parse(localStorage.getItem("user")).userimage;
        this.authenticatedname= JSON.parse(localStorage.getItem("user")).username;
      
         
      };

                   
            axios.get(`/product/${this.$route.params.id}`)
           .then(response => {
           this.allProductdetails = response.data.productdetails;
           
   
    }); 
                    
      
      
  },
  
  methods: {
           logOutNow(){
        //alert(5);
       localStorage.clear();
        this.$router.push("/en/login")
      },
     addBlogComment() {
     
        this.form.post("/createcomment")
        //console.log('ok');
         .then(({ response = true }) => {
          [toastr.success("Comment Create Successfull")],
           this.form.comment='',
         this.form.name='',
         this.form.web='',
         this.form.email='',
          axios.get(`/blogpostdetails/${this.$route.params.id}`)
                .then(response => {
                      (this.blogpostdetails = response.data.blogpostdetails);
                       
                    });
      
        // this.blogpostdetails={}; 
        })
        .catch(function(response) {
          console.log(response);
          toastr.warning("Sorry Try Agin");
        });
    },
      
       
    }

};


</script>

  <style>
        span img{
            max-width:600px;
        }
        </style>
  