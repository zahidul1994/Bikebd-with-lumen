<template>
  <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Update Brand Category</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
               <form role="form" enctype="multipart/form-data" @submit.prevent="UpdateBrandcategory" >
          
                    <div class="card-body">
                  
                  <div class="form-group">
                    <label for="brand">Select Brand *</label>
                
                    <select  :class="{'is-invalid' :form.errors.has('company_id')}" id="brand"  v-model="form.company_id" class="form-control" >
                        <option disabled value="">Select One</option>
                      <option v-for="brandname in allBrandname" :value="brandname.id" >{{brandname.brand}}</option>
                     
                    </select>
                     <has-error :form="form" field="company_id" ></has-error>
                
                  </div>
                  <div class="form-group">
                    <label for="fullname">Brand Category Name</label>
                     <input  v-model="form.brandcategory" type="text" class="form-control" :class="{ 'is-invalid': form.errors.has('brandcategory') }" id="brandcategory" placeholder="Brand-Category Name">
                        <has-error :form="form" field="brandcategory"></has-error>
                  </div>
 
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Update</button>
                   <router-link to="/admin/brandcategorylist" class="btn btn-default ">Cancel</router-link>
               </div>
            </form>
                </div>
                
            <!-- /.card -->
</template>

<script>
    export default {
      name:'EditBrandCategory',
        data() {
    return {
      form: new Form({
        company_id: "",
        brandcategory: "",
      }),
       allBrandname:null,
    };
  },
       created () {
            document.title = "Edit Brand Category";
        },
      mounted(){
          axios.get(`/admin/editbrandcategory/${this.$route.params.id}`)
          .then((response)=>{
              this.form.fill(response.data.brandcategory)
          }),
           axios.get('admin/companybrandname')
    .then(response => {
       this.allBrandname = response.data
     // console.log(response.data);
    });
          
      },
          
    methods: {
      UpdateBrandcategory(){
        this.form.patch('/admin/updatebrandcategory/'+`${this.$route.params.id}`)
        //console.log('ok');
        .then(({ response }) => { [toastr.success('Update Brand Category Successfully')],[this.$router.push('/admin/brandcategorylist')]})
        .catch(function (response) {toastr.warning("Sorry Try Agin"); });
      },
     
    }
  }
</script>