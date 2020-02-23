<template>
<div class="card">
            <div class="card-header">
              <h3 class="card-title">Accessories New Bike List</h3>
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
                  <th>Accessores Name</th>
                  <th>Madb By </th>
                  <th>Price </th>
                   <!-- <th>Condtion</th> -->
                  <th>Edit</th>
                   <th>Status </th>
                    <th>Details</th>
                  <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="accbikepost, index in allAccessoriesPostlistcheck">
                        
                          <td>{{ index + 1 }}</td>
                          <td>{{accbikepost.created_at}}</td>
                          <td><span v-for="image in accbikepost.accessoriesimge">
                            <img :src="'/images/accpostimage/'+ image.image" alt="no image" width=20 data-lightbox="image-1"></span></td>
                          <td>{{accbikepost.category.categoryname}}</td>
                          <td>{{accbikepost.accessoriesname}}</td>
                          <td>{{accbikepost.madeby}}</td>
                          <td>{{accbikepost.price}}</td>
                          <!-- <td v-if="accbikepost.active==2">Pending</td>
                          <td v-else>publish</td> -->

                     <td>
                        <span> <router-link :to="`/en/editaccnewbike/${accbikepost._id}`">
                       <i class="fas fa-edit"></i>
                        </router-link></span>
                        
                    </td>
                     <td>    
                         <span class="btn btn-sm btn-primary" @click.prevent="activestatus(accbikepost._id)" v-if="accbikepost.active==1"><i class="fas fa-check-square"></i> </span>
                         <span class="btn btn-sm btn-danger" @click.prevent="inactivestatus(accbikepost._id)"  v-else><i class="fas fa-ban"></i></span>
                         </td>
                    <td>
                        <span> <router-link :to="`/admin/useraccessoriesdetails/${accbikepost._id}`">
                       Details
                        </router-link></span>
                        
                        </td>
                       <td>
                        <button class="btn btn-sm btn-warning" @click.prevent="deletePost(accbikepost._id)"><i class="fas fa-trash-alt"></i></button>
                        
                        
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
  name: "AccessoriesPostList",
  mounted() {
    this.$store.dispatch("allAccessoriesPostlistcheck"); //for show accnew bike
  },
  computed: {
    allAccessoriesPostlistcheck() {
      return this.$store.getters.getAccessoriesPostListcheck; //for get accnewbike
      
    }
  },
  methods: {
    deletePost(id) {
      if (confirm("Do you really want to delete it?")) {
                   
      axios.delete("/admin/deleteaccessoriespostlist/" + id)
        .then(({ response = true }) => {
          [toastr.warning("Accessories Bike  Delete Successfull", "Accessories Bike Post")];
        
        });
      }
      this.$store
        .dispatch("allAccessoriesPostlistcheck") //for refreash show category
        .catch(function(response = false) {
          console.log(response);
          toastr.error("Sorry Try Agin");
        }); //for show Gender
    },

      activestatus(id){
      axios
        .post("/admin/useraccessoriesactive/" + id)
        .then(({ response = true }) => {
          [toastr.info("Account Inactive Successfull", "Account")];
        });
            this.$store
        .dispatch("allAccessoriesPostlistcheck") //for refreash show admin
        .catch(function(response = false) {
          console.log(response);
          toastr.error("Sorry Try Agin");
        }); //for inactive account
// alert('Hello');
    },
      inactivestatus(id){
      axios
        .post("/admin/useraccessoriesinactive/" + id)
        .then(({ response = true }) => {
          [toastr.success("Account Active Successfull", "Account")];
        });
            this.$store
        .dispatch("allAccessoriesPostlistcheck") //for refreash show admin
        .catch(function(response = false) {
          console.log(response);
          toastr.error("Sorry Try Agin");
        }); //for active Account
// alert('Hello');
    },
  }

};
</script>



