<template>
<div class="card">
            <div class="card-header">
              <h3 class="card-title">Division List</h3>
                <div class="text-right">  <div class="btn btn-outline-info "> <router-link to="/admin/createdivision">Create Division</router-link></div></div>
            </div>
          
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Sl</th>
                  <th>Division</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="division, index in allDivision">
                        
                          <td>{{ index + 1 }}</td>
                          <td>{{division.divisionname}}</td>
                       <td>
                        
                        <router-link :to="`/admin/editdivision/${division._id}`">
                       <i class="fas fa-edit"></i>
                        </router-link>
                        
                    </td>
                       <td>
                        <button class="btn btn-sm btn-warning" @click.prevent="deleteDivision(division._id)"><i class="fas fa-trash-alt"></i></button>
                        
                        
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
  name: "DivisionList",
  
   created () {
            document.title = "Division ";
        },
  mounted() {
    this.$store.dispatch("allDivision"); //for show Division
  },
  computed: {
    allDivision() {
      return this.$store.getters.getDivision; //for get Division
      
    }
  },
  methods: {
    deleteDivision(id) {
      if (confirm("Do you really want to delete it?")) {
                   
      axios.delete("/admin/deletedivision/" + id)
        .then(({ response = true }) => {
          [toastr.warning("Division Delete Successfull", " Division")];
        
        });
      }
      this.$store
        .dispatch("allDivision") //for refreash show Division
        .catch(function(response = false) {
          console.log(response);
          toastr.error("Sorry Try Agin");
        }); //for show Division
    }
  }
};
</script>

