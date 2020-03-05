<template>
      <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Create Stroke</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
               <form role="form" @submit.prevent="addStroke">
             
                <div class="card-body">
                  <div class="form-group">
                    <label for="stroke">Stroke</label>
                     <input  v-model="form.stroke" type="text" class="form-control" :class="{ 'is-invalid': form.errors.has('stroke') }" id="stroke" placeholder="Stroke Name">
                        <has-error :form="form" field="stroke"></has-error>
                  </div>
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                   <router-link to="/admin/strokelist" class="btn btn-default ">Cancel</router-link>
               </div>
            </form>
                </div>
                
            <!-- /.card -->


       
            
</template>

<script>
export default {
  name: "New",
   created () {
            document.title = "Create Stroke";
        },
  data() {
    return {
      form: new Form({
        stroke: ""
      })
    };
  },

  methods: {
    addStroke() {
      this.form
        .post("/admin/createstroke")
        //console.log('ok');
        .then(({ response }) => {
          [toastr.success("Stroke Create Successfull")],
            [this.$router.push("/admin/strokelist")];
        })
        .catch(function(response) {
          console.log(response);
          toastr.warning("Sorry Try Agin");
        });
    }
  }
};
</script>