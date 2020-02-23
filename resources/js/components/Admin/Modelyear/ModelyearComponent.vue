<template>
<div class="card">
            <div class="card-header">
              <h3 class="card-title">Model Year List </h3>
                <div class="text-right">  <div class="btn btn-outline-info "> <router-link to="/admin/createmodelyear">Create Model Year</router-link></div></div>
            </div>
          
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Sl</th>
                  <th>Model Year</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="modelyear, index in allModelYear">
                        
                          <td>{{ index + 1 }}</td>
                          <td>{{modelyear.modelyear}}</td>
                       <td>
                        
                        <router-link :to="`/admin/editmodelyear/${modelyear._id}`">
                       <i class="fas fa-edit"></i>
                        </router-link>
                        
                    </td>
                       <td>
                        <button class="btn btn-sm btn-warning" @click.prevent="deleteModelYear(modelyear._id)"><i class="fas fa-trash-alt"></i></button>
                        
                        
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
  name: "ModelYearList",
  
   created () {
            document.title = " Model Year List ";
        },
  mounted() {
    this.$store.dispatch("allModelYear"); //for show Bikemodel 
    
  },
  computed: {
    allModelYear() {
      return this.$store.getters.getModelYear; //for get BikeModel
      
    }
  },
  methods: {
    deleteModelYear(id) {
      if (confirm("Do you really want to delete it?")) {
                   
      axios.delete("/admin/deletemodelyear/" + id)
        .then(({ response = true }) => {
          [toastr.warning(" Model Year  Delete Successfull", "Model Year")];
        
        });
      }
      this.$store
        .dispatch("allModelYear") //for refreash show BikeBd
        .catch(function(response = false) {
          console.log(response);
          toastr.error("Sorry Try Agin");
        }); //for show Division
    }
  }
};
</script>

