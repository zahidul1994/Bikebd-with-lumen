<template>
      <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Create Fuel Tank Capacity</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
               <form role="form" @submit.prevent="addFtcapacity">
             
                <div class="card-body">
                  <div class="form-group">
                    <label for="ftcapacity">Fuel Tank Capacity</label>
                     <input  v-model="form.ftcapacity" type="text" class="form-control" :class="{ 'is-invalid': form.errors.has('ftcapacity') }" id="ftcapacity" placeholder="Fuel Tand Capacity">
                        <has-error :form="form" field="ftcapacity"></has-error>
                  </div>
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                   <router-link to="/admin/ftcapacitylist" class="btn btn-default ">Cancel</router-link>
               </div>
            </form>
                </div>
                
            <!-- /.card -->


       
            
</template>

<script>
export default {
  name: "New",
   created () {
            document.title = "Create Ftcapacity";
        },
  data() {
    return {
      form: new Form({
        ftcapacity: ""
      })
    };
  },

  methods: {
    addFtcapacity() {
      this.form
        .post("/admin/createftcapacity")
        //console.log('ok');
        .then(({ response }) => {
          [toastr.success("Ftcapacity Create Successfull")],
            [this.$router.push("/admin/ftcapacitylist")];
        })
        .catch(function(response) {
          console.log(response);
          toastr.warning("Sorry Try Agin");
        });
    }
  }
};
</script>