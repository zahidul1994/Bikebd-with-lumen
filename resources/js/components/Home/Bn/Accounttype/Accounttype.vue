<template>
<div class="card">
            <div class="card-header">
              <h3 class="card-title">Account Type List</h3>
                <div class="text-right">  <div class="btn btn-outline-info "> <router-link to="/superadmin/createaccounttype">Create Accoun Type</router-link></div></div>
            </div>
          
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Sl</th>
                  <th>Account Type</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="accountname, index in allAccounttypes">
                        
                          <td>{{ index + 1 }}</td>
                          <td>{{accountname.accounttype}}</td>
                       <td>
                        
                        <router-link :to="`/superadmin/editaccountype/${accountname._id}`">
                       <i class="fas fa-edit"></i>
                        </router-link>
                        
                    </td>
                       <td>
                        <button class="btn btn-sm btn-warning" @click.prevent="deleteAccounttype(accountname._id)"><i class="fas fa-trash-alt"></i></button>
                        
                        
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
  name: "Accountlistall",
  mounted() {
    this.$store.dispatch("allAccounttype"); //for show Account Type
  },
  computed: {
    allAccounttypes() {
      return this.$store.getters.getAccounttype; //for get Account Type
      
    }
  },
  methods: {
    deleteAccounttype(id) {
      if (confirm("Do you really want to delete it?")) {
                   
      axios.delete("/superadmin/deleteaccounttype/" + id)
        .then(({ response = true }) => {
          [toastr.warning("Account Type Delete Successfull", " Accounttype")];
        
        });
      }
      this.$store
        .dispatch("allAccounttype") //for refreash show category
        .catch(function(response = false) {
          console.log(response);
          toastr.error("Sorry Try Agin");
        }); //for show Gender
    }
  }
};
</script>


