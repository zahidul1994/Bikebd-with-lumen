<template>
  <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Update Company</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
               <form role="form" enctype="multipart/form-data" @submit.prevent="UpdateCompany" >
          
                <div class="card-body">
                  
                  <div class="form-group">
                    <label for="shortname">Update Short Name *</label>
                     <input  v-model="form.shortname" type="text" class="form-control" :class="{ 'is-invalid': form.errors.has('shortname') }" id="bikemodel" placeholder="Company Short Name">
                        <has-error :form="form" field="shortname"></has-error>
                  </div> 
                  <div class="form-group">
                    <label for="fullname">Update Full Name</label>
                     <input  v-model="form.fullname" type="text" class="form-control" :class="{ 'is-invalid': form.errors.has('fullname') }" id="bikemodel" placeholder="Company Full Name">
                        <has-error :form="form" field="fullname"></has-error>
                  </div>
                   <div class="form-group">
                     <label for="exampleInputFile">Update Profile Image *</label>
                      <div class="custom-file">
                        <input type="file" :class="{'is-invalid' :form.errors.has('profileimage')}" id="profileimage"  class="custom-file-input"   @change="changeprofileimage($event)">
                           
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                        <has-error :form="form" field="profileimage" ></has-error>
                      </div>
                       <img :src="updateProfilePhoto()" width="80px">
                     </div> 
                     <div class="form-group">
                     <label for="exampleInputFile">Update Cover Image </label>
                      <div class="custom-file">
                        <input type="file" :class="{'is-invalid' :form.errors.has('coverimage')}" id="coverimage"  class="custom-file-input"   @change="changecoverimage($event)">
                           
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                        <has-error :form="form" field="coverimage" ></has-error>
                      </div>
                     
                      <img :src="updateCoverPhoto()" height="300px" width="100%">
                    </div>
                   <div class="form-group">
                    <label for="description">Update Description * </label>
                          <textarea v-model="form.description" class="form-control" rows="5" placeholder="Short Description" :class="{ 'is-invalid': form.errors.has('description') }"></textarea>
                        <has-error :form="form" field="description"></has-error>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Update</button>
                   <router-link to="/admin/companylist" class="btn btn-default ">Cancel</router-link>
               </div>
            </form>
                </div>
                
            <!-- /.card -->
</template>

<script>
    export default {
      name:'EditBrand',
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
       created () {
            document.title = "Edit Compay";
        },
      mounted(){
          axios.get(`/admin/editcompany/${this.$route.params.id}`)
          .then((response)=>{
              this.form.fill(response.data.companyinfo)
          })
      },
          
    methods: {
      UpdateCompany(){
        this.form.patch('/admin/updatecompany/'+`${this.$route.params.id}`)
        //console.log('ok');
        .then(({ response }) => { [toastr.success('Company Update Successfully')],[this.$router.push('/admin/companylist')]})
        .catch(function (response) {toastr.warning("Sorry Try Agin"); });
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
    },
     updateProfilePhoto(){
                let img = this.form.profileimage;
                if(img.length>100){
                    return  this.form.profileimage
                }else{
                    return `/images/companyimage/${this.form.profileimage}`
                }

            },
       updateCoverPhoto(){
                let img = this.form.coverimage;
                if(img.length>100){
                    return  this.form.coverimage
                }else{
                    return `/images/companyimage/${this.form.coverimage}`
                }

            },
            
       
    }
  }
</script>