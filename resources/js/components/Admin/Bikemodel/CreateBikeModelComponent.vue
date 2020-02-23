<template>
      <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Create Bike Model</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
               <form role="form" @submit.prevent="addBikeModel">
             
                <div class="card-body">
                  <div class="form-group">
                    <label for="bikemodel">Bike Model</label>
                     <input  v-model="form.bikemodel" type="text" class="form-control" :class="{ 'is-invalid': form.errors.has('bikemodel') }" id="bikemodel" placeholder="Bike model Name">
                        <has-error :form="form" field="bikemodel"></has-error>
                  </div>
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                   <router-link to="/admin/bikemodellist" class="btn btn-default ">Cancle</router-link>
               </div>
            </form>
                </div>
                
            <!-- /.card -->


       
            
</template>

<script>
export default {
  name: "bikemodelCreate",
   created () {
            document.title = "Create Bike Model";
        },
  data() {
    return {
      form: new Form({
        bikemodel: ""
      })
    };
  },

  methods: {
    addBikeModel() {
      this.form
        .post("/admin/createbikemodel")
        //console.log('ok');
        .then(({ response }) => {
          [toastr.success("BikeModel  Create Successfull")],
            [this.$router.push("/admin/bikemodellist")];
        })
        .catch(function(response) {
          console.log(response);
          toastr.warning("Sorry Try Agin");
        });
    }
  }
};
</script>