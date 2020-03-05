<template>
      <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Create Chassis</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
               <form role="form" @submit.prevent="addChassis">
             
                <div class="card-body">
                  <div class="form-group">
                    <label for="chassis">Chassis</label>
                     <input  v-model="form.chassis" type="text" class="form-control" :class="{ 'is-invalid': form.errors.has('chassis') }" id="chassis" placeholder="Chassis Name">
                        <has-error :form="form" field="chassis"></has-error>
                  </div>
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                   <router-link to="/admin/chassislist" class="btn btn-default ">Cancel</router-link>
               </div>
            </form>
                </div>
                
            <!-- /.card -->


       
            
</template>

<script>
export default {
  name: "New",
   created () {
            document.title = "Create Chassis";
        },
  data() {
    return {
      form: new Form({
        chassis: ""
      })
    };
  },

  methods: {
    addChassis() {
      this.form
        .post("/admin/createchassis")
        //console.log('ok');
        .then(({ response }) => {
          [toastr.success("Chassis Create Successfull")],
            [this.$router.push("/admin/chassislist")];
        })
        .catch(function(response) {
          console.log(response);
          toastr.warning("Sorry Try Agin");
        });
    }
  }
};
</script>