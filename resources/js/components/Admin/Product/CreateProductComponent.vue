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
                    <div class="form-group row">
                     <label for="exampleInputFile" class="col-sm-2 col-form-label"> Image *</label>
                     <div class="col-sm-10">
                                  <vue-upload-multiple-image
                                    @upload-success="uploadImageSuccess"
                                    @before-remove="beforeRemove"
                                    @edit-image="editImage"
                                    :data-images="images"
                                    idUpload="myIdUpload"
                                    editUpload="myIdEdit"
                                    ></vue-upload-multiple-image>
                      
                      </div>
                      
                     
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
    <!-- Engine  -->
       <div class="form-group col-md-4">
      <label for="engine">Engine Type *</label>
      <v-select v-model="form.engine" :options="allEnginelist"  label=enginetype  :reduce="enginetype => enginetype.enginetype" required />
</div> 
    <div class="form-group col-md-4">
      <label for="enginemaximumpower">Maximum Power  *</label>
   <input type="number" v-model="form.enginemaximumpower" step="0.01"   class="form-control" id="enginemaximumpower" required>
    </div> 
    <div class="form-group col-md-4">
      <label for="enginemaximumtorque">Maximum Torque *</label>
   <input type="number" v-model="form.enginemaximumtorque" step="0.01"   class="form-control" id="enginemaximumtorque" required>
    </div>
    <div class="form-group col-md-4">
      <label for="bore">Bore * </label>
   <v-select  v-model="form.bore" :options="allBore" label=bore :reduce="bore=>bore.bore" required />
    </div> 
    <div class="form-group col-md-4">
      <label for="stroke">Stroke *</label>
      <v-select  v-model="form.stroke" :options="allStoke" label=stroke :reduce="stroke=>stroke.stroke" required />
    </div> 
    <div class="form-group col-md-4">
      <label for="compressionratio">Compression Ratio * </label>
      <input type="text" v-model="form.offerprice"   class="form-control" id="compressionratio" required>
    </div>
    <div class="form-group col-md-4">
      <label for="offerprice">No of Cylinders *</label>
     <v-select  v-model="form.cylinder" :options="allCylinder" label=cylinder :reduce="cylinder=>cylinder.cylinder" required />
    </div>

<!-- Engine end -->



<!-- Transmission  start-->
 <div class="form-group col-md-4">
      <label for="stroke">Transmission Type  *</label>
      <select :class="{'is-invalid' :form.errors.has('transmission')}" id="transmission" v-model="form.transmission" class="form-control" required >
                        <option disabled value="">Select One</option>
                    <option selected value="Auto">Auto </option>
                    <option selected value="Manual">Manual </option>
                        <option  value="Both">Both</option>
                                           
                    </select>
                     <has-error :form="form" field="transmission" ></has-error>
    </div> 
    <div class="form-group col-md-4">
      <label for="compressionratio">No of Gears * </label>
      <v-select  v-model="form.gears" :options="AllGears" label=gear :reduce="gear=>gear.gear" required />
    </div>
    <div class="form-group col-md-4">
      <label for="offerprice">Clutch Type *</label>
      <select :class="{'is-invalid' :form.errors.has('clutch')}" id="clutch" v-model="form.clutch" class="form-control" required >
                        <option disabled value="">Select One</option>
                    <option selected value="Auto">Auto </option>
                    <option selected value="Manual">Manual </option>
                        <option  value="Both">Both</option>
                                           
                    </select>
                     <has-error :form="form" field="clutch" ></has-error>
    </div>
<!-- Transmission end -->

<!-- Chassis & Suspension  start -->

 <div class="form-group col-md-4">
      <label for="stroke">Chassis Type  *</label>
      <select :class="{'is-invalid' :form.errors.has('transmission')}" id="transmission" v-model="form.transmission" class="form-control" required >
                        <option disabled value="">Select One</option>
                    <option selected value="Auto">Auto </option>
                    <option selected value="Manual">Manual </option>
                        <option  value="Both">Both</option>
                                           
                    </select>
                     <has-error :form="form" field="transmission" ></has-error>
    </div> 
    <div class="form-group col-md-4">
      <label for="frontsuspension">Front Suspension  * </label>
      <input type="text" v-model="form.frontsuspension"   class="form-control" id="frontsuspension" required>
      <has-error :form="form" field="frontsuspension" ></has-error>
  
    </div>
    <div class="form-group col-md-4">
      <label for="rearsuspension">Rear Suspension *</label>
         <input type="text" v-model="form.rearsuspension"   class="form-control" id="rearsuspension" required>
           <has-error :form="form" field="rearsuspension" ></has-error>
    </div>


<!-- Chassis & Suspension  end -->



<!-- Wheels & Tires   start -->

 <div class="form-group col-md-4">
      <label for="stroke">Front Tire Size  *</label>
      <select :class="{'is-invalid' :form.errors.has('transmission')}" id="transmission" v-model="form.transmission" class="form-control" required >
                        <option disabled value="">Select One</option>
                    <option selected value="Auto">Auto </option>
                    <option selected value="Manual">Manual </option>
                        <option  value="Both">Both</option>
                                           
                    </select>
                     <has-error :form="form" field="transmission" ></has-error>
    </div> 
    <div class="form-group col-md-4">
      <label for="frontsuspension">Rear Tire Size   * </label>
      <input type="text" v-model="form.frontsuspension"   class="form-control" id="frontsuspension" required>
      <has-error :form="form" field="frontsuspension" ></has-error>
  
    </div>
    <div class="form-group col-md-4">
      <label for="rearsuspension">Tubeless Tires  *</label>
         <input type="text" v-model="form.rearsuspension"   class="form-control" id="rearsuspension" required>
           <has-error :form="form" field="rearsuspension" ></has-error>
    </div>


<!-- Wheels & Tires  end -->

<!-- Dimensions    start -->

 <div class="form-group col-md-4">
      <label for="stroke">Overall Length   *</label>
      <select :class="{'is-invalid' :form.errors.has('transmission')}" id="transmission" v-model="form.transmission" class="form-control" required >
                        <option disabled value="">Select One</option>
                    <option selected value="Auto">Auto </option>
                    <option selected value="Manual">Manual </option>
                        <option  value="Both">Both</option>
                                           
                    </select>
                     <has-error :form="form" field="transmission" ></has-error>
    </div> 
    <div class="form-group col-md-4">
      <label for="frontsuspension">Overall Width    * </label>
      <input type="text" v-model="form.frontsuspension"   class="form-control" id="frontsuspension" required>
      <has-error :form="form" field="frontsuspension" ></has-error>
  
    </div>
    <div class="form-group col-md-4">
      <label for="rearsuspension">Ground Clearance   *</label>
         <input type="text" v-model="form.rearsuspension"   class="form-control" id="rearsuspension" required>
           <has-error :form="form" field="rearsuspension" ></has-error>
    </div>
 <div class="form-group col-md-4">
      <label for="stroke">Weight  *</label>
      <select :class="{'is-invalid' :form.errors.has('transmission')}" id="transmission" v-model="form.transmission" class="form-control" required >
                        <option disabled value="">Select One</option>
                    <option selected value="Auto">Auto </option>
                    <option selected value="Manual">Manual </option>
                        <option  value="Both">Both</option>
                                           
                    </select>
                     <has-error :form="form" field="transmission" ></has-error>
    </div> 
    <div class="form-group col-md-4">
      <label for="frontsuspension">Fuel Tank Capacity    * </label>
      <input type="text" v-model="form.frontsuspension"   class="form-control" id="frontsuspension" required>
      <has-error :form="form" field="frontsuspension" ></has-error>
  
    </div>
    <div class="form-group col-md-4">
      <label for="rearsuspension">Wheelbase  *</label>
         <input type="text" v-model="form.rearsuspension"   class="form-control" id="rearsuspension" required>
           <has-error :form="form" field="rearsuspension" ></has-error>
    </div>


<!-- Dimensions  end -->




<!-- Electricals    start -->

 <div class="form-group col-md-4">
      <label for="stroke">Battery Type   *</label>
      <select :class="{'is-invalid' :form.errors.has('transmission')}" id="transmission" v-model="form.transmission" class="form-control" required >
                        <option disabled value="">Select One</option>
                    <option selected value="Auto">Auto </option>
                    <option selected value="Manual">Manual </option>
                        <option  value="Both">Both</option>
                                           
                    </select>
                     <has-error :form="form" field="transmission" ></has-error>
    </div> 
    <div class="form-group col-md-4">
      <label for="frontsuspension">Battery Voltage    * </label>
      <input type="text" v-model="form.frontsuspension"   class="form-control" id="frontsuspension" required>
      <has-error :form="form" field="frontsuspension" ></has-error>
  
    </div>
    <div class="form-group col-md-4">
      <label for="rearsuspension">Head Light   *</label>
         <input type="text" v-model="form.rearsuspension"   class="form-control" id="rearsuspension" required>
           <has-error :form="form" field="rearsuspension" ></has-error>
    </div>
 <div class="form-group col-md-4">
      <label for="stroke">Tail Light  *</label>
      <select :class="{'is-invalid' :form.errors.has('transmission')}" id="transmission" v-model="form.transmission" class="form-control" required >
                        <option disabled value="">Select One</option>
                    <option selected value="Auto">Auto </option>
                    <option selected value="Manual">Manual </option>
                        <option  value="Both">Both</option>
                                           
                    </select>
                     <has-error :form="form" field="transmission" ></has-error>
    </div> 
    <div class="form-group col-md-4">
      <label for="frontsuspension">Indicators    * </label>
      <input type="text" v-model="form.frontsuspension"   class="form-control" id="frontsuspension" required>
      <has-error :form="form" field="frontsuspension" ></has-error>
  
    </div>
    <div class="form-group col-md-4">
      <label for="rearsuspension">Speedometer  *</label>
         <input type="text" v-model="form.rearsuspension"   class="form-control" id="rearsuspension" required>
           <has-error :form="form" field="rearsuspension" ></has-error>
    </div>


<!-- Electricals  end -->



<!-- Features     start -->

 <div class="form-group col-md-4">
      <label for="stroke">Odometer   *</label>
      <select :class="{'is-invalid' :form.errors.has('transmission')}" id="transmission" v-model="form.transmission" class="form-control" required >
                        <option disabled value="">Select One</option>
                    <option selected value="Auto">Auto </option>
                    <option selected value="Manual">Manual </option>
                        <option  value="Both">Both</option>
                                           
                    </select>
                     <has-error :form="form" field="transmission" ></has-error>
    </div> 
    <div class="form-group col-md-4">
      <label for="frontsuspension">RPM Meter    * </label>
      <input type="text" v-model="form.frontsuspension"   class="form-control" id="frontsuspension" required>
      <has-error :form="form" field="frontsuspension" ></has-error>
  
    </div>
    <div class="form-group col-md-4">
      <label for="rearsuspension">Handle Type   *</label>
         <input type="text" v-model="form.rearsuspension"   class="form-control" id="rearsuspension" required>
           <has-error :form="form" field="rearsuspension" ></has-error>
    </div>
 <div class="form-group col-md-4">
      <label for="stroke">Seat Type   *</label>
      <select :class="{'is-invalid' :form.errors.has('transmission')}" id="transmission" v-model="form.transmission" class="form-control" required >
                        <option disabled value="">Select One</option>
                    <option selected value="Auto">Auto </option>
                    <option selected value="Manual">Manual </option>
                        <option  value="Both">Both</option>
                                           
                    </select>
                     <has-error :form="form" field="transmission" ></has-error>
    </div> 
    <div class="form-group col-md-4">
      <label for="frontsuspension">Passenger Grab Rail    * </label>
      <input type="text" v-model="form.frontsuspension"   class="form-control" id="frontsuspension" required>
      <has-error :form="form" field="frontsuspension" ></has-error>
  
    </div>
    <div class="form-group col-md-4">
      <label for="rearsuspension">Engine Kill Switch   *</label>
         <input type="text" v-model="form.rearsuspension"   class="form-control" id="rearsuspension" required>
           <has-error :form="form" field="rearsuspension" ></has-error>
    </div>


<!-- Features   end -->


                <div class="form-group col-md-12">
              <label for="metadescription">Short Description * [Shortdescription may not be greater than 160 characters]</label>
                    <textarea v-model="form.shortdescription" class="form-control" rows="5" placeholder="Short Description" :class="{ 'is-invalid': form.errors.has('shortdescription') }"></textarea>
                  <has-error :form="form" field="shortdescription"></has-error>
            </div>

  </div> <!--row-->

  
               
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


import VueUploadMultipleImage from 'vue-upload-multiple-image'
export default {
 
  name: "CreateBlogpost",
        components: {
    VueUploadMultipleImage
  },
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
        bore: "",
        stroke: "",
        cylinder: "",
        compressionratio: "",
        transmission: "",
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
       images:[],
      categoryVal:[],
      allBrandname:null,
      Brand:[],
      allBrandCategory:[],
       allEnginelist:[],
       allBore:[],
       allStoke:[],
       allCylinder:[],
       AllGears:[],
       allEnginelist:[],
       allEnginelist:[],
       allEnginelist:[],
       allEnginelist:[],
       allEnginelist:[],
       
      
    }
    
  },
    mounted() {
     
      //offer url show 
$('#offerprice').keyup(function () {
 
    if ($('#offerprice').val().length>0) {
    
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
    axios.post('admin/alldropdown')
    .then(response => {
       this.allEnginelist = response.data.engine;
       this.allBore = response.data.bore;
       this.allStoke = response.data.stroke;
       this.allCylinder = response.data.cylinder;
       this.AllGears = response.data.gear;
       this.allEnginelist = response.data.engine;
       this.allEnginelist = response.data.engine;
       this.allEnginelist = response.data.engine;
       this.allEnginelist = response.data.engine;
      //console.log(this.allEnginelist);
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
     
        
   onBrandChange(event) {
           axios.post('/admin/brandcategory/'+ event.target.value)
      .then(response =>{
         (this.allBrandCategory = response.data.brandcategory)
      // console.log(response);
       
          });
             },


 uploadImageSuccess(formData, index, fileList) {
            this.form.allimage=fileList;
          },
    beforeRemove (index, done, fileList) {
     // console.log('index', index, fileList)
      var r = confirm("remove image")
      if (r == true) {
        done()
      } else {
      }
    },
    editImage (formData, index, fileList) {
      //console.log('edit data', formData, index, fileList)
    }
   

    
        


  }
};
</script>
 