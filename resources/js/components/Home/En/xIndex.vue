<template>

   <div>
<!-- header_area start -->
     
        <!-- header_area start -->
         <nav class="navbar navbar-expand-lg  navbar-dark bg-primary fixed-top" v-if="authenticatedname">
            <a class="navbar-brand navbar-brand " href="#carouselExampleIndicators">
               <img :src="'/images/profileimage/' + authenticatedimage" class="img-circle elevation-2" alt="User Image" width=50>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse " id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                   
                   
                </ul>
                <ul class="navbar-nav"> 
                   <li class="nav-item btn-outline-danger badge-pill">
                        <router-link to="/" class="nav-link">Home</router-link>
                        
                    </li> 
                      <li class="nav-item btn-outline-danger badge-pill">
                        <router-link to="/en/bikepost" class="nav-link">Bike</router-link>
                        
                    </li>
                      <li class="nav-item btn-outline-danger badge-pill">
                        <router-link to="/en/carpost" class="nav-link">Car</router-link>
                    </li> 
                     <li class="nav-item btn-outline-danger badge-pill">
                        <router-link to="/en/accessoriespost" class="nav-link">Accessories</router-link>
                    </li> 
                      <li class="nav-item btn-outline-info badge-pill" >
                        
                        <router-link to="/en/myprofile" class="nav-link ">Profile</router-link>
                    </li> 
                    <li class="nav-item btn-outline-info badge-pill" >
                        <router-link to="/en/biketypepost" class="nav-link ">Add Post</router-link>
                    </li>
                    <li class="nav-item btn-outline-info badge-pill" >
                        <router-link to="/en/bikepostlist" class="nav-link ">View Post</router-link>
                    </li>
                  <li class="nav-item"> <a class="nav-link info"  style="cursor:pointer" @click="logOutNow()">
            Logout</a></li>
                
                 </ul>
                            
            </div>
        </nav>
        
        
               <nav class="navbar navbar-expand-lg  navbar-white bg-warning fixed-top" v-else>
            <a class="navbar-brand navbar-brand " href="#carouselExampleIndicators">
                <img src="images/mylogo.png" alt="logo" />
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse " id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                  <li class="nav-item btn-outline-danger badge-pill">
                        <router-link to="/" class="nav-link">Home</router-link>
                        
                    </li> 
                      <li class="nav-item btn-outline-danger badge-pill">
                        <router-link to="/en/bikepost" class="nav-link">Bike</router-link>
                        
                    </li> 
                     <li class="nav-item btn-outline-danger badge-pill">
                        <router-link to="/en/carpost" class="nav-link">Car</router-link>
                        
                    </li> 
                     <li class="nav-item btn-outline-danger badge-pill">
                        <router-link to="/en/accessoriespost" class="nav-link">Accessories</router-link>
                    </li>
                    <li class="nav-item btn-outline-danger badge-pill">
                        <router-link to="/register" class="nav-link">Register</router-link>
                        
                    </li>
                        <li class="nav-item btn-outline-danger badge-pill">
                        <router-link to="/en/login" class="nav-link">Login</router-link>
                        
                    </li>
                    

                </ul>
                <form class="form-inline my-2 my-lg-0 ">
                    <input class="form-control mr-sm-2 " type="search " placeholder="Search " aria-label="Search ">
                    <button class="btn btn-outline-success my-2 my-sm-0 " type="submit ">Search</button>
                </form>
            </div>
        </nav>
        
        
            
        <div class="container"> 

        
       
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
      
        }
    },
  mounted() {
    
    this.$store.dispatch("allBikePost"); //for bike post
        var token= localStorage.getItem("token");
      var user= localStorage.getItem("user");
     
      if( token && user){
       
           this.authenticatedimage=JSON.parse(localStorage.getItem("user")).userimage;
        this.authenticatedname= JSON.parse(localStorage.getItem("user")).username;
      
         
      }
      else{
        //this.$router.push("/en/login")
      }
  },
  computed: {
    allBikePost() {
      return this.$store.getters.getAllBikePost; //for get bike post
      
    }
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
