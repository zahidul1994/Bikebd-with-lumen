<template>
<div class="card">
            <div class="card-header">
              <h3 class="card-title">Bike Model List </h3>
                <div class="text-right">  <div class="btn btn-outline-info "> <router-link to="/admin/createbikemodel">Create Bike Model</router-link></div></div>
            </div>
          
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Sl</th>
                  <th>Bike Model Name</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="bikemodel, index in allBikeModel">
                        
                          <td>{{ index + 1 }}</td>
                          <td>{{bikemodel.bikemodel}}</td>
                       <td>
                        
                        <router-link :to="`/admin/editbikemodel/${bikemodel._id}`">
                       <i class="fas fa-edit"></i>
                        </router-link>
                        
                    </td>
                       <td>
                        <button class="btn btn-sm btn-warning" @click.prevent="deleteBikeModel(bikemodel._id)"><i class="fas fa-trash-alt"></i></button>
                        
                        
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
  name: "BikeModelList",
  
   created () {
            document.title = "Bike Model List ";
        },
  mounted() {
    this.$store.dispatch("allBikeModel"); //for show Bikemodel 
    
  },
  computed: {
    allBikeModel() {
      return this.$store.getters.getBikeModel; //for get BikeModel
      
    }
  },
  methods: {
    deleteBikeModel(id) {
      if (confirm("Do you really want to delete it?")) {
                   
      axios.delete("/admin/deletebikemodel/" + id)
        .then(({ response = true }) => {
          [toastr.warning("Bike Model  Delete Successfull", " Bike Model")];
        
        });
      }
      this.$store
        .dispatch("allBikeModel") //for refreash show BikeBd
        .catch(function(response = false) {
          console.log(response);
          toastr.error("Sorry Try Agin");
        }); //for show Division
    }
  }
};
</script>

