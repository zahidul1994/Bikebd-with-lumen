<template>
<div class="card">
            <div class="card-header">
              <h3 class="card-title">Account List</h3>
                <div class="text-right">  <div class="btn btn-outline-info "> <router-link to="/superadmin/createteammember">Create Account</router-link></div></div>
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
                <tr v-for="admin, index in allAdmins">
                        
                          <td>{{ index + 1 }}</td>
                          <td>{{admin.name}}</td> 
                          <td><img :src="ourImage(admin.image)" alt="not found" width="40" height="50"></td> 
                          <td>{{admin.email}}</td> 
                          <td>{{admin.phone}}</td> 
                          <td>{{admin.accounttype.accounttype}}</td> 
                         
                          <td> <span style="font-size: 2em; color: blue;" v-if="admin.gender_id==1"><i class="fas fa-male"></i></span>
                          <span style="font-size: 2em; color:tomato;" v-else><i class="fas fa-female"></i></span>
                </td>
                            <td > 
                         <span class="btn btn-sm btn-primary" @click.prevent="activestatus(admin.id)" v-if="admin.status_id=='5dd8f4789f61000043000334'"><i class="fas fa-check-square"></i> </span>
                         <span class="btn btn-sm btn-danger" @click.prevent="inactivestatus(admin.id)"  v-else><i class="fas fa-ban"></i></span>
                </td>
                       <td> 
                        
                        <router-link :to="`/superadmin/editteammember/${admin.id}`" class="btn btn-sm btn-info">
                       <i class="fas fa-edit"></i>
                        </router-link>
                        
                    </td>
                       <td>
                        <button class="btn btn-sm btn-warning" @click.prevent="deleteAdmin(admin.id)"><i class="fas fa-trash-alt"></i></button>
                        
                        
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
  name: "AdminList",
   created () {
            document.title = "Team Member ";
        },
  mounted() {
    this.$store.dispatch("allAdmin"); //for show admin
  },
  computed: {
    allAdmins() {
      return this.$store.getters.getAdmin; //for get admin
    }
  },
  methods: {
    ourImage(img){
                return "/images/profileimage/"+img; //for show image url
            },
    deleteAdmin(id) {
      if (confirm("Do you really want to delete it?")) {
      //console.log(id)
      axios
        .delete("/superadmin/deleteteammember/" + id)
        .then(({ response = true }) => {
          [toastr.warning("Admin Delete Successfull", " Admin")];
        });
      }
      this.$store
        .dispatch("allAdmin") //for refreash show category
        .catch(function(response = false) {
          console.log(response);
          toastr.error("Sorry Try Agin");
        }); //for show Gender
    },
    activestatus(id){
      axios
        .post("/superadmin/adminsetstatus/" + id)
        .then(({ response = true }) => {
          [toastr.info("Account Inactive Successfull", "Account")];
        });
            this.$store
        .dispatch("allAdmin") //for refreash show admin
        .catch(function(response = false) {
          console.log(response);
          toastr.error("Sorry Try Agin");
        }); //for inactive account
// alert('Hello');
    },
      inactivestatus(id){
      axios
        .post("/superadmin/adminsetstatusactive/" + id)
        .then(({ response = true }) => {
          [toastr.success("Account Active Successfull", "Account")];
        });
            this.$store
        .dispatch("allAdmin") //for refreash show admin
        .catch(function(response = false) {
          console.log(response);
          toastr.error("Sorry Try Agin");
        }); //for active Account
// alert('Hello');
    },
  }
}; 
</script>

