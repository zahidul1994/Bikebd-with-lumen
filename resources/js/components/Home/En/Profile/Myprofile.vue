<template>
        <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       :src="'/images/profileimage/' + userprofile.userimage"
                       alt="User profile picture">
                </div>

                <h3 class="profile-username text-center"> {{userprofile.username}}</h3>

                <!-- <p class="text-muted text-center">{{userprofile.accounttype.accounttype}}</p> -->

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Email</b> <a class="float-right">{{userprofile.email}}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Phone</b> <a class="float-right">{{userprofile.userphone}}</a>
                  </li> 
                  <li class="list-group-item">
                    <b>Gender</b> <a class="float-right">{{userprofile.gender.gender}}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Division</b> <a class="float-right">{{userprofile.location.divisionname}}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Sub-Division</b> <a class="float-right">{{userprofile.sublocation.subdivisionname}}</a>
                  </li>
                  
                  <li class="list-group-item">
                    <b>Join Date</b> <a class="float-right">{{userprofile.created_at}}</a>
                  </li>
                </ul>
     <b v-if="userprofile.shoptype==0"><router-link :to="`/en/applyform`" class="btn btn-info">Apply For Member </router-link></b>  
     <b v-else><router-link :to="`/en/paidmyaccount`" class="btn btn-info">Pay Now </router-link></b>  
   <b><router-link :to="`/en/editmyprofile/${userprofile.id}`" class="btn btn-primary">Edit Profile </router-link></b>  <b><router-link :to="`/en/changemyemail/${userprofile.id}`" class="btn btn-success">Change Email</router-link></b> <b><router-link :to="`/en/changemypassword/${userprofile.id}`" class="btn btn-warning">Change Password</router-link></b>
                        
             
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
 
</template>

<script>
export default {
  name: "Userprofile",
  created(){
    document.title="My Profile"
  },
  mounted() {
     
            var user= localStorage.getItem("user");
                if(!user){
               this.$router.push("/en/login") 
            }
       
    this.$store.dispatch("userprofile"); //for show admin
  },
  computed: {
    userprofile() {
      return this.$store.getters.getUserProfile; //for get admin
    }
  },
  methods: {
   
    deleteAdmin(id) {
      if (confirm("Do you really want to delete it?")) {
      //console.log(id)
      axios
        .delete("/en/deleteemyprofile/" + id)
        .then(({ response = true }) => {
          [toastr.warning(" Delete Successfull", " Bye")];
        });
      }
      this.$store
        .dispatch("userprofile") //for refreash show category
        .catch(function(response = false) {
          console.log(response);
          toastr.error("Sorry Try Agin");
        }); //for show Gender
    },
  
  }
}; 
</script>

