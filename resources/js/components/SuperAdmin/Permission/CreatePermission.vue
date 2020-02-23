<template>
      <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Create Permission</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
               <form role="form" @submit.prevent="addAccountPermission">
             
                <div class="card-body">
                  <div class="form-group">
                    <label for="name">Permission Name *</label>
                     <input  v-model="form.name" type="text" class="form-control" :class="{ 'is-invalid': form.errors.has('name') }" id="name" placeholder="Permission Name ">
                        <has-error :form="form" field="name"></has-error>
                  </div>
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                   <router-link to="/superadmin/permissionlist" class="btn btn-default ">Cancle</router-link>
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
        name: ""
      })
    };
  },
  created () {
            document.title = "Create Role Name";
        },
  methods: {
    addAccountPermission() {
      this.form
        .post("superadmin/createpermission",this.form)
        //console.log('ok');
        .then(({ response }) => {
          [toastr.success("Account Role Create Successfull")],
            [this.$router.push("/superadmin/permissionlist")];
        })
        .catch(function(response) {
          console.log(response);
          toastr.warning("Sorry Try Agin");
        });
    }
  }
};
</script>