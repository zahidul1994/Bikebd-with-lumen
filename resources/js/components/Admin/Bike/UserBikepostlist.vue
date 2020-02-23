<template>
<div class="card">
            <div class="card-header">
              <h3 class="card-title">Bike post List view1111</h3>
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
                  <th>Status </th>
                  <th>details</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="bikepost, index in allBikePostlistcheck">
                        
                          <td>{{ index + 1 }}</td>
                          <td>{{bikepost.created_at}}</td>
                          <td><span v-for="image in bikepost.bikeimage">
                            <img :src="'/images/bikepostimage/'+ image.image" alt="no image" width=20 data-lightbox="image-1"></span></td>
                          <td>{{bikepost.category.categoryname}}</td>
                          <td>{{bikepost.biketype}}</td>
                          <td>{{bikepost.startingmethod}}</td>
                       
                          <td>    
                         <span class="btn btn-sm btn-primary" @click.prevent="activestatus(bikepost._id)" v-if="bikepost.active==1"><i class="fas fa-check-square"></i> </span>
                         <span class="btn btn-sm btn-danger" @click.prevent="inactivestatus(bikepost._id)"  v-else><i class="fas fa-ban"></i></span>
                         </td>
                          
                       <td>
                        
                        <router-link :to="`/admin/bikepostdetails/${bikepost._id}`">
                    Details
                        </router-link>
                        
                    </td> 
                    <td>
                        
                        <router-link :to="`/en/editgender/${bikepost._id}`">
                       <i class="fas fa-edit"></i>
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

  name: "UserBikePostList",
   created () {
            document.title = "Bike Post ";
        },
  mounted() {
    this.$store.dispatch("allBikePostlistcheck"); //for show Gender
  },
  computed: {
    allBikePostlistcheck() {
      return this.$store.getters.getBikePostListcheck; //for get gender
      
    }
  },
  methods: {
    deletePost(id) {
      if (confirm("Do you really want to delete it?")) {
                   
      axios.delete("/admin/deleteuserbikepostlist/" + id)
        .then(({ response = true }) => {
          [toastr.warning("Bike  Delete Successfull", " Bike Post")];
        
        });
      }
      this.$store
        .dispatch("allBikePostlistcheck") //for refreash show category
        .catch(function(response = false) {
          console.log(response);
          toastr.error("Sorry Try Agin");
        }); //for show Gender
    },
      activestatus(id){
      axios
        .post("/admin/userbikeactive/" + id)
        .then(({ response = true }) => {
          [toastr.info("Account Inactive Successfull", "Account")];
        });
            this.$store
        .dispatch("allBikePostlistcheck") //for refreash show admin
        .catch(function(response = false) {
          console.log(response);
          toastr.error("Sorry Try Agin");
        }); //for inactive account
// alert('Hello');
    },
      inactivestatus(id){
      axios
        .post("/admin/userbikeinactive/" + id)
        .then(({ response = true }) => {
          [toastr.success("Account Active Successfull", "Account")];
        });
            this.$store
        .dispatch("allBikePostlistcheck") //for refreash show admin
        .catch(function(response = false) {
          console.log(response);
          toastr.error("Sorry Try Agin");
        }); //for active Account
// alert('Hello');
    },
  }
};
</script>



