<template>
      <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Create Account Type</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
               <form role="form" @submit.prevent="addAccounttype">
             
                <div class="card-body">
                  <div class="form-group">
                    <label for="accounttype">Account Type</label>
                     <input  v-model="form.accounttype" type="text" class="form-control" :class="{ 'is-invalid': form.errors.has('accounttype') }" id="accounttype" placeholder="Account Type ">
                        <has-error :form="form" field="accounttype"></has-error>
                  </div>
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                   <router-link to="/superadmin/accounttypelist" class="btn btn-default ">Cancel</router-link>
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
        accounttype: ""
      })
    };
  },

  methods: {
    addAccounttype() {
      this.form
        .post("/superadmin/createaccounttype",this.form)
        //console.log('ok');
        .then(({ response }) => {
          [toastr.success("Accounttype Create Successfull")],
            [this.$router.push("/superadmin/accounttypelist")];
        })
        .catch(function(response) {
          console.log(response);
          toastr.warning("Sorry Try Agin");
        });
    }
  }
};
</script>