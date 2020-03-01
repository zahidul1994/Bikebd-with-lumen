<template>

      <!-- Horizontal Form -->
            <div class="card card-info mt-5">
          
              <div class="card-header">
                <h3 class="card-title">User Login  </h3>
              </div>
    

              <!-- /.card-header -->
              <!-- form start -->
              <form  role="form" class="form-horizontal"  @submit.prevent="userlogin" >
                <div class="card-body">
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                      <input v-model="form.email" type="email" class="form-control" :class="{ 'is-invalid': form.errors.has('email') }" id="inputEmail3" placeholder="Email">
                    </div>
                    <has-error :form="form" field="email"></has-error>
                  </div>
                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-10">
                      <input type="password"  v-model="form.password" :class="{'is-invalid':form.errors.has('password')}" class="form-control" id="inputPassword3" placeholder="Password">
                    </div>
                    
                  </div>
                  <has-error :form="form" field="password"></has-error>
                  <div class="form-group row">
                    <div class="offset-sm-2 col-sm-10">
                      <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck2">
                        <label class="form-check-label" for="exampleCheck2">Remember me</label>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-info">Sign in</button>
                  <router-link to="/en" class="btn btn-default ">Cancel</router-link>
                </div>
                <!-- /.card-footer -->
              </form>
            </div>
</template>

     <script>
          export default {
            name:'UserLogin',
              data(){
              return {
                form: new Form({
                  email:'',
                  password:''
                })
                
              }
          },
        mounted(){
      
      var token= localStorage.getItem("token");
      var user= localStorage.getItem("user");
     
      if( token && user){
       
          this.$router.push({name: 'UserDashboard'})
      
         
      }
     
    },
          methods: {
            userlogin(){
              console.log(this.form);
               this.form.post("login", this.form)
              .then(response => { [toastr.success('Login  Successfull')],[this.$router.push({name: 'UserDashboard'})]
              if(response.data.token){
              localStorage.setItem("token", response.data.token); 
             localStorage.setItem("user", JSON.stringify(response.data.user)); 
             
              }
              })
               .catch(response=> {console.log(response);[toastr.warning("Sorry Try Agin"),] });
            }
            //  [localStorage.setItem("token", response.data.token)], [this.$route.defaults.headers.common['Authorization']="Token " + localStorage.getItem("token")],
          }
        }
      </script>
