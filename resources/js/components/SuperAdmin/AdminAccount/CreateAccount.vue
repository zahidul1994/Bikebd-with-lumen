<template>
      <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Create Admin </h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
               <form role="form" @submit.prevent="addAdmin" enctype="multipart/form-data">
               
                <div class="card-body">
                    <div class="form-group">
                    <label for="language">Language *</label>
                    <select  :class="{'is-invalid' :form.errors.has('language')}" id="bikeversion"  v-model="form.language" class="form-control" >
                       <option disabled value="">Select One</option>
                        <option selected value="en">English</option>
                        <option  value="bn">Bangla</option>
                     
                    </select>
                     <has-error :form="form" field="language" ></has-error>
                </div>
                  <div class="form-group">
                    <label for="roles">Select Permission</label>
                    <select   class="form-control" :class="{'is-invalid' :form.errors.has('roles')}" v-model="form.roles" required>
                        <option   v-for="rolename in Rolelist" :value="rolename.name">{{rolename.name}}</option>
                    </select>
                     <has-error :form="form" field="roles"></has-error>
                  </div>
                  <div class="form-group">
                    <label for="name">Name *</label>
                     <input  v-model="form.accountname" type="text" class="form-control" :class="{ 'is-invalid': form.errors.has('accountname') }" id="name" placeholder="Admin Name">
                        <has-error :form="form" field="accountname"></has-error>
                  </div>
                  <div class="form-group">
                    <label for="phone">Phone Name *</label>
                     <input  v-model="form.phone" type="number" class="form-control" :class="{ 'is-invalid': form.errors.has('phone') }" id="phone" placeholder="+8801"  >
                        <has-error :form="form" field="phone"></has-error>
                  </div>
                  <div class="form-group">
                    <label for="email">Email *</label>
                     <input  v-model="form.email" type="text" class="form-control" :class="{ 'is-invalid': form.errors.has('email') }" id="email" placeholder=" Email Address">
                        <has-error :form="form" field="email"></has-error>
                  </div>
                  <div class="form-group">
                    <label for="pass">Password *</label>
                     <input  v-model="form.password" type="text" class="form-control" :class="{ 'is-invalid': form.errors.has('password') }" id="pass" placeholder="Type Password">
                        <has-error :form="form" field="password"></has-error>
                  </div>
                  <div class="form-group">
                    <label for="confirm">Confirm Password *</label>
                     <input  v-model="form.confirm" type="text" class="form-control" :class="{ 'is-invalid': form.errors.has('confirm') }" id="confirm" placeholder="Retype Password">
                        <has-error :form="form" field="confirm"></has-error>
                  </div>
                  <div class="form-group">
                     <label for="exampleInputFile"> Image *</label>
                      <div class="custom-file">
                        <input type="file" :class="{'is-invalid' :form.errors.has('photo')}" id="photo"  class="custom-file-input"   @change="changephoto($event)">
                           
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                        <has-error :form="form" field="photo" ></has-error>
                      </div>
                      
                     <img :src="form.photo" alt="" width="80px">
                    </div>

                  <div class="form-group">
                    <label for="gender">Select Gender *</label>
                    <select :class="{'is-invalid' :form.errors.has('gender')}" id="gender" v-model="form.gender" class="form-control" >
                        <option disabled value="">Select One</option>
                      <option v-for="gendername in allGenders" :value="gendername.id" >{{gendername.gender}}</option>
                     
                    </select>
                     <has-error :form="form" field="gender" ></has-error>
                  </div>
                  <div class="form-group">
                    <label for="active">Select Status *</label>
                      <select  :class="{'is-invalid' :form.errors.has('active')}" id="active"  v-model="form.active" class="form-control">
                         <option disabled value="">Select One</option>
                      <option :value="status.id" v-for="status in allStatuses">{{status.status_name}}</option>
                     </select>
                    <has-error :form="form" field="active" ></has-error>
                  </div>

                    

                </div>
                
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                   <router-link to="/superadmin/teammemberlist" class="btn btn-default ">Cancle</router-link>
               </div>
            </form>
                </div>
                
            <!-- /.card -->


       
            
</template>

<script>
export default {
  name: "NewAdmin",
  created() {
    document.title = "Create Team Member ";
  },
  data() {
    return {
      form: new Form({
        language: "en",
        roles: [],
        accountname: "",
        phone: "",
        email: "",
        password: "",
        confirm: "",
        photo: "",
        gender: "1",
        active: "1"
      }),
      Rolelist: null
    };
  },
  mounted() {
    this.$store.dispatch("allGender"); //for show Gender
    this.$store.dispatch("allStatus"); //for show Status

    axios.post(`superadmin/allrolename`).then(response => {
      this.Rolelist = response.data.allrolename;
    });
  },
  computed: {
    allGenders() {
      return this.$store.getters.getGender; //for get gender
    },
    allStatuses() {
      return this.$store.getters.getStatus; //for get Status
    }
  },

  methods: {
    addAdmin() {
      console.log(this.form);
      this.form
        .post("/superadmin/createteammember")
        //console.log(this.form.accounttype)
        .then(({ response }) => {
          [toastr.success("Account Create Successfull")],
            [this.$router.push("/superadmin/teammemberlist")];
        })
        .catch(function(response) {
          console.log(response);
          toastr.warning("Sorry Try Agin");
        });
    },
    changephoto(event) {
      let file = event.target.files[0];
      let reader = new FileReader();
      (reader.onload = event => {
        this.form.photo = event.target.result;
      }),
        reader.readAsDataURL(file);
    }
  }
};
</script>
