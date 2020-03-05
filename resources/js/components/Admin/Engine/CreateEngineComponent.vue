<template>
      <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Create Engine</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
               <form role="form" @submit.prevent="addEngine">
             
                <div class="card-body">
                  <div class="form-group">
                    <label for="enginetype">Engine Name</label>
                     <input  v-model="form.enginetype" type="text" class="form-control" :class="{ 'is-invalid': form.errors.has('enginetype') }" id="enginetype" placeholder="Engine Type Name">
                        <has-error :form="form" field="enginetype"></has-error>
                  </div>
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                   <router-link to="/admin/enginelist" class="btn btn-default ">Cancel</router-link>
               </div>
            </form>
                </div>
                
            <!-- /.card -->


       
            
</template>

<script>
export default {
  name: "New",
   created () {
            document.title = "Create Engine";
        },
  data() {
    return {
      form: new Form({
        enginetype: ""
      })
    };
  },

  methods: {
    addEngine() {
      this.form
        .post("/admin/createengine")
        //console.log('ok');
        .then(({ response }) => {
          [toastr.success("Engine Create Successfull")],
            [this.$router.push("/admin/enginelist")];
        })
        .catch(function(response) {
          console.log(response);
          toastr.warning("Sorry Try Agin");
        });
    }
  }
};
</script>