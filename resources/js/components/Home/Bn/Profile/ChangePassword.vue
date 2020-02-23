<template>
      <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Change  Password </h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
               <form role="form" @submit.prevent="UpdateUser" enctype="multipart/form-data">
             <div class="card-body">
                <!-- <div class="form-group">
                    <label for="name">Type Your Password </label>
                     <input  v-model="password" type="password" class="form-control"  v-on:keyup="PasswordCheeck" id="password" placeholder="Currect  Password">
                        
                  </div> -->
                  
                    <div class="form-group">
                    <label for="name">Update Password </label>
                     <input  v-model="form.updatepassword" type="text" class="form-control" :class="{ 'is-invalid': form.errors.has('updatepassword') }" id="password1" placeholder="Update Password">
                        <has-error :form="form" field="updatepassword"></has-error>
                  </div>
                  <div class="form-group">
                    <label for="confirm">Confirm Password </label>
                     <input  v-model="form.confirm" type="text" class="form-control" :class="{ 'is-invalid': form.errors.has('confirm') }" id="confirm" placeholder="Confirm Password">
                        <has-error :form="form" field="confirm"></has-error>
                  </div> 
                          
                
                 
           </div> 
                 
                
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Update</button>
                   <router-link to="/en/myprofile" class="btn btn-default ">Cancle</router-link>
               </div>
            </form>
                </div>
                
            <!-- /.card -->


       
            
</template>

<script>
export default {
  name: "ChangePassword",
  data() {
    return {
      // password: '',
      form: new Form({
       updatepassword: '',
        confirm: ''
        
       
      }),
        
    };
  },
 
     
    created(){
      document.title="Change Password ";
      
            },
             mounted(){
            var user= localStorage.getItem("user");
                if(!user){
               this.$router.push("/en/login") 
            }
        },
  methods: {
    
    UpdateUser() {
this.form.patch('/en/changemypassword/'+`${this.$route.params.id}`)
     // this.form.post("/superadmin/addadmin")
        //console.log(this.form.accounttype)
        .then(({ response }) => {
          [toastr.success("Password Update Successfully" , "Please Login")],
           [this.$router.push('/en/login')],[localStorage.clear()]})
      
        .catch(function(response) {
         
          toastr.warning("Sorry Try Agin");
        });
    },
    PasswordCheeck(){
     if (this.password.length >5) {
         this.form.patch('/en/passwordcheeck/'+`${this.password}`)
        }
    }
    
   
},
}

</script>


       

