<template>
      <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Create CC</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
               <form role="form" @submit.prevent="addModelYear">
             
                <div class="card-body">
                  <div class="form-group">
                    <label for="bikemodel">CC Name</label>
                     <input  v-model="form.cc" type="text" class="form-control" :class="{ 'is-invalid': form.errors.has('cc') }" id="cc" placeholder="CC">
                        <has-error :form="form" field="cc"></has-error>
                  </div>
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                   <router-link to="/admin/cclist" class="btn btn-default ">Cancel</router-link>
               </div>
            </form>
                </div>
                
            <!-- /.card -->


       
            
</template>

<script>
export default {
  name: "CCCreate",
   created () {
            document.title = "Create CC";
        },
  data() {
    return {
      form: new Form({
        cc: ""
      })
    };
  },

  methods: {
    addModelYear() {
      this.form
        .post("/admin/createcclist")
        //console.log('ok');
        .then(({ response }) => {
          [toastr.success("Cc Create Successfull")],
            [this.$router.push("/admin/cclist")];
        })
        .catch(function(response) {
          toastr.warning("Sorry Try Agin");
        });
    }
  }
};
</script>