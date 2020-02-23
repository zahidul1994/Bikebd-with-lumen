<template>
<div class="card">
            <div class="card-header">
              <h3 class="card-title">Accessories Type List </h3>
                <div class="text-right">  <div class="btn btn-outline-info "> <router-link to="/admin/createaccessoriestype">Create Accessories</router-link></div></div>
            </div>
          
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Sl</th>
                  <th>Accessories</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="accessori, index in AllAccessoriestype">
                        
                          <td>{{ index + 1 }}</td>
                          <td>{{accessori.accessoriesname}}</td>
                       <td>
                        
                        <router-link :to="`/admin/editaccessoriestype/${accessori._id}`">
                       <i class="fas fa-edit"></i>
                        </router-link>
                        
                    </td>
                       <td>
                        <button class="btn btn-sm btn-warning" @click.prevent="deleteAccessories(accessori._id)"><i class="fas fa-trash-alt"></i></button>
                        
                        
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
  name: "AccessoriesTypeList",
  
   created () {
            document.title = "Accessories Type ";
        },
  mounted() {
    this.$store.dispatch("AllAccessoriestype"); //for show Accessories
    
  },
  computed: {
    AllAccessoriestype() {
      return this.$store.getters.getAllAccessori; //for get Accessories
      
    }
  },
  methods: {
    deleteAccessories(id) {
      if (confirm("Do you really want to delete it?")) {
                   
      axios.delete("/admin/deleteaccessoriestype/" + id)
        .then(({ response = true }) => {
          [toastr.warning("Accessories Delete Successfull", " Accessories")];
        
        });
      }
      this.$store
        .dispatch("AllAccessoriestype") //for refreash show Division
        .catch(function(response = false) {
          console.log(response);
          toastr.error("Sorry Try Agin");
        }); //for show Division
    }
  }
};
</script>

