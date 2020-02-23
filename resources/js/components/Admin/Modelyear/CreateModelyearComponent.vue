<template>
      <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Create Model Year</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
               <form role="form" @submit.prevent="addModelYear">
             
                <div class="card-body">
                  <div class="form-group">
                    <label for="bikemodel">Model Year</label>
                     <input  v-model="form.modelyear" type="number" class="form-control" :class="{ 'is-invalid': form.errors.has('modelyear') }" id="bikemodel" placeholder="Model Year">
                        <has-error :form="form" field="modelyear"></has-error>
                  </div>
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                   <router-link to="/admin/modelyearlist" class="btn btn-default ">Cancle</router-link>
               </div>
            </form>
                </div>
                
            <!-- /.card -->


       
            
</template>

<script>
export default {
  name: "modelYearCreate",
   created () {
            document.title = "Create  Model Year";
        },
  data() {
    return {
      form: new Form({
        modelyear: ""
      })
    };
  },

  methods: {
    addModelYear() {
      this.form
        .post("/admin/createmodelyear")
        //console.log('ok');
        .then(({ response }) => {
          [toastr.success("Model year Create Successfull")],
            [this.$router.push("/admin/modelyearlist")];
        })
        .catch(function(response) {
          console.log(response);
          toastr.warning("Sorry Try Agin");
        });
    }
  }
};
</script>