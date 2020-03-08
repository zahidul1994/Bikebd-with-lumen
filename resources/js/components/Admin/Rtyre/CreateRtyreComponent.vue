<template>
      <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Create Rear Tyre </h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
               <form role="form" @submit.prevent="addRronttyre">
             
                <div class="card-body">
                  <div class="form-group">
                    <label for="rtyre">Rear Tyre Size</label>
                     <input  v-model="form.rtyre" type="text" class="form-control" :class="{ 'is-invalid': form.errors.has('rtyre') }" id="rtyre" placeholder="Rear Tyre Size">
                        <has-error :form="form" field="rtyre"></has-error>
                  </div>
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                   <router-link to="/admin/rtyrelist" class="btn btn-default ">Cancel</router-link>
               </div>
            </form>
                </div>
                
            <!-- /.card -->


       
            
</template>

<script>
export default {
  name: "New",
   created () {
            document.title = "Create Rtyre";
        },
  data() {
    return {
      form: new Form({
        rtyre: ""
      })
    };
  },

  methods: {
    addRronttyre() {
      this.form
        .post("/admin/creatertyre")
        //console.log('ok');
        .then(({ response }) => {
          [toastr.success("Rear Tyre Create Successfully")],
            [this.$router.push("/admin/rtyrelist")];
        })
        .catch(function(response) {
          console.log(response);
          toastr.warning("Sorry Try Agin");
        });
    }
  }
};
</script>