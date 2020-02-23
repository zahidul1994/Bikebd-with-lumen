<template>
      <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Create Accessories Type</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
               <form role="form" @submit.prevent="addAccessories">
             
                <div class="card-body">
                  <div class="form-group">
                    <label for="division">Accessories</label>
                     <input  v-model="form.accessoriesname" type="text" class="form-control" :class="{ 'is-invalid': form.errors.has('accessoriesname') }" id="division" placeholder="Accessories Name">
                        <has-error :form="form" field="accessoriesname"></has-error>
                  </div>
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                   <router-link to="/admin/accessoriestypelist" class="btn btn-default ">Cancle</router-link>
               </div>
            </form>
                </div>
                
            <!-- /.card -->


       
            
</template>

<script>
export default {
  name: "Newaccessoriesname",
   created () {
            document.title = "Create Category";
        },
  data() {
    return {
      form: new Form({
        accessoriesname: ""
      })
    };
  },

  methods: {
    addAccessories() {
      this.form
        .post("/admin/createaccessoriestype")
        //console.log('ok');
        .then(({ response }) => {
          [toastr.success("Accessories Type Create Successfull")],
            [this.$router.push("/admin/accessoriestypelist")];
        })
        .catch(function(response) {
          console.log(response);
          toastr.warning("Sorry Try Agin");
        });
    }
  }
};
</script>