<template>
<span id="app">

     <section id="top-area">
        <nav class="navbar navbar-expand-lg navbar-light bg-dark">
            <div class="container">
                <a class="navbar-brand" href="#">
                   
                    <img :src="'/images/Fontimage/logo.png'" alt="">
                </a>

                <div class="">

                    <form class="form-inline my-2 my-lg-0 m-auto">
                        <input class="form-control" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit"><i class="far fa-search"></i></button>
                    </form>
                </div>


                <select name="" id="" class="pr-5 py-1">
                    <option value="" disabled="" selected="">Language</option>
                    <option value="">
                         
                        </option>
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
                            <router-link class="nav-link" :to="`/`" >Home</router-link>
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
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Page
                            </a>
                              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <span v-for="pagename in Pagelist" :key="(pagename.id)">
                                   <router-link class="dropdown-item" :to="`/page/${pagename.slug}`">{{pagename.pagename}}</router-link>
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
    

     <router-view :key="$route.path"></router-view>
     <br>
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
                    <li><a href="#" class="border-right-0">Contactasdfasdfa</a></li>
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

</span>
</template>

<script>
    export default {
      name:'UserDashboard',
        data(){
       return {
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
    //    $('.product-slider1').slick({
    //     slidesToShow: 4,
    //     slidesToScroll: 1,
    //     dots: false,
    //     arrows: true,
    //     prevArrow: '<span class="right-round"><i class="fal fa-angle-right"></i></span>',
    //     nextArrow: '<span class="left-round"><i class="fal fa-angle-left"></i></span>',


    // });
    
   //alert(5);
 

        var token= localStorage.getItem("token");
      var user= localStorage.getItem("user");
     
      if( token && user){
       
           this.authenticatedimage=JSON.parse(localStorage.getItem("user")).userimage;
        this.authenticatedname= JSON.parse(localStorage.getItem("user")).username;
      
         
      };
        axios.get('/latestblog')
        .then(response => {
            (this.AllLatestBlog = response.data.blogpost);
            
        });
          axios.post('/pagelist')
        .then(response => {
            
            (this.Pagelist = response.data.page);
            
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