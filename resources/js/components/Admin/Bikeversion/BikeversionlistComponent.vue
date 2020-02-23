<template>
<div class="card">
            <div class="card-header">
              <h3 class="card-title">Version List </h3>
                <div class="text-right">  <div class="btn btn-outline-info "> <router-link to="/admin/createbikeversion">Create Version</router-link></div></div>
            </div>
          
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Sl</th>
                  <th>Version</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="version, index in allBikeVersion">
                        
                          <td>{{ index + 1 }}</td>
                          <td>{{version.bikeversion}}</td>
                       <td>
                        
                        <router-link :to="`/admin/editbikeversion/${version._id}`">
                       <i class="fas fa-edit"></i>
                        </router-link>
                        
                    </td>
                       <td>
                        <button class="btn btn-sm btn-warning" @click.prevent="deleteBikeVersion(version._id)"><i class="fas fa-trash-alt"></i></button>
                        
                        
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
  name: "VersionList",
  
   created () {
            document.title = "Version List ";
        },
  mounted() {
    this.$store.dispatch("allBikeVersion"); //for show Bikeversion
    
  },
  computed: {
    allBikeVersion() {
      return this.$store.getters.getBikeVersion; //for get Bikeversioln
      
    }
  },
  methods: {
    deleteBikeVersion(id) {
      if (confirm("Do you really want to delete it?")) {
                   
      axios.delete("/admin/deletebikeversion/" + id)
        .then(({ response = true }) => {
          [toastr.warning("Bike Version Delete Successfull", " Bike Version")];
        
        });
      }
      this.$store
        .dispatch("allBikeVersion") //for refreash show Bikeversion
        .catch(function(response = false) {
          console.log(response);
          toastr.error("Sorry Try Agin");
        }); //for show Division
    }
  }
};
</script>

