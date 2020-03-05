<template>
      <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Create Cylinder</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
               <form role="form" @submit.prevent="addCylinder">
             
                <div class="card-body">
                  <div class="form-group">
                    <label for="cylinder">Cylinder</label>
                     <input  v-model="form.cylinder" type="number" class="form-control" :class="{ 'is-invalid': form.errors.has('cylinder') }" id="cylinder" placeholder="Cylinder Name">
                        <has-error :form="form" field="cylinder"></has-error>
                  </div>
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                   <router-link to="/admin/cylinderelist" class="btn btn-default ">Cancel</router-link>
               </div>
            </form>
                </div>
                
            <!-- /.card -->


       
            
</template>

<script>
export default {
  name: "New",
   created () {
            document.title = "Create Cylinder";
        },
  data() {
    return {
      form: new Form({
        cylinder: ""
      })
    };
  },

  methods: {
    addCylinder() {
      this.form
        .post("/admin/createcylinder")
        //console.log('ok');
        .then(({ response }) => {
          [toastr.success("Cylinder Create Successfull")],
            [this.$router.push("/admin/cylinderelist")];
        })
        .catch(function(response) {
          console.log(response);
          toastr.warning("Sorry Try Agin");
        });
    }
  }
};
</script>