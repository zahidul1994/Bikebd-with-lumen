<template>
      <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Create Body Type</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
               <form role="form" @submit.prevent="addBodytype">
             
                <div class="card-body">
                  <div class="form-group">
                    <label for="bodytype">Body Type</label>
                     <input  v-model="form.bodytype" type="text" class="form-control" :class="{ 'is-invalid': form.errors.has('bodytype') }" id="bodytype" placeholder="Body Type Name">
                        <has-error :form="form" field="bodytype"></has-error>
                  </div>
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                   <router-link to="/admin/bodytypelist" class="btn btn-default ">Cancle</router-link>
               </div>
            </form>
                </div>
                
            <!-- /.card -->


       
            
</template>

<script>
export default {
  name: "Createbodytype",
   created () {
            document.title = "Create Body Type";
        },
  data() {
    return {
      form: new Form({
        bodytype: ""
      })
    };
  },

  methods: {
    addBodytype() {
      this.form
        .post("/admin/createbodytype")
        //console.log('ok');
        .then(({ response }) => {
          [toastr.success("Body Type Create Successfully")],
            [this.$router.push("/admin/bodytypelist")];
        })
        .catch(function(response) {
          console.log(response);
          toastr.warning("Sorry Try Agin");
        });
    }
  }
};
</script>