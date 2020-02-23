<template>
<div class="card">
            <div class="card-header">
              <h3 class="card-title">Account Role List</h3>
                <div class="text-right">  <div class="btn btn-outline-info "> <router-link to="/superadmin/createaccountrole">Create Accoun Role</router-link></div></div>
            </div>
          
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Sl</th>
                  <th>Account Role</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="accountrole, index in allAccountrolelist.data">
                        
                          <td>{{ index + 1 }}</td>
                          <td>{{accountrole.name}}</td>
                       <td>
                        
                        <router-link :to="`/superadmin/editaccounrole/${accountrole.id}`">
                       <i class="fas fa-edit"></i>
                        </router-link>
                        
                    </td>
                       <td>
                        <button class="btn btn-sm btn-warning" @click.prevent="deleteAccountrole(accountrole.id)"><i class="fas fa-trash-alt"></i></button>
                        
                        
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
  name: "AccountRole",
   data() {
    return {
      // Our data object that holds the Laravel paginator data
      allAccountrolelist: {},
      
    };
  },
 
        created () {
            document.title = "Account Role";
        },
  mounted() {
    this.getResults();
  },
  
  methods: {
 getResults(page = 1) {
      axios.get("superadmin/accountrolelist?page=" + page).then(response => {
        this.allAccountrolelist = response.data;
      });
    },
    deleteAccounttype(id) {
      if (confirm("Do you really want to delete it?")) {
                   
      axios.delete("/superadmin/deleteaccounttype/" + id)
        .then(({ response = true }) => {
          [toastr.warning("Account Type Delete Successfull", " Accounttype")];
        
        });
      }
      axios.get("superadmin/accountrolelist?page=" +  this.allAccountrolelist.current_page).then(response => {
        this.allAccountrolelist = response.data;
      })
        .catch(function(response = false) {
          console.log(response);
          toastr.error("Sorry Try Agin");
        }); //for show Gender
    }
  }
};
</script>


