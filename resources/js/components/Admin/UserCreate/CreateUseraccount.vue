<template>
      <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Create User </h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
               <form role="form" @submit.prevent="addAdmin" enctype="multipart/form-data">
               
                <div class="card-body">
                  <div class="form-group">
                    <label for="accounttype">Select Account Type *</label>
                    <select   class="form-control" :class="{'is-invalid' :form.errors.has('accounttype')}" v-model="form.accounttype">
                        <option disabled value="">Select One</option>
                      <option   v-for="hello in allaccounttype3" :value="hello.id">{{hello.accounttype}}</option>
                    
                    </select>
                     <has-error :form="form" field="accounttype"></has-error>
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
                     <input  v-model="form.password" type="password" class="form-control" :class="{ 'is-invalid': form.errors.has('password') }" id="pass" placeholder="Type Password">
                        <has-error :form="form" field="password"></has-error>
                  </div>
                  <div class="form-group">
                    <label for="confirm">Confirm Password *</label>
                     <input  v-model="form.confirm" type="password" class="form-control" :class="{ 'is-invalid': form.errors.has('confirm') }" id="confirm" placeholder="Retype Password">
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
                      <option v-for="gendername in allgender1" :value="gendername.id" >{{gendername.gender}}</option>
                     
                    </select>
                     <has-error :form="form" field="gender" ></has-error>
                  </div>
                  <div class="form-group">
                    <label for="active">Select Status *</label>
                      <select  :class="{'is-invalid' :form.errors.has('active')}" id="active"  v-model="form.active" class="form-control">
                         <option disabled value="">Select One</option>
                      <option  v-for="status in allstatus" :value="status.id">{{status.status_name}}</option>
                     </select>
                    <has-error :form="form" field="active" ></has-error>
                  </div>

                    

                </div>
                
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                   <router-link to="/admin/userlist" class="btn btn-default ">Cancle</router-link>
               </div>
            </form>
                </div>
                
            <!-- /.card -->


       
            
</template>

<script>
export default {
  name: "NewAdmin",
   created () {
            document.title = "Create Team Member ";
        },
  data() {
    return {
      form: new Form({
        accounttype: '',
        accountname: '',
        phone: '',
        email: '',
        password: '',
        confirm: '',
        photo: '',
        gender: '',
        status_name: '',
        active: ''
      }),
               allaccounttype3: null,
                allgender1: null,
                allstatus: null,
    };
  },
  mounted() {
    axios
                .get('/admin/accounttypelist')
                .then(response => {
                    //(this.allaccounttype = response.data.accountypeinfo)
                     (this.allaccounttype3 = response.data.hiaccount)
                   // console.log(response);

                });
            
                axios.get('/admin/genderlist')
                .then(response => {
                    (this.allgender1 = response.data.genderinfo)
                    //alert(5);
                    //console.log(response);

                });
                axios
                .get('/admin/statuslist')
                .then(response => {
                    (this.allstatus = response.data.statusinfo)
                    //console.log(response);
                       });

  },

  methods: {
    
    addAdmin() {
console.log(this.form);
      this.form.post("/admin/createuseraccount")
        //console.log(this.form.accounttype)
        .then(({ response }) => {
          if('response.data'=='user'){
         [toastr.success("Account Create Successfull")],
            [this.$router.push("/admin/userlist")];
  
          }else{
        [toastr.success("Account Create Successfull")],
            [this.$router.push("/admin/adminlist")];
          }
                })
        .catch(function(response) {
          console.log(response);
          toastr.warning("Sorry Try Agin");
        });
    },
    changephoto(event){
      let file=event.target.files[0];
      let reader=new FileReader();
      reader.onload=event=>{
        this.form.photo=event.target.result
      },
      reader.readAsDataURL(file);
    }
  }
};
</script>
