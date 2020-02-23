<template>
      <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit Profile </h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
               <form role="form" @submit.prevent="UpdateUser" enctype="multipart/form-data">
             <div class="card-body">
                
                  <div class="form-group">
                    <label for="name"> Update Name *</label>
                     <input  v-model="form.username" type="text" class="form-control" :class="{ 'is-invalid': form.errors.has('username') }" id="name" placeholder="Update Name">
                        <has-error :form="form" field="username"></has-error>
                  </div>
                  <div class="form-group">
                    <label for="phone">Update Phone  *</label>
                     <input  v-model="form.userphone" type="number" class="form-control" :class="{ 'is-invalid': form.errors.has('userphone') }" id="phone" placeholder="+8801"  >
                        <has-error :form="form" field="userphone"></has-error>
                  </div>
                  
                  <!-- 
                  <div class="form-group">
                    <label for="name">Update Password </label>
                     <input  v-model="form.password" type="text" class="form-control" :class="{ 'is-invalid': form.errors.has('password') }" id="password" placeholder="Update Password">
                        <has-error :form="form" field="password"></has-error>
                  </div>
                  <div class="form-group">
                    <label for="confirm">Confirm Password </label>
                     <input  v-model="form.confirm" type="text" class="form-control" :class="{ 'is-invalid': form.errors.has('confirm') }" id="confirm" placeholder="Confirm Password">
                        <has-error :form="form" field="confirm"></has-error>
                  </div>  -->
                  <div class="form-group">
                     <label for="exampleInputFile">Update Image </label>
                     
                      <div class="custom-file">
                        <input  type="file" :class="{'is-invalid' :form.errors.has('userimage')}" name="userimage"  class="custom-file-input"   @change="changephoto($event)">
                           
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                        <has-error :form="form" field="userimage" ></has-error>
                      </div>
                      
                    <img :src="updateImage()"  width="80" height="80">
                    </div>


                  <div class="form-group">
                    <label for="gender">Update Gender *</label>
                    <select :class="{'is-invalid' :form.errors.has('genderid')}" id="gender" v-model="form.genderid" class="form-control" >
                        <option disabled value="">Select One</option>
                      <option v-for="gendername in gender" :value="gendername.id" >{{gendername.gender}}</option>
                     
                    </select>
                     <has-error :form="form" field="genderid" ></has-error>
                  </div>
                   <div class="form-group">
                    <label for="Division">Select Division *</label>
                
                    <select  :class="{'is-invalid' :form.errors.has('divisionid')}" id="Division" @change="onDivisionChange"  v-model="form.divisionid" class="form-control" >
                        <option disabled value="">Select One</option>
                      <option v-for="divisionname in alldivision" :value="divisionname.id" >{{divisionname.divisionname}}</option>
                     
                    </select>
                     <has-error :form="form" field="divisionid" ></has-error>
                
                  </div>

                     <div class="form-group">
                    <label for="Division"> Sub Division *</label>
               
                    <select  :class="{'is-invalid' :form.errors.has('subdivisionid')}" id="subdivision"  v-model="form.subdivisionid" class="form-control" >
                        <option disabled value="">Select One</option>
                      <option v-for="subdivisionname in allsubdivision" :value="subdivisionname.id" >{{subdivisionname.subdivisionname}}</option>
                     
                    </select>
                     <has-error :form="form" field="subdivisionid" ></has-error>
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
  name: "EditMyprofile",
  data() {
    return {
      form: new Form({
       
        username: '',
        userphone: '',
        // email: '',
        // password: '',
        // confirm: '',
        userimage: '',
        divisionid: '',
        subdivisionid: '',
        genderid:'',
        subdivisionid:''
       
      }),
        gender:null,
        alldivision: null,
        allsubdivision: null,
    };
  },
 
        mounted () {
          
            var user= localStorage.getItem("user");
                if(!user){
               this.$router.push("/en/login") 
            }
       
    axios.get('http://127.0.0.1:8000/en/genderlist')
      .then(response =>{ (this.gender = response.data.gender)
     // console.log(response);
       
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
    created(){
      document.title="User Info ";
      
            axios.get(`/en/editmyprofile/${this.$route.params.id}`)
                .then((response)=>{
                    //console.log(response.data)
                    this.form.fill(response.data.userinfo)
                })

        },
  methods: {
    
    UpdateUser() {
this.form.put('/en/updatemyprofile/'+`${this.$route.params.id}`)
     // this.form.post("/superadmin/addadmin")
        //console.log(this.form.accounttype)
        .then(({ response }) => {
          [toastr.success("Account Update Successfully" , "Please Login")],
           [this.$router.push('/en/login')],[localStorage.clear()]})
      
        .catch(function(response) {
          //console.log(response);
          toastr.warning("Sorry Try Agin");
        });
    },
     onDivisionChange(event) {
           
               axios.get('http://127.0.0.1:8000/en/subdivision/'+ event.target.value)
      .then(response =>{ (this.allsubdivision = response.data.subdivision)
      // console.log(response);
       
          });
             },
    changephoto(event){
      let file=event.target.files[0];
      let reader=new FileReader();
      reader.onload=event=>{
        this.form.userimage=event.target.result
      },
      reader.readAsDataURL(file);
    },
   updateImage(){
                let img = this.form.userimage;
                if(img.length>100){
                    return  this.form.userimage
                }else{
                    return `/images/profileimage/${this.form.userimage}`
                }

            }
  }
};

</script>
