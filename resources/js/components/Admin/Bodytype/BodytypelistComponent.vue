<template>
<div class="card">
            <div class="card-header">
              <h3 class="card-title">Body Type List </h3>
                <div class="text-right">  <div class="btn btn-outline-info "> <router-link to="/admin/createbodytype">Create Body Type</router-link></div></div>
            </div>
          
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Sl</th>
                  <th>Body Type</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="bodytype, index in allBodytype">
                        
                          <td>{{ index + 1 }}</td>
                          <td>{{bodytype.bodytype}}</td>
                       <td>
                        
                        <router-link :to="`/admin/editbodytype/${bodytype._id}`">
                       <i class="fas fa-edit"></i>
                        </router-link>
                        
                    </td>
                       <td>
                        <button class="btn btn-sm btn-warning" @click.prevent="deleteBodytype(bodytype._id)"><i class="fas fa-trash-alt"></i></button>
                        
                        
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
  name: "BodytypeList",
  
   created () {
            document.title = "Body Type List ";
        },
  mounted() {
    this.$store.dispatch("allBodytype"); //for show ar Body Type
    
  },
  computed: {
    allBodytype() {
      return this.$store.getters.getBodytype; //for get Car body type
      
    }
  },
  methods: {
    deleteBodytype(id) {
      if (confirm("Do you really want to delete it?")) {
                   
      axios.delete("/admin/deletebodytype/" + id)
        .then(({ response = true }) => {
          [toastr.warning("Body Type Delete Successfull", " Body Type")];
        
        });
      }
      this.$store
        .dispatch("allBodytype") //for refreash show Bodytype
        .catch(function(response = false) {
          console.log(response);
          toastr.error("Sorry Try Agin");
        }); //for show Division
    }
  }
};
</script>

