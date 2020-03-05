<template>
      <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Create Product </h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
               <form role="form" @submit.prevent="addBlogPost" enctype="multipart/form-data">
             
                <div class="card-body">
                  <div class="form-group">
                    <label for="title">Title *</label>
                     <input  v-model="form.title " type="text" class="form-control" :class="{ 'is-invalid': form.errors.has('title') }" v-on:keydown="Title" id="Title" placeholder="Title Name">
                        <has-error :form="form" field="title"></has-error>
                  </div>
                  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="slug">Custom Slug</label>
                     <input  v-model="form.slug" type="text"  class="form-control"  :class="{ 'is-invalid': form.errors.has('slug') }"  id="slug" >
                        <has-error :form="form" field="slug"></has-error>
    </div> 
      <div class="form-group col-md-3">
      <label for="marketstatus" class="col-form-label">Product Type *</label><br>
                     
                    <select :class="{'is-invalid' :form.errors.has('producttype')}" id="parentpagename" v-model="form.producttype" class="form-control" >
                        <option disabled value="">Select One</option>
                        <option value="old">Old</option>
                        <option selected value="New">New</option>
                        <option  value="upcoming">Upcoming</option>
                                           
                    </select>
                     <has-error :form="form" field="producttype" ></has-error>
               
    </div>
    <div class="form-group col-md-3">
      <label for="marketstatus" class="col-form-label">Available In Bangladesh *</label><br>
                    <div class="checkbox">

                        <label class="radio-inline">
                            <input type ="radio"  id="marketstatus" v-model="form.marketstatus"  value="Yes">  Yes</label> 

                        
                    <input type ="radio"  id="marketstatus" value="no" v-model="form.marketstatus">  <label class="radio-inline">No</label>
                    </div>
    </div>
  
    <div class="form-group col-md-6">
      <label for="regularprice">Regular Price *</label>
      <input type="number" v-model="form.regularprice" class="form-control" id="regularprice" required>
    </div> 
    <div class="form-group col-md-6">
      <label for="offerprice">Offer Price </label>
      <input type="number" v-model="form.offerprice"   class="form-control" id="offerprice">
    </div>
  </div>
   <div class="form-group d-none" id="offeruinfo">
                    <label for="title">Offer Url </label>
                     <input  v-model="form.offerurl " type="text" class="form-control" :class="{ 'is-invalid': form.errors.has('offerurl') }"  id="offerurl" placeholder="Offer-Url Name">
                        <has-error :form="form" field="offerurl"></has-error>
                  </div>
 
  <div class="form-row">
    <div class="form-group col-md-2">
     <label for="displacement">Displacement(cc) *</label>
     
      <input type="number" v-model="form.displacement"   class="form-control" id="offerprice" required placeholder="Number Only">
   </div>
    <div class="form-group col-md-2">
     <label for="mileage">Mileage(kmpl) *</label>
      <input type="number" v-model="form.mileage"   class="form-control" id="mileage" required placeholder="Number Only">
   </div>
   <div class="form-group col-md-4 card">
      <label for="mileage" class="text-center">Maximum Power *</label>
      <div class="row">
<div class="col-md-6">
<input type="number" v-model="form.rm" class="form-control" id="rm" required placeholder="RM"> 
    </div>
<div class="col-md-6">
      
  <input type="number" v-model="form.rpm" id="rm" class="form-control" required placeholder="RPM"> 
  </div>
    </div>
    </div>
    <div class="form-group col-md-4 card">
      <label for="mileage" class="text-center">Maximum Torque *</label>
     <div class="row">
<div class="col-md-6">
<input type="number" v-model="form.torquenm" class="form-control" id="torquenm" required placeholder="NM"> 
    </div>
<div class="col-md-6">
      
  <input type="number" v-model="form.torquerpm" id="torquerpm" class="form-control" required placeholder="RPM"> 
  </div>
    </div>
      
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="company_id">Brand Name *</label>
                   <select  :class="{'is-invalid' :form.errors.has('company_id')}" id="brand" @change="onBrandChange"  v-model="form.company_id" class="form-control select2" >
                        <option disabled value="">Select One</option>
                      <option v-for="brandname in allBrandname" :value="brandname.id" >{{brandname.brand}}</option>
                     
                    </select>
                     <has-error :form="form" field="company_id" ></has-error>
    </div> 
    <div class="form-group col-md-4">
     
    <label for="brandcategory_id">Brand Category *</label>
      <select  :class="{'is-invalid' :form.errors.has('brandcategory_id')}" id="brand"  v-model="form.brandcategory_id" class="form-control" >
          <option disabled value="">Select One</option>
        <option v-for="brancate in allBrandCategory" :value="brancate.id" >{{brancate.brandcategory}}</option>
        
      </select>
        <has-error :form="form" field="brandcategory_id" ></has-error>

    </div>
     <div class="form-group col-md-4">
     
    <label for="brandcategory_id">Brand Category *</label>
      <select  :class="{'is-invalid' :form.errors.has('brandcategory_id')}" id="brand"  v-model="form.brandcategory_id" class="form-control select2" >
          <option disabled value="">Select One</option>
        <option v-for="brancate in allBrandCategory" :value="brancate.id" >{{brancate.brandcategory}}</option>
        
      </select>
        <has-error :form="form" field="brandcategory_id" ></has-error>

    </div>
    <div class="form-group col-md-4">
      <label for="regularprice">Engine Type </label>
      <input type="number" v-model="form.regularprice" class="form-control" id="regularprice" required>
    </div> 
    <div class="form-group col-md-4">
      <label for="offerprice">Maximum Power  </label>
      <input type="number" v-model="form.offerprice"   class="form-control" id="offerprice">
    </div>
    <div class="form-group col-md-4">
      <label for="offerprice">Maximum Torque </label>
      <input type="number" v-model="form.offerprice"   class="form-control" id="offerprice">
    </div> 
    <div class="form-group col-md-4">
      <label for="regularprice">Bore </label>
      <input type="number" v-model="form.regularprice" class="form-control" id="regularprice" required>
    </div> 
    <div class="form-group col-md-4">
      <label for="offerprice">Stroke </label>
      <input type="number" v-model="form.offerprice"   class="form-control" id="offerprice">
    </div>
    <div class="form-group col-md-4">
      <label for="offerprice">Compression Ratio </label>
      <input type="number" v-model="form.offerprice"   class="form-control" id="offerprice">
    </div>
  </div>

  
               
                 </div><!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                   <router-link to="/admin/blogpost" class="btn btn-default ">Cancel</router-link>
               </div>
            </form>
                </div>
                
            <!-- /.card -->


       
            
</template>

<script>

import { VueEditor } from "vue2-editor";

export default {
   components: {
    VueEditor
  },
  name: "CreateBlogpost",
   created () {
            document.title = "Create New Product";
        },
  data() {
    return {
      form: new Form({
        title: "",
        slug: "",
        marketstatus: "",
        producttype: "new",
        regularprice: "",
        offerprice: "",
        offerurl: "",
        displacement: "",
        mileage: "",
        rm: "",
        torquenm: "",
        torquerpm: "",
        company_id: "",
        brandcategory_id: "",
        engine: "",
        enginemaximumpower: "",
        enginemaximumtorque: "",
        stroke: "",
        compressionratio: "",
        gears: "",
        clutch: "",
        chassis: "",
        frontsuspension: "",
        rearsuspension: "",
        frontbrake: "",
        rearbrake: "",
        frontbrakediameter: "",
        rearbrakediameter: "",
        abs: "",
        fronttire: "",
        reartire: "",
        overalllength: "",
        overallwidth: "",
        weight: "",
        fueltankcapacity: "",
        wheelbase: "",
        voltage: "",
        battery: "",
        headlight: "",
        taillight: "",
        indicators: "",
        speedometer: "",
        odometer: "",
        rpmmeter: "",
        handle: "",
        passenger: "",
        videoourl: "",
        handle: "",
        handle: "",
        category:[],
        description: "",
        postimage: "",
        language:'',
        keyword: "",
       metadescription: "",
        shortdescription: "",
      }),
      categoryVal:[],
      allBrandname:null,
      Brand:[],
      allBrandCategory:[],
      
      
    }
    
  },
    mounted() {
     
      //offer url show 
$('#offerprice').keyup(function () {
 
    if ($('#offerprice').val().length>1) {
     console.log($('#offerprice').val());
       $('#offeruinfo').removeClass('d-none');
    } else {
        
         $('#offeruinfo').addClass('d-hide');
    }
});
axios.get('admin/companybrandname')
    .then(response => {
       this.allBrandname = response.data
     // console.log(response.data);
    });

var token = localStorage.getItem("token");
       var admin =localStorage.getItem("admin");
      if(admin){
               this.form.language = JSON.parse(localStorage.getItem("admin")).language;
     
      }
      else{
         this.$router.push("/admin/login");
      };

   
    },
  methods: {
    addBlogPost() {
      this.form
        .post("admin/createblogpost")
        //console.log('ok');
        .then(({ response }) => {
          [toastr.success("Blogpost Create Successfull")],
            [this.$router.push("/admin/blogpost")];
        })
        .catch(function(response) {
            toastr.warning("Sorry Try Agin");
        });
    },
    Title(event){
this.form.slug=this.form.title;
    },
      changephoto(event){
      let file=event.target.files[0];
      let reader=new FileReader();
      reader.onload=event=>{
        this.form.postimage=event.target.result
      },
      reader.readAsDataURL(file);
    },
        
   onBrandChange(event) {
           axios.post('/admin/brandcategory/'+ event.target.value)
      .then(response =>{
         (this.allBrandCategory = response.data.brandcategory)
      // console.log(response);
       
          });
             },
  }
};
</script>
 