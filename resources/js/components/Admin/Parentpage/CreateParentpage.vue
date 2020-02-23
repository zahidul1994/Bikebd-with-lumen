<template>
      <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Create Parent Page</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
               <form role="form" @submit.prevent="addParentpage">
             
                <div class="card-body">
                  <div class="form-group">
                    <label for="parentpage">Parent Page</label>
                     <input  v-model="form.parentpage" type="text" class="form-control" :class="{ 'is-invalid': form.errors.has('parentpage') }" id="division" placeholder="Parent Page Name">
                        <has-error :form="form" field="parentpage"></has-error>
                  </div>
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                   <router-link to="/admin/parentpagelist" class="btn btn-default ">Cancle</router-link>
               </div>
            </form>
                </div>
                
            <!-- /.card -->


       
            
</template>

<script>
export default {
  name: "New",
   created () {
            document.title = "Create Parent Page";
        },
  data() {
    return {
      form: new Form({
        parentpage: ""
      })
    };
  },

  methods: {
    addParentpage() {
      this.form
        .post("/admin/createparentpage")
        //console.log('ok');
        .then(({ response }) => {
          [toastr.success("Parent Page Create Successfull")],
            [this.$router.push("/admin/parentpagelist")];
        })
        .catch(function(response) {
          console.log(response);
          toastr.warning("Sorry Try Agin");
        });
    }
  }
};
</script>