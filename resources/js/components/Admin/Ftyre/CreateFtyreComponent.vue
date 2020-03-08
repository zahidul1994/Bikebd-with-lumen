<template>
      <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Create Front Tyre </h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
               <form role="form" @submit.prevent="addFronttyre">
             
                <div class="card-body">
                  <div class="form-group">
                    <label for="ftyre">Front Tyre Size</label>
                     <input  v-model="form.ftyre" type="text" class="form-control" :class="{ 'is-invalid': form.errors.has('ftyre') }" id="ftyre" placeholder="Front Tyre Size">
                        <has-error :form="form" field="ftyre"></has-error>
                  </div>
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                   <router-link to="/admin/ftyrelist" class="btn btn-default ">Cancel</router-link>
               </div>
            </form>
                </div>
                
            <!-- /.card -->


       
            
</template>

<script>
export default {
  name: "New",
   created () {
            document.title = "Create Ftyre";
        },
  data() {
    return {
      form: new Form({
        ftyre: ""
      })
    };
  },

  methods: {
    addFronttyre() {
      this.form
        .post("/admin/createftyre")
        //console.log('ok');
        .then(({ response }) => {
          [toastr.success("Front Tyre Create Successfully")],
            [this.$router.push("/admin/ftyrelist")];
        })
        .catch(function(response) {
          console.log(response);
          toastr.warning("Sorry Try Agin");
        });
    }
  }
};
</script>