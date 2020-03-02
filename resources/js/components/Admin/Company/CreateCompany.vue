<template>
      <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Create New Company</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
               <form role="form" enctype="multipart/form-data" @submit.prevent="addCompany" >
          
                <div class="card-body">
                  
                  <div class="form-group">
                    <label for="shortname">Company Short Name *</label>
                     <input  v-model="form.shortname" type="text" class="form-control" :class="{ 'is-invalid': form.errors.has('shortname') }" id="bikemodel" placeholder="Company Short Name">
                        <has-error :form="form" field="shortname"></has-error>
                  </div> 
                  <div class="form-group">
                    <label for="fullname">Company Full Name</label>
                     <input  v-model="form.fullname" type="text" class="form-control" :class="{ 'is-invalid': form.errors.has('fullname') }" id="bikemodel" placeholder="Company Full Name">
                        <has-error :form="form" field="fullname"></has-error>
                  </div>
                   <div class="form-group">
                     <label for="exampleInputFile"> Profile Image *</label>
                      <div class="custom-file">
                        <input type="file" :class="{'is-invalid' :form.errors.has('profileimage')}" id="profileimage"  class="custom-file-input"   @change="changeprofileimage($event)">
                           
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                        <has-error :form="form" field="profileimage" ></has-error>
                      </div>
                      
                     <img :src="form.profileimage" alt="" width="80px">
                    </div> 
                     <div class="form-group">
                     <label for="exampleInputFile"> Cover Image </label>
                      <div class="custom-file">
                        <input type="file" :class="{'is-invalid' :form.errors.has('coverimage')}" id="coverimage"  class="custom-file-input"   @change="changecoverimage($event)">
                           
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                        <has-error :form="form" field="coverimage" ></has-error>
                      </div>
                     
                      <img :src="form.coverimage" alt="" height="300px" width="100%">
                    </div>
                   <div class="form-group">
                    <label for="description">Short Description * </label>
                          <textarea v-model="form.description" class="form-control" rows="5" placeholder="Short Description" :class="{ 'is-invalid': form.errors.has('description') }"></textarea>
                        <has-error :form="form" field="description"></has-error>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                   <router-link to="/admin/companylist" class="btn btn-default ">Cancel</router-link>
               </div>
            </form>
                </div>
                
            <!-- /.card -->


       
            
</template>

<script>
export default {
  name: "modelYearCreate",
   created () {
            document.title = "Create  Company";
        },
  data() {
    return {
      form: new Form({
        shortname: "",
        fullname: "",
        description: "",
        profileimage: "",
        coverimage: "",
      })
    };
  },

  methods: {
    addCompany() {
      this.form
        .post("/admin/createcompany")
        //console.log('ok');
        .then(({ response }) => {
          [toastr.success("Company Create Successfully")],
            [this.$router.push("/admin/companylist")];
        })
        .catch(function(response) {
          console.log(response);
          toastr.warning("Sorry Try Agin");
        });
    },
    
      changeprofileimage(event) {
      let file = event.target.files[0];
      let reader = new FileReader();
      (reader.onload = event => {
        this.form.profileimage = event.target.result;
      }),
        reader.readAsDataURL(file);
    },
      changecoverimage(event) {
      let file = event.target.files[0];
      let reader = new FileReader();
      (reader.onload = event => {
        this.form.coverimage = event.target.result;
      }),
        reader.readAsDataURL(file);
    }
  }
};
</script>