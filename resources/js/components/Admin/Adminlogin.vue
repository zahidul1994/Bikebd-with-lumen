<template>
      <!-- Horizontal Form -->
            <div class="card card-info mt-5">
              <div class="card-header">
                <h3 class="card-title">Admin Login Form</h3>
              </div>
    

              <!-- /.card-header -->
              <!-- form start -->
              <form  role="form" class="form-horizontal"  @submit.prevent="adminlogin" >
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
                  <router-link to="/en" class="btn btn-default ">Cancle</router-link>
                </div>
                <!-- /.card-footer -->
              </form>
            </div>
</template>

     <script>
          export default {
            name:'Adminlogin',
              data(){
              return {
                form: new Form({
                  email:'',
                  password:''
                }),
                
              }
              
          },
           created () {
            document.title = "Admin login";
        },
        
           mounted(){
             
      var token= localStorage.getItem("token");
      var admin=localStorage.getItem("admin");
      if(token && admin){
          this.$router.push({name: 'AdminDashboard'})
      }
    },
          methods: {
            adminlogin(){
              
             // console.log(this.form);
               this.form.post("admin/login", this.form)
              .then(response => { [toastr.success('Login  Successfull')],[this.$router.push({name: 'AdminDashboard'})];
             window.admin=true;
              if(response.data.token){
              localStorage.setItem("token", response.data.token); 
              localStorage.setItem("admin", JSON.stringify(response.data.admin)); 
              }
              })
               .catch(response=> {console.log(response);[toastr.warning("Sorry Try Agin"),] });
            }
            //  [localStorage.setItem("token", response.data.token)], [this.$route.defaults.headers.common['Authorization']="Token " + localStorage.getItem("token")],
          }
        }
      </script>
