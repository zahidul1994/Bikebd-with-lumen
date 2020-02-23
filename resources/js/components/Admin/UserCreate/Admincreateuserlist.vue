<template>
<div class="card">
            <div class="card-header">
              <h3 class="card-title">Account List</h3>
                <div class="text-right">  <div class="btn btn-outline-info "> <router-link to="/admin/createuseraccount">Create Account</router-link></div></div>
            </div>
          
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example" class="table table-bordered table-striped">
                <thead>
                <tr>
                   <th>SL</th>
                    <th>Name</th>
                   <th>Image</th>
                    <th>email</th> 
                    <th>Mobile No</th>
                    <th>Position</th>
                    <th>Gender</th>
                    <th>Status</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                    <!-- {{allAdmincreatelist}} -->
                <tr v-for="admin, index in allAdmincreatelist">
                        
                          <td>{{ index + 1 }}</td>
                          <td>{{admin.name}}</td> 
                          <td><img :src="ourImage(admin.image)" alt="not found" width="40" height="50"></td> 
                          <td>{{admin.email}}</td> 
                          <td>{{admin.phone}}</td> 
                          <td>{{admin.accounttype.accounttype}}</td> 
                         
                          <td> <span style="font-size: 2em; color: blue;" v-if="admin.gender.id==1"><i class="fas fa-male"></i></span>
                          <span style="font-size: 2em; color:tomato;" v-else><i class="fas fa-female"></i></span>
                </td> 
                            <td > 
                         <span class="btn btn-sm btn-primary" @click.prevent="activestatus(admin.id)" v-if="admin.status.id=='2'"><i class="fas fa-check-square"></i> </span>
                         <span class="btn btn-sm btn-danger" @click.prevent="inactivestatus(admin.id)"  v-else><i class="fas fa-ban"></i></span>
                </td> 
                       <td> 
                        
                        <router-link :to="`/admin/editcreateadmin/${admin.id}`" class="btn btn-sm btn-info">
                       <i class="fas fa-edit"></i>
                        </router-link>
                        
                    </td>
                       <td>
                        <button class="btn btn-sm btn-warning" @click.prevent="deleteuser(admin.id)"><i class="fas fa-trash-alt"></i></button>
                        
                        
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
  name: "AdmincreateList",
   created () {
            document.title = "Create Admin ";
        },
  mounted() {
    this.$store.dispatch("allAdmincreatelist"); //for show admin
  },
  computed: {
    allAdmincreatelist() {
      return this.$store.getters.getAdminrcreate; //for get admin
    }
  },
  methods: {
    ourImage(img){
                return "/images/profileimage/"+img; //for show image url
            },
    deleteuser(id) {
      if (confirm("Do you really want to delete it?")) {
      //console.log(id)
      axios
        .delete("/admin/deleteteadmin/" + id)
        .then(({ response = true }) => {
          [toastr.warning("Admin Delete Successfull", " Admin")];
        });
      }
      this.$store
        .dispatch("allAdmincreatelist") //for refreash show category
        .catch(function(response = false) {
          console.log(response);
          toastr.error("Sorry Try Agin");
        }); //for show Gender
    },
    activestatus(id){
      axios
        .post("/admin/admincreate/" + id)
        .then(({ response = true }) => {
          [toastr.info("Account Inactive Successfull", "Account")];
        });
            this.$store
        .dispatch("allAdmincreatelist") //for refreash show admin
        .catch(function(response = false) {
          console.log(response);
          toastr.error("Sorry Try Agin");
        }); //for inactive account
// alert('Hello');
    },
      inactivestatus(id){
      axios
        .post("/admin/admincreateactive/" + id)
        .then(({ response = true }) => {
          [toastr.success("Account Active Successfull", "User Account")];
        });
            this.$store
        .dispatch("allAdmincreatelist") //for refreash show admin
        .catch(function(response = false) {
          console.log(response);
          toastr.error("Sorry Try Agin");
        }); //for active Account
// alert('Hello');
    },
  }
}; 
</script>

