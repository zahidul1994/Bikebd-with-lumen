<template>
      <!-- Horizontal Form -->
            <div class="card card-info mt-5">
              <div class="card-header">
                <h3 class="card-title">Login Form</h3>
              </div>
    

              <!-- /.card-header -->
              <!-- form start -->
              <form  role="form" class="form-horizontal"  @submit.prevent="superadminlogin" >
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
                  <button type="submit" class="btn btn-default float-right">Cancel</button>
                </div>
                <!-- /.card-footer -->
              </form>
            </div>
</template>

     <script>
          export default {
            name:'New',
              data(){
              return {
                form: new Form({
                  email:'',
                  password:''
                })
                
              }
          },
           created () {
            document.title = "Superadmin login";
        },
           mounted(){
      var token= localStorage.getItem("token");
       var superadmin= localStorage.getItem("superadmin");
      if(token && superadmin){
          this.$router.push({name: 'SuperAdminDashboard'})
      }
    },
          methods: {
            superadminlogin(){
              console.log(this.form);
               this.form.post("superadmin/login", this.form)
              .then(response => { [toastr.success('Login  Successfull','Welcome ' + response.data.superadmin.superadminname)],[this.$router.push({name: 'SuperAdminDashboard'})];
             
              if(response.data.token){
              localStorage.setItem("token", response.data.token); 
              localStorage.setItem("authenticated", JSON.stringify(response.data.superadmin)); 
              localStorage.setItem("superadmin", JSON.stringify(response.data.superadmin)); 
             
              }
              })
               .catch(response=> {console.log(response);[toastr.warning("Sorry Try Agin"),] });
            }
            //  [localStorage.setItem("token", response.data.token)], [this.$route.defaults.headers.common['Authorization']="Token " + localStorage.getItem("token")],
          }
        }
      </script>
