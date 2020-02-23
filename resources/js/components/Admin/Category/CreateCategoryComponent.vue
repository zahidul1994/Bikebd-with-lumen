<template>
      <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Create Category</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
               <form role="form" @submit.prevent="addCategory">
             
                <div class="card-body">
                  <div class="form-group">
                    <label for="division">Category</label>
                     <input  v-model="form.categoryname" type="text" class="form-control" :class="{ 'is-invalid': form.errors.has('categoryname') }" id="division" placeholder="Category Name">
                        <has-error :form="form" field="categoryname"></has-error>
                  </div>
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                   <router-link to="/admin/categorylist" class="btn btn-default ">Cancle</router-link>
               </div>
            </form>
                </div>
                
            <!-- /.card -->


       
            
</template>

<script>
export default {
  name: "New",
   created () {
            document.title = "Create Category";
        },
  data() {
    return {
      form: new Form({
        categoryname: ""
      })
    };
  },

  methods: {
    addCategory() {
      this.form
        .post("/admin/createcategory")
        //console.log('ok');
        .then(({ response }) => {
          [toastr.success("Category Create Successfull")],
            [this.$router.push("/admin/categorylist")];
        })
        .catch(function(response) {
          console.log(response);
          toastr.warning("Sorry Try Agin");
        });
    }
  }
};
</script>