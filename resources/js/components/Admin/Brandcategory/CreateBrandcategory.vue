<template>
      <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Create New Brand Category</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
               <form role="form" enctype="multipart/form-data" @submit.prevent="addBrandCategory" >
          
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
                  <button type="submit" class="btn btn-primary">Submit</button>
                   <router-link to="/admin/brandcategorylist" class="btn btn-default ">Cancel</router-link>
               </div>
            </form>
                </div>
                
            <!-- /.card -->


       
            
</template>

<script>
export default {
  name: "CreateBrand",
   created () {
            document.title = "Create Brand Category";
        },
  data() {
    return {
      form: new Form({
        company_id: "",
        brandcategory: "",
        }),
        allBrandname:null,
    };
  },
mounted(){
      axios.get('admin/companybrandname')
    .then(response => {
       this.allBrandname = response.data
     // console.log(response.data);
    });
},
  methods: {
    addBrandCategory() {
      this.form
        .post("/admin/createbrandcategory")
        //console.log('ok');
        .then(({ response }) => {
          [toastr.success("Brand Category Create Successfully")],
            [this.$router.push("/admin/brandcategorylist")];
        })
        .catch(function(response) {
          console.log(response);
          toastr.warning("Sorry Try Agin");
        });
    },

  }
};
</script>