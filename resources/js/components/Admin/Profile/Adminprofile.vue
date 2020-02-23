<template>
        <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       :src="'/images/profileimage/' + adminprofile.image"
                       alt="User profile picture">
                </div>

                <h3 class="profile-username text-center"> {{adminprofile.name}}</h3>

                <p class="text-muted text-center">{{adminprofile.accounttype.accounttype}}</p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Email</b> <a class="float-right">{{adminprofile.email}}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Phone</b> <a class="float-right">{{adminprofile.phone}}</a>
                  </li> <li class="list-group-item">
                    <b>Gender</b> <a class="float-right">{{adminprofile.gender.gender}}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Join Date</b> <a class="float-right">{{adminprofile.created_at}}</a>
                  </li>
                </ul>
   <b><router-link :to="`/admin/editadminprofile/${adminprofile._id}`" class="btn btn-primary btn-block">Edit Profile </router-link></b>
                        
             
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
 
</template>

<script>
export default {
  name: "Adminprofile",
  mounted() {
    this.$store.dispatch("adminprofile"); //for show admin
  },
  computed: {
    adminprofile() {
      return this.$store.getters.getAdminProfile; //for get admin
    }
  },
  methods: {
   
    deleteAdmin(id) {
      if (confirm("Do you really want to delete it?")) {
      //console.log(id)
      axios
        .delete("/admin/deleteteammember/" + id)
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

