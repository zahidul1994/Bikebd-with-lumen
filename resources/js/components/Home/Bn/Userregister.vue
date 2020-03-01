<template>
      <!-- Horizontal Form -->
            <div class="card card-info mt-5 container">
              <div class="card-header">
                <h3 class="card-title text-center">Register Form </h3>
              </div>
    

              <!-- /.card-header -->
              <!-- form start -->
              <form  role="form" class="form-horizontal"  @submit.prevent="userregister" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group row">
                    <label for="username" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                      <input v-model="form.username" type="username" class="form-control" :class="{ 'is-invalid': form.errors.has('username') }" id="username" placeholder="Your Name"> <has-error :form="form" field="username"></has-error>
                    </div>
                   
                  </div>
                  <div class="form-group row">
                    <label for="userphone" class="col-sm-2 col-form-label">Phone</label>
                    <div class="col-sm-10">
                      <input v-model="form.userphone" type="phone" class="form-control" :class="{ 'is-invalid': form.errors.has('userphone') }" id="userphone" placeholder="Phone"> <has-error :form="form" field="userphone"></has-error>
                    </div>
                   
                  </div> 
               
                
                  <div class="form-group row">
                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                      <input v-model="form.email" type="email" class="form-control" :class="{ 'is-invalid': form.errors.has('email') }" id="email" placeholder="Email">     <has-error :form="form" field="email"></has-error>
                    </div>
               
                  </div>
                   
                  <div class="form-group row">
                    <label for="password" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-10">
                      <input type="password"  v-model="form.password" :class="{'is-invalid':form.errors.has('password')}" class="form-control" id="password" placeholder="Password">
                       <has-error :form="form" field="password"></has-error>
                    </div>
                    
                  </div>
                  <div class="form-group row">
                    <label for="inputConfirm" class="col-sm-2 col-form-label">Confirm</label>
                    <div class="col-sm-10">
                      <input type="password"  v-model="form.confirm" :class="{'is-invalid':form.errors.has('confirm')}" class="form-control" id="inputConfirm" placeholder="Confirm Password"> <has-error :form="form" field="confirm"></has-error>
                    </div>
                   
                  </div>
                     <div class="form-group row">
                     <label for="exampleInputFile" class="col-sm-2 col-form-label"> Image *</label>
                     <div class="col-sm-10">
                      <div class="custom-file">
                        <input type="file" :class="{'is-invalid' :form.errors.has('userimage')}" id="userimage"  class="custom-file-input"   @change="changephoto($event)">
                           
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                        <has-error :form="form" field="userimage" ></has-error>
                      </div>
                      </div>
                      
                     <img :src="form.userimage" alt="" width="80px">
                    </div>

                      <div class="form-group row">
                    <label for="gender"  class="col-sm-2 col-form-label">Select Gender *</label>
                <div class="col-sm-10">
                    <select  :class="{'is-invalid' :form.errors.has('gender')}" id="gender"  v-model="form.gender" class="form-control" >
                        <option disabled value="">Select One</option>
                      <option v-for="gendername in gender" :value="gendername.id" >{{gendername.gender}}</option>
                     
                    </select>
                     <has-error :form="form" field="gender" ></has-error>
                </div>
                  </div> 
                  <div class="form-group row">
                    <label for="Division"  class="col-sm-2 col-form-label">Select Division *</label>
                <div class="col-sm-10">
                    <select  :class="{'is-invalid' :form.errors.has('division')}" id="Division" @change="onDivisionChange"  v-model="form.division" class="form-control" >
                        <option disabled value="">Select One</option>
                      <option v-for="divisionname in alldivision" :value="divisionname.id" >{{divisionname.divisionname}}</option>
                     
                    </select>
                     <has-error :form="form" field="division" ></has-error>
                </div>
                  </div>

                     <div class="form-group row">
                    <label for="Division"  class="col-sm-2 col-form-label"> Sub Division *</label>
                <div class="col-sm-10">
                    <select  :class="{'is-invalid' :form.errors.has('subdivision')}" id="subdivision"  v-model="form.subdivision" class="form-control" >
                        <option disabled value="">Select One</option>
                      <option v-for="subdivisionname in allsubdivision" :value="subdivisionname.id" >{{subdivisionname.subdivisionname}}</option>
                     
                    </select>
                     <has-error :form="form" field="subdivision" ></has-error>
                </div>
                  </div>
                  
                    <div class="offset-sm-2 col-sm-10">
                      <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck2">
                        <label class="form-check-label" for="exampleCheck2">Remember me</label>
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
            name:'New',
              data(){
              return {
                form: new Form({
                  username:'',
                  userphone:'',
                  alluserDivision:'',
                   userimage: '',
                   division: '',
                   subdivision: '',
                  gender:'',
                  email:'',
                  password:'',
                  confirm:'',
                }),
                gender: null,
                alldivision: null,
                allsubdivision: null,
                
              }
          },
      mounted () {
         var token= localStorage.getItem("token");
      var user= localStorage.getItem("user");
     
      if( token && user){
       
          this.$router.push({name: 'UserDashboard'})
      
         
      };
    axios.get('http://127.0.0.1:8000/en/genderlist')
      .then(response =>{ (this.gender = response.data.gender)
      //console.log(response);
       
        });
        axios.get('http://127.0.0.1:8000/en/division')
      .then(response =>{ (this.alldivision = response.data.division)
      //console.log(response);
       
        });
        axios.get('http://127.0.0.1:8000/en/subdivisionlist')
      .then(response =>{ (this.allsubdivision = response.data.subdivision)
      //console.log(response);
       
        });
   
  },
 



          methods: {
            userregister(){
              console.log(this.form);
               this.form.post("en/register", this.form)
              .then(response => { [toastr.success('Login  Successfull')],[this.$router.push({name: 'UserLogin' })]
              if(response.data.token){
              localStorage.setItem("token", response.data.token); 
             
              }
              })
               .catch(response=> {console.log(response);[toastr.warning("Sorry Try Agin"),] });
            },
             onDivisionChange(event) {
           
               axios.get('http://127.0.0.1:8000/en/subdivision/'+ event.target.value)
      .then(response =>{ (this.allsubdivision = response.data.subdivision)
       console.log(response);
       
          });
             },
            changephoto(event){
      let file=event.target.files[0];
      let reader=new FileReader();
      reader.onload=event=>{
        this.form.userimage=event.target.result
      },
      reader.readAsDataURL(file);
    }

            //  [localStorage.setItem("token", response.data.token)], [this.$route.defaults.headers.common['Authorization']="Token " + localStorage.getItem("token")],
          }
        }
      </script>

    
