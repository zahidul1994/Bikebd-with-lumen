<template>
<span>
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
                  <th>Permission</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="accountrole, index in allAccountrolelist.data">
                        
                          <td>{{ index + 1 }}</td>
                          <td>{{accountrole.name}}</td>
                          <td>
                        <button type="button" class="btn btn-info" @click="Showroledetails(accountrole.id)"  data-toggle="modal" data-target="#showpermissionmodal">
                  <i class="fas fa-info"></i>
                </button>
                        
                    </td>
                       <td>
                        <router-link :to="`/superadmin/editaccountrole/${accountrole.id}`">
                       <i class="fas fa-edit"></i>
                        </router-link>
                        
                    </td>
                      <td>
                        <button class="btn btn-sm btn-warning" @click.prevent="deleteAccountrole(accountrole.id)"><i class="fas fa-trash-alt"></i></button>
                        
                        
                    </td>
                </tr>
                
                </tbody>
                
              </table>
            </div>
            <!-- /.card-body -->
          </div>
            <!--create Modal-->
      <div class="modal fade" id="showpermissionmodal">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Show Permission</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                </div>
            <div class="modal-body">
               
           <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Sl</th>
                   <th>Permission</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="accountrole, index in Rolepermission">
                        
                          <td>{{ index + 1 }}</td>
                          <td>{{accountrole.name}}</td>
                        
                      </tr>
                
                </tbody>
               
              </table>
              
            </div>
            <div class="modal-footer justify-content-between">
            
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!--create Modal-->
      </span>
</template>

<script>
export default {
  name: "AccountRole",
   data() {
    return {
      // Our data object that holds the Laravel paginator data
      allAccountrolelist: {},
      Rolepermission:null,
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
      Showroledetails(id){
     // console.log(this.form);
       axios.get(`/superadmin/showrolepermission/`+id)
                .then((response)=>{
                   // console.log(response.data)
                    this.Rolepermission=response.data.rolepermissiondetails;
                })
                
    },
    deleteAccountrole(id) {
      if (confirm("Do you really want to delete it?")) {
                   
      axios.delete("/superadmin/deleteaccountrole/" + id)
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


