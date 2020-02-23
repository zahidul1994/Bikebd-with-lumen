<template>
      <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Create Gender</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
               <form role="form" @submit.prevent="addGender">
             
                <div class="card-body">
                  <div class="form-group">
                    <label for="gender">Gender</label>
                     <input  v-model="form.gender" type="text" class="form-control" :class="{ 'is-invalid': form.errors.has('gender') }" id="gender" placeholder="Gender Name">
                        <has-error :form="form" field="gender"></has-error>
                  </div>
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                   <router-link to="/superadmin/genderlist" class="btn btn-default ">Cancle</router-link>
               </div>
            </form>
             
                </div>
                
            <!-- /.card -->


       
            
</template>

<script>

export default {

  name: "New",
   created () {
            document.title = "Create Gender";
        },
  data() {
    return {
      form: new Form({
        gender: ""
      })
    };
  },

  methods: {
    addGender() {
      this.form
        .post("/superadmin/creategender")
        //console.log('ok');
        .then(({ response }) => {
          [toastr.success("Gender Create Successfull")],
            [this.$router.push("/superadmin/genderlist")];
        })
        .catch(function(response) {
          console.log(response);
          toastr.warning("Sorry Try Agin");
        });
    }
  }
};
</script>