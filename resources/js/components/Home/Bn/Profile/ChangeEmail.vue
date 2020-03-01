<template>
      <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Change  Email </h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
               <form role="form" @submit.prevent="UpdateUser" enctype="multipart/form-data">
             <div class="card-body">
                
                  
                   <div class="form-group">
                    <label for="email"> Update Email *</label>
                     <input  v-model="form.email" type="text" class="form-control" :class="{ 'is-invalid': form.errors.has('email') }" id="email" placeholder="Update Email">
                        <has-error :form="form" field="email"></has-error>
                  </div>
                          
                
                 
           </div> 
                 
                
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Update</button>
                   <router-link to="/en/myprofile" class="btn btn-default ">Cancel</router-link>
               </div>
            </form>
                </div>
                
            <!-- /.card -->


       
            
</template>

<script>
export default {
  name: "ChangeEmail",
  data() {
    return {
      form: new Form({
       
       
        email: '',
        
       
      }),
        
    };
  },
 
     
    created(){
      document.title="Change Email ";
      
            axios.get(`/en/changemyemail/${this.$route.params.id}`)
                .then((response)=>{
                    this.form.fill(response.data.userinfo)
                })

        },
        mounted(){
            var user= localStorage.getItem("user");
                if(!user){
               this.$router.push("/en/login") 
            }
        },
  methods: {
    
    UpdateUser() {
this.form.patch('/en/updatemyemail/'+`${this.$route.params.id}`)
     // this.form.post("/superadmin/addadmin")
        //console.log(this.form.accounttype)
        .then(({ response }) => {
          [toastr.success("Email Update Successfully" , "Please Login")],
           [this.$router.push('/en/login')],[localStorage.clear()]})
      
        .catch(function(response) {
         
          toastr.warning("Sorry Try Agin");
        });
    }
    
   
},
}

</script>


       

