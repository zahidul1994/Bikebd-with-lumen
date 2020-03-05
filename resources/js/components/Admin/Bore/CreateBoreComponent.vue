<template>
      <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Create Bore</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
               <form role="form" @submit.prevent="addBore">
             
                <div class="card-body">
                  <div class="form-group">
                    <label for="bore">Bore</label>
                     <input  v-model="form.bore" type="text" class="form-control" :class="{ 'is-invalid': form.errors.has('bore') }" id="bore" placeholder="Bore Name">
                        <has-error :form="form" field="bore"></has-error>
                  </div>
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                   <router-link to="/admin/borelist" class="btn btn-default ">Cancel</router-link>
               </div>
            </form>
                </div>
                
            <!-- /.card -->


       
            
</template>

<script>
export default {
  name: "New",
   created () {
            document.title = "Create Bore";
        },
  data() {
    return {
      form: new Form({
        bore: ""
      })
    };
  },

  methods: {
    addBore() {
      this.form
        .post("/admin/createbore")
        //console.log('ok');
        .then(({ response }) => {
          [toastr.success("Bore Create Successfull")],
            [this.$router.push("/admin/borelist")];
        })
        .catch(function(response) {
          console.log(response);
          toastr.warning("Sorry Try Agin");
        });
    }
  }
};
</script>