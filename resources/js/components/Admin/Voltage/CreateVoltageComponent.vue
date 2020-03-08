<template>
      <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Create Bettery Voltage</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
               <form role="form" @submit.prevent="addBvoltage">
             
                <div class="card-body">
                  <div class="form-group">
                    <label for="bvoltage">Bettery Voltage</label>
                     <input  v-model="form.bvoltage" type="text" class="form-control" :class="{ 'is-invalid': form.errors.has('bvoltage') }" id="bvoltage" placeholder="Bettert Voltage">
                        <has-error :form="form" field="bvoltage"></has-error>
                  </div>
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                   <router-link to="/admin/bvoltagelist" class="btn btn-default ">Cancel</router-link>
               </div>
            </form>
                </div>
                
            <!-- /.card -->


       
            
</template>

<script>
export default {
  name: "New",
   created () {
            document.title = "Create Bettery Voltage";
        },
  data() {
    return {
      form: new Form({
        bvoltage: ""
      })
    };
  },

  methods: {
    addBvoltage() {
      this.form
        .post("/admin/createbvoltage")
        //console.log('ok');
        .then(({ response }) => {
          [toastr.success("Bettery Voltage Create Successfull")],
            [this.$router.push("/admin/bvoltagelist")];
        })
        .catch(function(response) {
          console.log(response);
          toastr.warning("Sorry Try Agin");
        });
    }
  }
};
</script>