<template>
<div class="card">
            <div class="card-header">
              <h3 class="card-title">Bike post List</h3>
                <div class="text-right">  <div class="btn btn-outline-info "> <router-link to="/en/biketypepost">Create New Post</router-link></div></div>
            </div>
          
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Sl</th>
                  <th>Date time</th>
                  <th>Imge</th>
                  <th>Category</th>
                  <th>Bike Type</th>
                  <th>Starting </th>
                   <th>Price </th>
                  <th>Status </th>
                  <th>Condition </th>
                  <th>Edit</th>
                  <th>Details</th>
                  <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="bikepost, index in allUserBikePostlist">
                        
                          <td>{{ index + 1 }}</td>
                          <td>{{bikepost.created_at}}</td>
                          <td><span v-for="image in bikepost.bikeimage">
                            <img :src="'/images/bikepostimage/'+ image.image" alt="no image" width=20 data-lightbox="image-1"></span></td>
                          <td>{{bikepost.category.categoryname}}</td>
                          <td>{{bikepost.biketype}}</td>
                          <td>{{bikepost.startingmethod}}</td>
                          <td>{{bikepost.price}}</td>
                          <td v-if="bikepost.active==2">Pending</td>
                          <td v-else>publish</td>
                          <td>{{bikepost.newused}}</td>
                       <td>
                        <span v-if="bikepost.newused=='new'"> <router-link :to="`/en/editbike/${bikepost._id}`">
                       <i class="fas fa-edit"></i>
                        </router-link></span>
                         <span v-else> <router-link :to="`/en/editusedbike/${bikepost._id}`">
                       <i class="fas fa-edit"></i>
                        </router-link></span>
                       
                        
                    </td>
                      <td>
                         <router-link :to="`/en/newdetails/${bikepost._id}`">
                       Details
                        </router-link>
                         
                       
                        
                    </td>
                       <td>
                        <button class="btn btn-sm btn-warning" @click.prevent="deletePost(bikepost._id)"><i class="fas fa-trash-alt"></i></button>
                        
                        
                    </td>
                </tr>
                
                </tbody>
                <!-- <tfoot>
                <tr>
                  <th>Rendering engine</th>
                  <th>Browser</th>
                  <th>Platform(s)</th>
                  <th>Engine version</th>
                 
                </tr>
                </tfoot> -->
              </table>
            </div>
            <!-- /.card-body -->
          </div>
 
</template>


<script>
export default {
  name: "BikePostList",
  created(){
    document.title="Bike Post List"
  },
  mounted() {
         var token= localStorage.getItem("token");
            var user= localStorage.getItem("user");
            
            if(token && !user){
                
                this.$router.push("/en/login")
            }
    this.$store.dispatch("allUserBikePostlist"); //for show Gender
  },
  computed: {
    allUserBikePostlist() {
      return this.$store.getters.getUserBikePostList; //for get gender
      
    }
  },
  methods: {
    deletePost(id) {
      if (confirm("Do you really want to delete it?")) {
                   
      axios.delete("/en/deletebikepostlist/" + id)
        .then(({ response = true }) => {
          [toastr.warning("Bike  Delete Successfull", " Bike Post")];
        
        });
      }
      this.$store
        .dispatch("allUserBikePostlist") //for refreash show category
        .catch(function(response = false) {
          console.log(response);
          toastr.error("Sorry Try Agin");
        }); //for show Gender
    }
  }
};
</script>



