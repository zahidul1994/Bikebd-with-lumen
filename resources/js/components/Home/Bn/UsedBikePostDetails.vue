<template>

   <div>
<!-- header_area start -->
     
        <div class="container"> 

        <div class="row mt-5">
        <div class="col-md-6 mt-5">
          <!-- Box Comment -->
          <div class="box box-widget border"v-for="bikepost, index in allBikePost">
            <div class="box-header with-border">
              <div class="user-block">
                <img class="img-circle" :src="'/images/profileimage/'+bikepost.user.userimage" alt="User Image">
                <span class="username">{{bikepost.user.username}}<a href="#"></a></span>
                <span class="description">Shared publicly - {{bikepost.created_at}}</span>
              </div>
              <!-- /.user-block -->
              <!-- <div class="box-tools">
                <button type="button" class="btn btn-box-tool" data-toggle="tooltip" title="Mark as read">
                  <i class="fa fa-circle-o"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div> -->
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
     
    <div v-for="image,index in bikepost.bikeimage" :class="{ 'active' : index+1==1}"  class="carousel-item">
      <img class="d-block w-100" :src="'/images/bikepostimage/'+ image.image" alt="First slide">
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
             
                            
              <p>{{bikepost.description }}</p>
              <button type="button" class="btn btn-default btn-xs"><i class="fa fa-share"></i> Share</button>
                 <router-link :to="`/en/shop/${bikepost.user.id}`" v-if="bikepost.user.shoptype=='bike'"> view Shop </router-link>
              <button type="button" class="btn btn-default btn-xs"><i class="fa fa-thumbs-o-up"></i> Like</button>
              <span class="pull-right text-muted">127 likes - 3 comments</span>
            </div>
            <!-- /.box-body -->
              <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                
           
                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Bike Type</b> <a class="float-right">{{bikepost.biketype}}</a>
                  </li> 
                  <li class="list-group-item">
                    <b>Bike Brand</b> <a class="float-right">{{bikepost.bikebrand.bikebrand}}</a>
                  </li>
                   <li class="list-group-item">
                    <b>Bike Category</b> <a class="float-right">{{bikepost.category.categoryname}}</a>
                  </li>  
                  <li class="list-group-item">
                    <b>Bike Model</b> <a class="float-right">{{bikepost.bikemodel.bikemodel}}</a>
                  </li> 
                  <li class="list-group-item">
                    <b>Bike Model Year</b> <a class="float-right">{{bikepost.modelyear.modelyear}}</a>
                  </li>
                   <li class="list-group-item">
                    <b>Bike Version</b> <a class="float-right">{{bikepost.bikeversion.bikeversion}}</a>
                  </li>
                   <li class="list-group-item">
                    <b>Kilometer Run</b><a class="float-right">{{bikepost.kilometerrun}}</a>
                  </li> 
                  <li class="list-group-item">
                    <b>Bike Used Time</b> <a class="float-right">{{bikepost.usedtime}}</a>
                  </li>
                   <li class="list-group-item">
                    <b>Bike Negotiable</b> <a class="float-right">{{bikepost.negotiable}}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Starting</b> <a class="float-right">{{bikepost.startingmethod}}</a>
                  </li> <li class="list-group-item">
                    <b>Engine Capacity</b> <a class="float-right">{{bikepost.engine_capacity}}</a>
                  </li>
                  
                  <li class="list-group-item">
                    <b>Price</b> <a class="float-right">{{bikepost.price}}</a>
                  </li>
                  
                </ul>
   
              </div>
              <!-- /.card-body -->
            </div>
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->

            
        </div>
        
       
</div>
</div>
    

              
</template>

<script>
export default {
  name: "Bikepost",
      data(){
        return {
          authenticatedname:null,
         authenticatedimage:null,
         allBikePost:[],
      
        }
    },
  mounted() {
    
    
        var token= localStorage.getItem("token");
      var user= localStorage.getItem("user");
     
      if( token && user){
       
           this.authenticatedimage=JSON.parse(localStorage.getItem("user")).userimage;
        this.authenticatedname= JSON.parse(localStorage.getItem("user")).username;
      
         
      }
      else{
       // this.$router.push("/en/login")
      };
         axios.get(`http://127.0.0.1:8000/en/postusedbikedetails/${this.$route.params.id}`)
                .then(response => {
                    (this.allBikePost = response.data.bikedetails)
                    //console.log(response);

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
