<template>
      <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Create Account Role</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
               <form role="form" @submit.prevent="addAdminRole">
             
                <div class="card-body">
                  <div class="form-group">
                    <label for="name">Permission *</label>
                     <input  v-model="form.name" type="text" class="form-control" :class="{ 'is-invalid': form.errors.has('name') }" id="name" placeholder="Role Name ">
                        <has-error :form="form" field="name"></has-error>
                  </div>
                   <div class="form-group">
                    <label for="name">Role Name *</label>
                    <br>
        <span v-for="value in Permissionlist" :key="value.id">
                    <input  v-model="form.permission" type="checkbox"  :value="value.id"  :id="value.id">
                   <label :for="value.id">{{value.name}}</label> &nbsp;
                   </span>
                  </div>
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                   <router-link to="/superadmin/accountrolelist" class="btn btn-default ">Cancel</router-link>
               </div>
            </form>
                </div>
                
            <!-- /.card -->


       
            
</template>

<script>
export default {
  name: "New",
  data() {
    return {
      form: new Form({
        name:"",
        permission:[],
      }),
      Permissionlist:null
    };
  },
  created () {
            document.title = "Create Role Name";
        },
         mounted(){
          axios.post(`superadmin/allpermissionlist`)
          .then((response)=>{
              this.Permissionlist=response.data.permissionlist
          })
      },
  methods: {
    addAdminRole() {
      this.form
        .post("superadmin/createaccountrole",this.form)
        //console.log('ok');
        .then(({ response }) => {
          [toastr.success("Account Role Create Successfull")],
            [this.$router.push("/superadmin/accountrolelist")];
        })
        .catch(function(response) {
          console.log(response);
          toastr.warning("Sorry Try Agin");
        });
    }
  }
};
</script>