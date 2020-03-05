<template>
      <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Create Clutch</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
               <form role="form" @submit.prevent="addClutch">
             
                <div class="card-body">
                  <div class="form-group">
                    <label for="clutch">Clutch</label>
                     <input  v-model="form.clutch" type="text" class="form-control" :class="{ 'is-invalid': form.errors.has('clutch') }" id="clutch" placeholder="Clutch Name">
                        <has-error :form="form" field="clutch"></has-error>
                  </div>
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                   <router-link to="/admin/clutchlist" class="btn btn-default ">Cancel</router-link>
               </div>
            </form>
                </div>
                
            <!-- /.card -->


       
            
</template>

<script>
export default {
  name: "New",
   created () {
            document.title = "Create Clutch";
        },
  data() {
    return {
      form: new Form({
        clutch: ""
      })
    };
  },

  methods: {
    addClutch() {
      this.form
        .post("/admin/createclutch")
        //console.log('ok');
        .then(({ response }) => {
          [toastr.success("Clutch Create Successfull")],
            [this.$router.push("/admin/clutchlist")];
        })
        .catch(function(response) {
          console.log(response);
          toastr.warning("Sorry Try Agin");
        });
    }
  }
};
</script>