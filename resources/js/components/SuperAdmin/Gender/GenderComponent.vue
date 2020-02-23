<template>
<div class="card">
            <div class="card-header">
              <h3 class="card-title">Gender List</h3>
                <div class="text-right">  <div class="btn btn-outline-info "> <router-link to="/superadmin/creategender">Create Gender</router-link></div></div>
            </div>
          
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Sl</th>
                  <th>Gender</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="gender, index in allGender">
                        
                          <td>{{ index + 1 }}</td>
                          <td>{{gender.gender}}</td>
                       <td>
                        
                        <router-link :to="`/superadmin/editgender/${gender.id}`">
                       <i class="fas fa-edit"></i>
                        </router-link>
                        
                    </td>
                       <td>
                        <button class="btn btn-sm btn-warning" @click.prevent="deleteGender(gender.id)"><i class="fas fa-trash-alt"></i></button>
                        
                        
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
import { VueEditor } from "vue2-editor";
export default {
  
  name: "GenderList",
  
   created () {
            document.title = "Gender";
        },
  mounted() {
    this.$store.dispatch("allGender"); //for show Gender
  },
  computed: {
    allGender() {
      return this.$store.getters.getGender; //for get gender
      
    }
  },
  methods: {
    deleteGender(id) {
      if (confirm("Do you really want to delete it?")) {
                   
      axios.delete("/superadmin/deletegender/" + id)
        .then(({ response = true }) => {
          [toastr.warning("Gender Delete Successfull", " Gender")];
        
        });
      }
      this.$store
        .dispatch("allGender") //for refreash show category
        .catch(function(response = false) {
          console.log(response);
          toastr.error("Sorry Try Agin");
        }); //for show Gender
    }
  }
};
</script>

