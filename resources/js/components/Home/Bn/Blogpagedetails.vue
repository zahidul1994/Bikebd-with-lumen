<template>
<span>
<section id="single-blog">
    <div class="container">
        <div class="row">

            <div class="col-md-8">
               <img :src="'/images/Fontimage/add1.webp'" alt="dgfsad" class="w-100">
                <h1 class="single-bike">
                  
                   {{(Pagedetails.pagetitle)}}
                </h1>
                <p class="us-name mb-0 mt-4" v-if="Pagedetails.admin">{{ Pagedetails.admin.name }}</p>
                <p class="date">{{Pagedetails.created_at}}</p>


                <span v-html="Pagedetails.description"> </span>

            <h2>Related Post </h2>
                 <div class="row">
                    <div class="col-md-4" v-for="page in Relatedpage" :key="(page.id)">

                       <router-link :to="`bn/page/${encodeURI(page.slug)}`">
                           <img :src="'/images/blogpage/'+page.pageimage" alt="not" class="w-100">
                            <p class="clrcng">{{page.pagetitle}}</p>
                        </router-link>
                    </div>
                   
                    
                </div>


           
                
                
                <!--   facebook comment-->

           

        <!--                comment result-->
               

            </div>

            <div class="col-md-4">
                   
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
                    
                    </ul>
                </div>

                <!-- <div class="add my-3">
                   <img :src="'/images/Fontimage/add-02.gif'" alt="" class="w-100">
                </div> -->

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


                        <!-- <div class="add my-3">
                           <img :src="'/images/Fontimage/add-02.gif'" alt="" class="w-100">
                        </div> -->
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

            </div>
            <div class="col-md-3">

            </div>
        </div>
    </div>
</section>

</span>

              
</template>


<script>

export default {
  name:"BNPagedetails",
  data() {
    return {
        
     authenticatedname:null,
         authenticatedimage:null,
         pagetitle:null,
         name:null,
         description:null,
         Pagedetails:[],
         Relatedpage:[],

         headful:{
         description:'',
         keywords:'',  
         },  
    }
    
  },
 
     created () {
            document.title = this.$route.params.id;
        },
  mounted() {
    
    
        var token= localStorage.getItem("token");
      var user= localStorage.getItem("user");
     
      if( token && user){
       
           this.authenticatedimage=JSON.parse(localStorage.getItem("user")).userimage;
        this.authenticatedname= JSON.parse(localStorage.getItem("user")).username;
      
         
      };

             axios.get(`bn/page/${encodeURI(this.$route.params.id)}`)
                .then(response => {
                (this.Pagedetails = response.data.pagedetails);
                 this.headful.description=response.data.pagedetails.pagemetadescription;
                      this.headful.keywords=response.data.pagedetails.pagekeyword;
                    });
                 axios.post(`bn/relatedpage/${this.$route.params.id}`)
                .then(response => {
                
                      (this.Relatedpage = response.data.relatedpage);
                      // alert(response.data.pagedetails.description);
                    });
                    
      
  },
  
  methods: {
      logOutNow(){
        //alert(5);
       localStorage.clear();
        this.$router.push("/en/login")
      },
  
    }

};
</script>

  <style>
        span img{
            max-width:600px;
        }
        </style>
  