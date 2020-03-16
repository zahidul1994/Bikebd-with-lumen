<template>
      <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Create New Distributor</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
               <form role="form" enctype="multipart/form-data" @submit.prevent="addDistributor" >
          
                <div class="card-body">
                  
                  <div class="form-group">
                    <label for="distributor">Distributor *</label>
                     <input  v-model="form.distributor" type="text" class="form-control" :class="{ 'is-invalid': form.errors.has('distributor') }" id="distributor" placeholder="Distributor Name">
                        <has-error :form="form" field="distributor"></has-error>
                  </div> 
                  <div class="form-group">
                    <label for="address">Address</label>
                     <input  v-model="form.address" type="text" class="form-control" :class="{ 'is-invalid': form.errors.has('address') }" id="address" placeholder="Address Name">
                        <has-error :form="form" field="address"></has-error>
                  </div> 
                  <div class="form-group">
                    <label for="phone">Phone</label>
                     <input  v-model="form.phone" type="text" class="form-control" :class="{ 'is-invalid': form.errors.has('phone') }" id="phone" placeholder="Phone">
                        <has-error :form="form" field="phone"></has-error>
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
                   <router-link to="/admin/distributorlist" class="btn btn-default ">Cancel</router-link>
               </div>
            </form>
                </div>
                
            <!-- /.card -->


       
            
</template>

<script>
export default {
  name: "Distributor",
   created () {
            document.title = "Create  Distributor";
        },
  data() {
    return {
      form: new Form({
        distributor: "",
        fullname: "",
        description: "",
        profileimage: "",
        coverimage: "",
      })
    };
  },

  methods: {
    addDistributor() {
      this.form
        .post("/admin/createdistributor")
        //console.log('ok');
        .then(({ response }) => {
          [toastr.success("Distributor Create Successfully")],
            [this.$router.push("/admin/distributorlist")];
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