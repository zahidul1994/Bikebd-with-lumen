<template>
      <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Create Product Type</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
               <form role="form" @submit.prevent="addProducttype">
             
                <div class="card-body">
                  <div class="form-group">
                    <label for="producttype">Producttype</label>
                     <input  v-model="form.producttype" type="text" class="form-control" :class="{ 'is-invalid': form.errors.has('producttype') }" id="producttype" placeholder="Product Type Name">
                        <has-error :form="form" field="producttype"></has-error>
                  </div>
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                   <router-link to="/admin/producttypelist" class="btn btn-default ">Cancel</router-link>
               </div>
            </form>
                </div>
                
            <!-- /.card -->


       
            
</template>

<script>
export default {
  name: "New",
   created () {
            document.title = "Create Producttype";
        },
  data() {
    return {
      form: new Form({
        producttype: ""
      })
    };
  },

  methods: {
    addProducttype() {
      this.form
        .post("/admin/createproducttype")
        //console.log('ok');
        .then(({ response }) => {
          [toastr.success("Product Type Create Successfull")],
            [this.$router.push("/admin/producttypelist")];
        })
        .catch(function(response) {
          console.log(response);
          toastr.warning("Sorry Try Agin");
        });
    }
  }
};
</script>