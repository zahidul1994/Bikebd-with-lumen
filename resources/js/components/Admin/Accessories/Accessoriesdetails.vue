<template>
<div class="row mt-5">
        <div class="col-md-6 mt-5">
          <!-- Box Comment -->
          <div class="box box-widget border"v-for="bikepost, index in accdetails">
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
     
    <div v-for="image,index in bikepost.accessoriesimge" :class="{ 'active' : index+1==1}"  class="carousel-item">
      <img class="d-block w-100" :src="'/images/accpostimage/'+ image.image" alt="First slide">
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
             
                            
              <p>{{bikepost.description}}</p>
              <button type="button" class="btn btn-default btn-xs"><i class="fa fa-share"></i> Share</button>
              <button type="button" class="btn btn-default btn-xs"><i class="fa fa-thumbs-o-up"></i> Like</button>
              <span class="pull-right text-muted">127 likes - 3 comments</span>
            </div>
            <!-- /.box-body -->
              <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                
           
                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Accessories Name</b> <a class="float-right">{{bikepost.accessoriesname}}</a>
                  </li> 
                  <li class="list-group-item">
                    <b>Accessories Type</b> <a class="float-right">{{bikepost.accessoriestype.accessoriesname}}</a>
                  </li>
                   <li class="list-group-item">
                    <b>Bike Category</b> <a class="float-right">{{bikepost.category.categoryname}}</a>
                  </li>  
                  <li class="list-group-item">
                    <b>Made By</b> <a class="float-right">{{bikepost.madeby}}</a>
                  </li> 
                  <li class="list-group-item">
                    <b>Color</b> <a class="float-right">{{bikepost.color}}</a>
                  </li>
                   <li class="list-group-item">
                    <b>Waight</b> <a class="float-right">{{bikepost.waight}}</a>
                  </li>
                   <li class="list-group-item">
                    <b>Material</b> <a class="float-right">{{bikepost.material}}</a>
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
    

              
</template>

<script>
export default {
  name: "accessoreisdetails",
      data(){
        return {
          authenticatedname:null,
         authenticatedimage:null,
         accdetails:[],
      
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
         axios.get(`http://127.0.0.1:8000/admin/useraccessoriesdetails/${this.$route.params.id}`)
                .then(response => {
                    (this.accdetails = response.data.useraccessoriesdetails)
                    //console.log(response);

                });
  },
 
  methods: {
      logOutNow(){
        //alert(5);
       localStorage.clear();
        this.$router.push("/admin/login")
      },
    
      
       
    }

};
</script>
