@extends('layouts.user')

@section('user')

        
<section id="single-blog">
    <div class="container">
        <div class="row">
            <div class="col-md-2">
                <h4 class="single-left">
                    Bike Brands
                </h4>
                <div class="brand-list">
                    <ul class="brnand-name">
                        <li><a href="#">Honda</a></li>
                        <li><a href="#">Honda</a></li>
                        <li><a href="#">Honda</a></li>
                        <li><a href="#">Honda</a></li>
                        <li><a href="#">Honda</a></li>
                        <li><a href="#">Honda</a></li>
                        <li><a href="#">Honda</a></li>
                        <li><a href="#">Honda</a></li>
                        <li><a href="#">Honda</a></li>
                        <li><a href="#">Honda</a></li>
                        <li><a href="#">Honda</a></li>
                        <li><a href="#">Honda</a></li>
                        <li><a href="#">Honda</a></li>
                        <li><a href="#">Honda</a></li>
                        <li><a href="#">Honda</a></li>
                        <li><a href="#">Honda</a></li>
                        <li><a href="#">Honda</a></li>
                        <li><a href="#">Honda</a></li>
                        <li><a href="#">Honda</a></li>
                        <li><a href="#">Honda</a></li>
                        <li><a href="#">Honda</a></li>
                        <li><a href="#">Honda</a></li>
                        <li><a href="#">Honda</a></li>
                        <li><a href="#">Honda</a></li>
                        <li><a href="#">Honda</a></li>
                        <li><a href="#">Honda</a></li>
                        <li><a href="#">Honda</a></li>
                        <li><a href="#">Honda</a></li>
                        <li><a href="#">Honda</a></li>
                        <li><a href="#">Honda</a></li>
                    </ul>
                </div>

                <div class="add my-3">
                    <img src="image/add-02.gif" alt="banar" class="w-100">
                </div>
            </div>
        <div class="col-md-7" >
            <img src="" alt="badsfsadfsadf" class="w-100">
                <h1 class="single-bike">
                    {{ ($blogpost->title) }}
                </h1>
                <p class="us-name mb-0 mt-4">  {{ ($blogpost->admin->name) }}</p>
                {{-- <p class="date">{{ \Carbon\Carbon::purch($blogpost->created_at)->diffForHumans()}}</p> --}}
                <p class="date">{{ $blogpost->created_at}}</p>
      
            
           <span> {!! ($blogpost->description) !!} </span>
        
        </div>
            <div class="col-md-3">

                <h4 class="single-left">
                    Bikes On Price Range
                </h4>
                <div class="brand-list">
                    <ul class="brnand-name">
                        <li><a href="#">Tk 50,000 – Tk 80,000</a></li>
                        <li><a href="#">Tk 81,000 – Tk 1,00,000</a></li>
                        <li><a href="#">Tk 1,01,000 – Tk 1,50,000</a></li>
                        <li><a href="#">Tk 1,51,000 – Tk 2,00,000</a></li>
                        <li><a href="#">Tk 2,01,000 – Tk 3,00,000</a></li>
                        <li><a href="#">Tk 3,01,000 – Tk 5,00,000</a></li>
                        <li><a href="#">
                                Tk 5,00,000 – Tk 7,00,000</a></li>

                    </ul>


                </div>



                <h4 class="single-left mt-4">
                    Displacement (cc)
                </h4>
                <div class="brand-list">
                    <div class="brand-list">
                        <ul class="brnand-name">
                            <li><a href="#">50cc Bikes</a></li>
                            <li><a href="#">80cc Bikes</a></li>
                            <li><a href="#">100cc Bikes</a></li>
                            <li><a href="#">110cc Bikes</a></li>
                            <li><a href="#">125cc Bikes</a></li>
                            <li><a href="#">150cc Bikes</a></li>
                            <li><a href="#">160cc Bikes</a></li>


                        </ul>


                        <div class="add my-3">
                            <img src="image/add-02.gif" alt="" class="w-100">
                        </div>
                    </div>


                </div>




                <h4 class="single-left mt-4">
                    Bike Types
                </h4>
                <div class="brand-list">
                    <ul class="brnand-name">
                        <li><a href="#">Standard Bikes</a></li>
                        <li><a href="#">Sports Bikes</a></li>
                        <li><a href="#">
                                Scooter</a></li>
                        <li><a href="#">Naked Sports</a></li>
                        <li><a href="#">Café Racer</a></li>
                        <li><a href="#">Cruiser</a></li>
                        <li><a href="#">Cub</a></li>
                        <li><a href="#">Dirt</a></li>
                        <li><a href="#">Dual Sports</a></li>
                        <li><a href="#">Mini Bikes</a></li>
                        <li><a href="#">Off Road Bikes</a></li>

                    </ul>




                </div>

                <h4 class="single-left mt-4">
                    Latest Bikes
                </h4>
                <div class="brand-list">
                    <ul class="brnand-name">
                        <li>Suzuki Gixxer SF FI</li>
                        <li>Suzuki Intruder FI</li>
                        <li>Yamaha XSR 155</li>
                        <li>TVS Max Semi Trail 125</li>
                        <li>TVS Rockz 125</li>
                        <li>
                            TVS Radeon 110</li>
                        <li>Haojue DR160</li>








                    </ul>

                </div>




            </div>










        </div>
    </div>
</section>









<div class="container">
    
<div class="row mt-5">
       
       <div class="col-md-2"></div>
       <div class="col-md-7 text-center">
           <div id="fb-root"></div>
            <div class="fb-comments" data-href="https://developers.facebook.com/docs/plugins/comments#configurator" data-width="" data-numposts="5"></div>
       </div>
       <div class="col-md-3"></div>


</div>
</div>




<section id="bottom-form">
    <div class="container">
        <div class="row">
            <div class="col-md-2">

            </div>
            <div class="col-md-7">
                <form>

                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Comment</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Name *</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Email *</label>
                        <input type="password" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Website</label>
                        <input type="password" class="form-control" id="exampleInputPassword1">
                    </div>

                    <button type="submit" class="btn submit-btn">Submit</button>
                </form>
            </div>
            <div class="col-md-3">

            </div>
        </div>
    </div>
</section>



    <style>
        span img{
            max-width:600px;
        }
        </style>
  
       
    
@endsection

