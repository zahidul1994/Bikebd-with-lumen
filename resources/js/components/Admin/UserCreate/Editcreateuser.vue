<template>
      <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit Account </h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
               <form role="form" @submit.prevent="UpdateUesr" enctype="multipart/form-data">
             <div class="card-body">
                  <div class="form-group">
                    <label for="accounttype">Update Account Type *</label>
                    <select   class="form-control" :class="{'is-invalid' :form.errors.has('accounttype_id')}" v-model="form.accounttype_id">
                        <option disabled value="">Select One</option>
                      <option  id="accounttype"  v-for="accountname in allaccounttype3" :value="accountname.id">{{accountname.accounttype}}</option>
                     
                    
                    </select>
                     <has-error :form="form" field="accounttype_id"></has-error>
                  </div>
                  <div class="form-group">
                    <label for="name"> Update Name *</label>
                     <input  v-model="form.name" type="text" class="form-control" :class="{ 'is-invalid': form.errors.has('name') }" id="name" placeholder="Update Name">
                        <has-error :form="form" field="name"></has-error>
                  </div>
                  <div class="form-group">
                    <label for="phone">Update Phone Name *</label>
                     <input  v-model="form.phone" type="number" class="form-control" :class="{ 'is-invalid': form.errors.has('phone') }" id="phone" placeholder="+8801"  >
                        <has-error :form="form" field="phone"></has-error>
                  </div>
                  <div class="form-group">
                    <label for="email"> Update Email *</label>
                     <input  v-model="form.email" type="text" class="form-control" :class="{ 'is-invalid': form.errors.has('email') }" id="email" placeholder="Update Email">
                        <has-error :form="form" field="email"></has-error>
                  </div>
                  <div class="form-group">
                    <label for="name">Update Password </label>
                     <input  v-model="form.password" type="text" class="form-control" :class="{ 'is-invalid': form.errors.has('password') }" id="password" placeholder="Update Password">
                        <has-error :form="form" field="password"></has-error>
                  </div>
                  <div class="form-group">
                    <label for="confirm">Confirm Password </label>
                     <input  v-model="form.confirm" type="text" class="form-control" :class="{ 'is-invalid': form.errors.has('confirm') }" id="confirm" placeholder="Confirm Password">
                        <has-error :form="form" field="confirm"></has-error>
                  </div>
                  <div class="form-group">
                     <label for="exampleInputFile">Update Image </label>
                     
                      <div class="custom-file">
                        <input  type="file" :class="{'is-invalid' :form.errors.has('image')}" name="image"  class="custom-file-input"   @change="changephoto($event)">
                           
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                        <has-error :form="form" field="image" ></has-error>
                      </div>
                      
                    <img :src="updateImage()"  width="80" height="80">
                    </div>


                  <div class="form-group">
                    <label for="gender">Update Gender *</label>
                    <select :class="{'is-invalid' :form.errors.has('gender_id')}" id="gender" v-model="form.gender_id" class="form-control" >
                        <option disabled value="">Select One</option>
                      <option v-for="gendername in allgender1" :value="gendername.id" >{{gendername.gender}}</option>
                     
                    </select>
                     <has-error :form="form" field="gender_id" ></has-error>
                  </div>
                  <div class="form-group">
                    <label for="active">Update Status *</label>
                      <select  :class="{'is-invalid' :form.errors.has('status_id')}" id="active"  v-model="form.status_id" class="form-control">
                         <option disabled value="">Select One</option>
                      <option :value="status.id" v-for="status in allstatus">{{status.status_name}}</option>
                     </select>
                    <has-error :form="form" field="status_id" ></has-error>
                  </div>

                    

                </div>
                
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Update</button>
                   <router-link to="/admin/userlist" class="btn btn-default ">Cancle</router-link>
               </div>
            </form>
                </div>
                
            <!-- /.card -->


       
            
</template>

<script>
export default {
  name: "EditAdmin",
   created () {
            document.title = "Team Member Edit";
        },
  data() {
    return {
      form: new Form({
        accounttype_id: '',
        name: '',
        phone: '',
        email: '',
        password: '',
        confirm: '',
        image: '',
        gender_id: '',
        status_id: ''
      }),
               allaccounttype3: null,
                allgender1: null,
                allstatus: null,
    };
  },
  mounted() {
    // this.$store.dispatch("allGender"); //for show Gender
    // this.$store.dispatch("allStatus"); //for show Status
    //  this.$store.dispatch("allAccounttype"); //for show Account Type

      axios
                .get('http://127.0.0.1:8000/admin/accounttypelist')
                .then(response => {
                    //(this.allaccounttype = response.data.accountypeinfo)
                     (this.allaccounttype3 = response.data.hiaccount)
                   // console.log(response);

                });
                 axios.get('http://127.0.0.1:8000/admin/genderlist')
                .then(response => {
                    (this.allgender1 = response.data.genderinfo)
                    //alert(5);
                    //console.log(response);

                });
                   axios
                .get('http://127.0.0.1:8000/admin/statuslist')
                .then(response => {
                    (this.allstatus = response.data.statusinfo)
                    //console.log(response);
                       });
  },
  computed: {
 
  },
    created(){
            axios.get(`/admin/editcreateuser/${this.$route.params.id}`)
                .then((response)=>{
                    console.log(response.data)
                    this.form.fill(response.data.teammemberlist)
                })

        },
  methods: {
    
    UpdateUesr() {
this.form.put('/admin/updatecreateuser/'+`${this.$route.params.id}`)
     // this.form.post("/superadmin/addadmin")
        //console.log(this.form.accounttype)
        .then(({ response }) => {
          [toastr.success("Account Update Successfull")],
            [this.$router.push("/admin/userlist")];
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
        this.form.image=event.target.result
      },
      reader.readAsDataURL(file);
    },
   updateImage(){
                let img = this.form.image;
                if(img.length>100){
                    return  this.form.image
                }else{
                    return `/profileimage/${this.form.image}`
                }

            }
  }
};

</script>
