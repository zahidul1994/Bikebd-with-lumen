<template>
      <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Create Division</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
               <form role="form" @submit.prevent="addDivision">
             
                <div class="card-body">
                  <div class="form-group">
                    <label for="division">Division</label>
                     <input  v-model="form.divisionname" type="text" class="form-control" :class="{ 'is-invalid': form.errors.has('divisionname') }" id="division" placeholder="Division Name">
                        <has-error :form="form" field="divisionname"></has-error>
                  </div>
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                   <router-link to="/admin/divisionlist" class="btn btn-default ">Cancle</router-link>
               </div>
            </form>
                </div>
                
            <!-- /.card -->


       
            
</template>

<script>
export default {
  name: "Division",
   created () {
            document.title = "Create Division";
        },
  data() {
    return {
      form: new Form({
        divisionname: ""
      })
    };
  },

  methods: {
    addDivision() {
      this.form
        .post("/admin/createdivision")
        //console.log('ok');
        .then(({ response }) => {
          [toastr.success("Division Create Successfull")],
            [this.$router.push("/admin/divisionlist")];
        })
        .catch(function(response) {
          console.log(response);
          toastr.warning("Sorry Try Agin");
        });
    }
  }
};
</script>