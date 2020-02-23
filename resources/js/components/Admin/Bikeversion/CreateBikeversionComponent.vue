<template>
      <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Create Bike Version</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
               <form role="form" @submit.prevent="addBikeVersion">
             
                <div class="card-body">
                  <div class="form-group">
                    <label for="bikeversion">Bike Version</label>
                     <input  v-model="form.bikeversion" type="text" class="form-control" :class="{ 'is-invalid': form.errors.has('bikeversion') }" id="bikeversion" placeholder="Bike Version Name">
                        <has-error :form="form" field="bikeversion"></has-error>
                  </div>
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                   <router-link to="/admin/bikeversionlist" class="btn btn-default ">Cancle</router-link>
               </div>
            </form>
                </div>
                
            <!-- /.card -->


       
            
</template>

<script>
export default {
  name: "Createbikeversion",
   created () {
            document.title = "Create Bike Version";
        },
  data() {
    return {
      form: new Form({
        bikeversion: ""
      })
    };
  },

  methods: {
    addBikeVersion() {
      this.form
        .post("/admin/createbikeversion")
        //console.log('ok');
        .then(({ response }) => {
          [toastr.success("Bike Version Create Successfull")],
            [this.$router.push("/admin/bikeversionlist")];
        })
        .catch(function(response) {
          console.log(response);
          toastr.warning("Sorry Try Agin");
        });
    }
  }
};
</script>