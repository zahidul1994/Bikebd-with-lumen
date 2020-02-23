<template>
<div class="card">
            <div class="card-header">
              <h3 class="card-title">Sub-Division List</h3>
                <div class="text-right">  <div class="btn btn-outline-info "> <router-link to="/admin/createsubdivision">Create Sub-Division</router-link></div></div>
            </div>
          
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Sl</th>
                  <th>Division</th>
                  <th>Sub</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="subdivision, index in allSubDivision">
                        
                          <td>{{ index + 1 }}</td>
                          <td>{{subdivision.location.divisionname}}</td>
                          <td>{{subdivision.subdivisionname}}</td>
                       <td>
                        
                        <router-link :to="`/admin/editsubdivision/${subdivision._id}`">
                       <i class="fas fa-edit"></i>
                        </router-link>
                        
                    </td>
                       <td>
                        <button class="btn btn-sm btn-warning" @click.prevent="deleteSubDivision(subdivision._id)"><i class="fas fa-trash-alt"></i></button>
                        
                        
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
  name: "SubDivisionList",
  
   created () {
            document.title = "Sub-Division ";
        },
  mounted() {
    this.$store.dispatch("allSubDivision"); //for show Subdivision
  
  },
  computed: {
    allSubDivision() {
      return this.$store.getters.getSubDivision; //for get Subdivision
      
    }
  },
  methods: {
    deleteSubDivision(id) {
      if (confirm("Do you really want to delete it?")) {
                   
      axios.delete("/admin/deletesubdivision/" + id)
        .then(({ response = true }) => {
          [toastr.warning("Sub-Division Delete Successfull", " Sub-Division")];
        
        });
      }
      this.$store
        .dispatch("allSubDivision") //for refreash show category
        .catch(function(response = false) {
          console.log(response);
          toastr.error("Sorry Try Agin");
        }); //for show Gender
    }
  }
};
</script>

