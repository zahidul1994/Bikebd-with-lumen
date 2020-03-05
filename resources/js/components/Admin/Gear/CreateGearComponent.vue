<template>
      <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Create Gear</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
               <form role="form" @submit.prevent="addGear">
             
                <div class="card-body">
                  <div class="form-group">
                    <label for="gear">Gear</label>
                     <input  v-model="form.gear" type="number" class="form-control" :class="{ 'is-invalid': form.errors.has('gear') }" id="gear" placeholder="Gear">
                        <has-error :form="form" field="gear"></has-error>
                  </div>
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                   <router-link to="/admin/gearlist" class="btn btn-default ">Cancel</router-link>
               </div>
            </form>
                </div>
                
            <!-- /.card -->


       
            
</template>

<script>
export default {
  name: "New",
   created () {
            document.title = "Create Gear";
        },
  data() {
    return {
      form: new Form({
        gear: ""
      })
    };
  },

  methods: {
    addGear() {
      this.form
        .post("/admin/creategear")
        //console.log('ok');
        .then(({ response }) => {
          [toastr.success("Gear Create Successfull")],
            [this.$router.push("/admin/gearlist")];
        })
        .catch(function(response) {
          console.log(response);
          toastr.warning("Sorry Try Agin");
        });
    }
  }
};
</script>