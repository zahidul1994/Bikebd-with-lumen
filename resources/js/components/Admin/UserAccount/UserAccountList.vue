<template>
<div class="card">
            <div class="card-header">
              <h3 class="card-title">Account  List</h3>
                <div class="text-right">  <div class="btn btn-outline-info "> <router-link to="/en/createteammember">Create Account</router-link></div></div>
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
                    <th>Account Type</th>
                    <th>Gender</th>
                    <th>Status</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="user, index in allUserlist">
                        
                          <td>{{ index + 1 }}</td>
                          <td>{{user.username}}</td> 
                          <td><img :src="ourImage(user.userimage)" alt="not found" width="40" height="50"></td> 
                          <td>{{user.email}}</td> 
                          <td>{{user.userphone}}</td> 
                         
                         
                          <td> <span style="font-size: 2em; color: blue;" v-if="user.paidunpaid==1"><i class="fas fa-money-bill-alt"></i></span>  <span style="font-size: 2em; color:tomato;" v-else><i class="fas fa-money-bill-alt"></i></span>
                </td>
                          <td> <span style="font-size: 2em; color: blue;" v-if="user.gender_id==1"><i class="fas fa-male"></i></span>
                          <span style="font-size: 2em; color:tomato;" v-else><i class="fas fa-female"></i></span>
                </td>
                            <td > 
                         <span class="btn btn-sm btn-primary" @click.prevent="activestatus(user._id)" v-if="user.status_id=='5de6435d230300006d006552'"><i class="fas fa-check-square"></i> </span>
                         <span class="btn btn-sm btn-danger" @click.prevent="inactivestatus(user._id)"  v-else><i class="fas fa-ban"></i></span>
                </td>
                       <td> 
                        
                        <router-link :to="`/en/edituseraccount/${user._id}`" class="btn btn-sm btn-info">
                       <i class="fas fa-edit"></i>
                        </router-link>
                        
                    </td>
                       <td>
                        <button class="btn btn-sm btn-warning" @click.prevent="deleteUser(user._id)"><i class="fas fa-trash-alt"></i></button>
                        
                        
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
  name: "UserAccountList",
   created () {
            document.title = "User List ";
        },
  mounted() {
    this.$store.dispatch("allUserlist"); //for show admin
  },
  computed: {
    allUserlist() {
      return this.$store.getters.getAllUserList; //for get admin
    }
  },
  methods: {
    ourImage(img){
                return "/images/profileimage/"+img; //for show image url
            },
    deleteUser(id) {
      if (confirm("Do you really want to delete it?")) {
      //console.log(id)
      axios
        .delete("/admin/deleteuser/" + id)
        .then(({ response = true }) => {
          [toastr.warning("User Delete Successfull", " User")];
        });
      }
      this.$store
        .dispatch("allUserlist") //for refreash show category
        .catch(function(response = false) {
          console.log(response);
          toastr.error("Sorry Try Agin");
        }); //for show Gender
    },
    activestatus(id){
      //alert();
      axios
        .post("/admin/usersetstatus/" + id)
        .then(({ response = true }) => {
          [toastr.info("Account Inactive Successfull", "Account")];
        });
            this.$store
        .dispatch("allUserlist") //for refreash show admin
        .catch(function(response = false) {
          console.log(response);
          toastr.error("Sorry Try Agin");
        }); //for inactive account
// alert('Hello');
    },
      inactivestatus(id){
      axios
        .post("/admin/usersetstatusactive/" + id)
        .then(({ response = true }) => {
          [toastr.success("Account Active Successfull", "Account")];
        });
            this.$store
        .dispatch("allUserlist") //for refreash show admin
        .catch(function(response = false) {
          console.log(response);
          toastr.error("Sorry Try Agin");
        }); //for active Account
// alert('Hello');
    },
  }
}; 
</script>

