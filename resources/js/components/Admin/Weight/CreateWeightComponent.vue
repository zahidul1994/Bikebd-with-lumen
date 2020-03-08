<template>
      <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Create Weight</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
               <form role="form" @submit.prevent="addWeight">
             
                <div class="card-body">
                  <div class="form-group">
                    <label for="weight">Weight</label>
                     <input  v-model="form.weight" type="text" class="form-control" :class="{ 'is-invalid': form.errors.has('weight') }" id="weight" placeholder="Weight">
                        <has-error :form="form" field="weight"></has-error>
                  </div>
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                   <router-link to="/admin/weightlist" class="btn btn-default ">Cancel</router-link>
               </div>
            </form>
                </div>
                
            <!-- /.card -->


       
            
</template>

<script>
export default {
  name: "New",
   created () {
            document.title = "Create Weight";
        },
  data() {
    return {
      form: new Form({
        weight: ""
      })
    };
  },

  methods: {
    addWeight() {
      this.form
        .post("/admin/createweight")
        //console.log('ok');
        .then(({ response }) => {
          [toastr.success("Wight Create Successfull")],
            [this.$router.push("/admin/weightlist")];
        })
        .catch(function(response) {
          console.log(response);
          toastr.warning("Sorry Try Agin");
        });
    }
  }
};
</script>