<template>
<span>
<section id="single-blog">
    <div class="container">
        <div class="row">

            <div class="col-md-8">
               <img :src="'/images/Fontimage/add1.webp'" alt="" class="w-100">
                <h1 class="single-bike">
                  
                   {{(blogpostdetails.title)}}
                </h1>
                <p class="us-name mb-0 mt-4"  v-if="blogpostdetails.admin">{{ blogpostdetails.admin.name }}</p>
                <p class="date">{{blogpostdetails.created_at}}</p>


                <span v-html="blogpostdetails.description"> </span>

     
                <h2>Related Post</h2>
                <div class="row">
                    <div class="col-md-4">

                        <a href="#">
                           <img :src="'/images/Fontimage/pulsar.webp'" alt="" class="w-100">
                            <p class="clrcng">Pulsar 150</p>
                        </a>


                    </div>
                    <div class="col-md-4">

                        <a href="#">
                           <img :src="'/images/Fontimage/pulsar.webp'" alt="" class="w-100">
                            <p class="clrcng">Pulsar 150</p>
                        </a>


                    </div>
                    <div class="col-md-4">

                        <a href="#">
                           <img :src="'/images/Fontimage/pulsar.webp'" alt="" class="w-100">
                            <p class="clrcng">Pulsar 150</p>
                        </a>


                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">

                        <a href="#">
                           <img :src="'/images/Fontimage/pulsar.webp'" alt="" class="w-100">
                            <p class="clrcng">Pulsar 150</p>
                        </a>


                    </div>
                    <div class="col-md-4">

                        <a href="#">
                           <img :src="'/images/Fontimage/pulsar.webp'" alt="" class="w-100">
                            <p class="clrcng">Pulsar 150</p>
                        </a>


                    </div>
                    <div class="col-md-4">

                        <a href="#">
                           <img :src="'/images/Fontimage/pulsar.webp'" alt="" class="w-100">
                            <p class="clrcng">Pulsar 150</p>
                        </a>


                    </div>
                </div>
                
                
                <!--   facebook comment-->

            <fb-comment :data-href="`http://127.0.0.1:8000/${blogpostdetails.slug}`" />
               



                <!--page comment-->
              <form  @submit.prevent="addBlogComment">
                  <div class="form-group">
                        <label for="comment">Comment</label>
                        <textarea class="form-control" v-model="form.comment" :class="{'is-invalid' :form.errors.has('comment')}"  id="comment" rows="3"></textarea>
                        <has-error :form="form" field="comment" ></has-error>
                    </div>
                    <div class="form-group">
                        <label for="name">Name *</label>
                        <input type="text" v-model="form.name" class="form-control" :class="{'is-invalid' :form.errors.has('name')}"  id="name" aria-describedby="emailHelp">
                       <has-error :form="form" field="name" ></has-error>
                    </div>
                    <div class="form-group">
                        <label for="email">Email *</label>
                        <input type="email" v-model="form.email" class="form-control" :class="{'is-invalid' :form.errors.has('email')}" id="email">
                        <has-error :form="form" field="email"></has-error>
                    </div>
                    <div class="form-group">
                        <label for="web">Website</label>
                        <input type="text" v-model="form.web" class="form-control" id="web">
                    </div>

                    <button type="submit" class="btn submit-btn">Submit</button>
                </form>

        <!--                comment result-->
                <div class="row pt-4">
                    <div class="col-md-10">
                        <div class="row" v-for="comment in  blogpostdetails.blogcomment" :key="comment.id">
                            <div class="col-md-2">
                                <img :src="'/images/Fontimage/pulsar.webp'" alt="" class="w-100">
                            </div>
                            <div class="col-md-10 pl-0">
                                <p class="mb-0"><a href="#">{{comment.name}}</a></p>
                                <p class="mb-0">{{comment.created_at}}</p>
                                <p class="mb-0">{{comment.comment}}</p>
                                
                                
                                <p>
                                    <a href="#">Reply</a>
                                    
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2"></div>
                </div>

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

                <div class="add my-3">
                   <img :src="'/images/Fontimage/add-02.gif'" alt="" class="w-100">
                </div>

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
                           <img :src="'/images/Fontimage/add-02.gif'" alt="" class="w-100">
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
  name: "BNBlogpostdetails",
  
  data() {
    return {
        
      form: new Form({
        id: this.$route.params.id,
        name: "",
        comment:"",
        email: "",
        web: "",
        }),
      authenticatedname:null,
         authenticatedimage:null,
         title:null,
         name:null,
         description:null,
         blogpostdetails:[],
    }
    
  },
  
 
     created () {
            document.title = "Blog Details";
             document.metaTags = this.blogpostdetails.title;
        },
  mounted() {
    
    
        var token= localStorage.getItem("token");
      var user= localStorage.getItem("user");
     
      if( token && user){
       
           this.authenticatedimage=JSON.parse(localStorage.getItem("user")).userimage;
        this.authenticatedname= JSON.parse(localStorage.getItem("user")).username;
      
         
      };

             axios.get(`bn/blog/${this.$route.params.id}`)
                .then(response => {
                      (this.blogpostdetails = response.data.blogpostdetails);
                      
                    });
                    
               
      
      
  },
  
  methods: {
      logOutNow(){
        //alert(5);
       localStorage.clear();
        this.$router.push("/en/login")
      },
     addBlogComment() {
     
        this.form.post("/en/createcomment")
        //console.log('ok');
         .then(({ response = true }) => {
          [toastr.success("Comment Create Successfull")],
           this.form.comment='',
         this.form.name='',
         this.form.web='',
         this.form.email='',
          axios.get(`blogpostdetails/${this.$route.params.id}`)
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
  