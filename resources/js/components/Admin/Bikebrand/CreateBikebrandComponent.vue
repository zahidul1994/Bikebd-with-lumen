<template>
      <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Create Bike Brand</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
               <form role="form" @submit.prevent="addBikeBrand">
             
                <div class="card-body">
                  <div class="form-group">
                    <label for="bikebrand">Bike Brand</label>
                     <input  v-model="form.bikebrand" type="text" class="form-control" :class="{ 'is-invalid': form.errors.has('bikebrand') }" id="bikebrand" placeholder="Bike Brand Name">
                        <has-error :form="form" field="bikebrand"></has-error>
                  </div>
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                   <router-link to="/admin/bikebrandlist" class="btn btn-default ">Cancle</router-link>
               </div>
            </form>
                </div>
                
            <!-- /.card -->


       
            
</template>

<script>
export default {
  name: "Createbikebrand",
   created () {
            document.title = "Create Bike Brand";
        },
  data() {
    return {
      form: new Form({
        bikebrand: ""
      })
    };
  },

  methods: {
    addBikeBrand() {
      this.form
        .post("/admin/createbikebrand")
        //console.log('ok');
        .then(({ response }) => {
          [toastr.success("Bike Brand Create Successfull")],
            [this.$router.push("/admin/bikebrandlist")];
        })
        .catch(function(response) {
          console.log(response);
          toastr.warning("Sorry Try Agin");
        });
    }
  }
};
</script>