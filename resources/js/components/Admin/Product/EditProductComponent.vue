<template>
      <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Update  Product </h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
               <form role="form" @submit.prevent="UpdateProduct" enctype="multipart/form-data">
             
                <div class="card-body">
                  <div class="form-group">
                    <label for="title">Title *</label>
                     <input  v-model="form.title " type="text" class="form-control" :class="{ 'is-invalid': form.errors.has('title') }" v-on:keydown="Title" id="Title" placeholder="Title Name" required>
                        <has-error :form="form" field="title"></has-error>
                  </div>
                  <div class="form-row">
 
    <div class="form-group col-md-3">
      <label for="slug">Custom Slug</label>
                     <input  v-model="form.slug" type="text"  class="form-control"  :class="{ 'is-invalid': form.errors.has('slug') }"  id="slug" >
                        <has-error :form="form" field="slug"></has-error>
    </div> 
     <div class="form-group col-md-3">
      <label for="cc">CC *</label>
                 <v-select  v-model="form.cc" :options="allCC" label=cc :reduce="cc=>cc.id" required />     
    </div> 
      <div class="form-group col-md-3">
      <label for="marketstatus" class="col-form-label">Product Type *</label><br>
                     
                    <select :class="{'is-invalid' :form.errors.has('producttype')}" id="parentpagename" v-model="form.producttype" class="form-control" >
                        <option disabled value="">Select One</option>
                        <option value="old">Old</option>
                        <option selected value="New">New</option>
                        <option  value="upcoming">Upcoming</option>
                        <option  value="premium">Premium</option>
                                           
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
  
    <div class="form-group col-md-4">
      <label for="keyword">Keyword *</label>
      <input type="text" v-model="form.keyword" class="form-control" id="keyword" required>
    </div> 
     <div class="form-group col-md-4">
      <label for="regularprice">Regular Price *</label>
      <input type="number" v-model="form.regularprice" class="form-control" id="regularprice" required>
    </div> 
    <div class="form-group col-md-4">
      <label for="offerprice">Offer Price </label>
      <input type="number" v-model="form.offerprice"   class="form-control" id="offerprice">
    </div>
  </div>
   <div class="form-group d-none" id="offeruinfo">
                    <label for="offerurl">Offer Url </label>
                     <input  v-model="form.offerurl " type="text" class="form-control" :class="{ 'is-invalid': form.errors.has('offerurl') }"  id="offerurl" placeholder="Offer-Url Name">
                        <has-error :form="form" field="offerurl"></has-error>
                  </div>
 
  <div class="form-row">
    <div class="form-group col-md-2">
     <label for="displacement">Displacement(cc) *</label>
     
      <input type="number" v-model="form.displacement"   class="form-control" id="displacement" required placeholder="Number Only">
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
                   <select  :class="{'is-invalid' :form.errors.has('brand_id')}" id="brand" @change="onBrandChange"  v-model="form.brand_id" class="form-control select2" >
                        <option disabled value="">Select One</option>
                      <option v-for="brandname in allBrandname" :value="brandname.id" >{{brandname.brand}}</option>
                     
                    </select>
                     <has-error :form="form" field="brand_id" ></has-error>
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
   <input type="text" v-model="form.enginemaximumpower"  class="form-control" id="enginemaximumpower" required>
    </div> 
    <div class="form-group col-md-4">
      <label for="enginemaximumtorque">Maximum Torque *</label>
   <input type="text" v-model="form.enginemaximumtorque"    class="form-control" id="enginemaximumtorque" required>
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
      <input type="text" v-model="form.compressionratio"   class="form-control" id="compressionratio" required>
    </div>
    <div class="form-group col-md-4">
      <label for="cylinder">No of Cylinders *</label>
     <v-select  v-model="form.cylinder" :options="allCylinder" label=cylinder :reduce="cylinder=>cylinder.cylinder" required />
    </div>

<!-- Engine end -->



<!-- Transmission  start-->
 <div class="form-group col-md-4">
      <label for="transmission">Transmission Type  *</label>
      <select :class="{'is-invalid' :form.errors.has('transmission')}" id="transmission" v-model="form.transmission" class="form-control" required >
                        <option disabled value="">Select One</option>
                    <option selected value="Auto">Auto </option>
                    <option selected value="Manual">Manual </option>
                        <option  value="Both">Both</option>
                                           
                    </select>
                     <has-error :form="form" field="transmission" ></has-error>
    </div> 
    <div class="form-group col-md-4">
      <label for="gears">No of Gears * </label>
      <v-select  v-model="form.gears" :options="AllGears" label=gear :reduce="gear=>gear.gear" required />
    </div>
    <div class="form-group col-md-4">
      <label for="clutch">Clutch Type *</label>
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
      <label for="chassis">Chassis Type  *</label>
      <select :class="{'is-invalid' :form.errors.has('chassis')}" id="transmission" v-model="form.chassis" class="form-control" required >
                        <option disabled value="">Select One</option>
                    <option selected value="doble">Double Cradle </option>
                    <option selected value="single">Single Cradle </option>
                        <option  value="both">Both</option>
                                           
                    </select>
                     <has-error :form="form" field="chassis" ></has-error>
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

<!-- Breakes    start -->

 <div class="form-group col-md-4">
      <label for="frontbrake">Front Brake Type   *</label>
      <select :class="{'is-invalid' :form.errors.has('frontbrake')}" id="frontbrake" v-model="form.frontbrake" class="form-control" required >
                        <option disabled value="">Select One</option>
                    <option selected value="Auto">Auto </option>
                    <option selected value="Manual">Manual </option>
                        <option  value="Both">Both</option>
                                           
                    </select>
                     <has-error :form="form" field="frontbrake" ></has-error>
    </div> 
    <div class="form-group col-md-4">
      <label for="rearbrake">Rear Brake Type    * </label>
      <select :class="{'is-invalid' :form.errors.has('rearbrake')}" id="rearbrake" v-model="form.rearbrake" class="form-control" required >
                        <option disabled value="">Select One</option>
                    <option selected value="Auto">Auto </option>
                    <option selected value="Manual">Manual </option>
                        <option  value="Both">Both</option>
                                           
                    </select>
                     <has-error :form="form" field="rearbrake" ></has-error>
  
    </div>
    <div class="form-group col-md-4">
      <label for="frontbrakediameter">Front Brake Diameter   *</label>
         <input type="text" v-model="form.frontbrakediameter"   class="form-control" id="frontbrakediameter" required>
           <has-error :form="form" field="frontbrakediameter" ></has-error>
    </div>
 <div class="form-group col-md-4">
      <label for="rearbrakediameter">Rear Brake Diameter *</label>
      <select :class="{'is-invalid' :form.errors.has('rearbrakediameter')}" id="rearbrakediameter" v-model="form.rearbrakediameter" class="form-control" required >
                        <option disabled value="">Select One</option>
                    <option selected value="Auto">Auto </option>
                    <option selected value="Manual">Manual </option>
                        <option  value="Both">Both</option>
                                           
                    </select>
                     <has-error :form="form" field="rearbrakediameter" ></has-error>
    </div> 
    <div class="form-group col-md-4">
      <label for="abs">Anti-Lock Braking System (ABS)   * </label>
      <select :class="{'is-invalid' :form.errors.has('abs')}" id="abs" v-model="form.abs" class="form-control" required >
                        <option disabled value="">Select One</option>
                    <option selected value="yes">Yes </option>
                    <option selected value="no">No </option>                 
                    </select>
                     <has-error :form="form" field="abs" ></has-error>
  
    </div>
   


<!-- Breaks  end -->


<!-- Wheels & Tires   start -->

 <div class="form-group col-md-4">
      <label for="ftyre">Front Tire Size  *</label>
   <v-select  v-model="form.ftyre" :options="allFronttyre" label=ftyre :reduce="ftyre=>ftyre.ftyre" required />
    </div> 
    <div class="form-group col-md-4">
      <label for="rtyre">Rear Tire Size   * </label>
      <v-select  v-model="form.rtyre" :options="allReartyre" label=rtyre :reduce="rtyre=>rtyre.rtyre" required />
  
    </div>
    <div class="form-group col-md-4">
      <label for="tubeless">Tubeless Tires  *</label>
         <input type="text" v-model="form.tubeless"   class="form-control" id="tubeless" required>
           <has-error :form="form" field="tubeless" ></has-error>
    </div>


<!-- Wheels & Tires  end -->

<!-- Dimensions    start -->

 <div class="form-group col-md-4">
      <label for="overalllength">Overall Length   *</label>
      <input type="text" v-model="form.overalllength"   class="form-control" id="overalllength" required>
           <has-error :form="form" field="overalllength" ></has-error>
                    
    </div> 
    <div class="form-group col-md-4">
      <label for="overallwidth">Overall Width    * </label>
      <input type="text" v-model="form.overallwidth"   class="form-control" id="overallwidth" required>
      <has-error :form="form" field="overallwidth" ></has-error>
  
    </div>
    <div class="form-group col-md-4">
      <label for="groundclearness">Ground Clearance   *</label>
         <input type="text" v-model="form.groundclearness"   class="form-control" id="groundclearness" required>
           <has-error :form="form" field="groundclearness" ></has-error>
    </div>
 <div class="form-group col-md-4">
      <label for="stroke">Weight  *</label>
    
                       <v-select  v-model="form.weight" :options="allWeightlist" label=weight :reduce="weight=>weight.weight" required />
    </div> 
    <div class="form-group col-md-4">
      <label for="ftcapacity">Fuel Tank Capacity    * </label>
      <v-select  v-model="form.ftcapacity" :options="allFtcapacity" label=ftcapacity :reduce="ftcapacity=>ftcapacity.ftcapacity" required />
  
    </div>
    <div class="form-group col-md-4">
      <label for="wheelbase">Wheelbase  *</label>
         <input type="text" v-model="form.wheelbase"   class="form-control" id="wheelbase" required>
           <has-error :form="form" field="wheelbase" ></has-error>
    </div>


<!-- Dimensions  end -->




<!-- Electricals    start -->

 <div class="form-group col-md-4">
      <label for="battery">Battery Type   *</label>
      <select :class="{'is-invalid' :form.errors.has('battery')}" id="battery" v-model="form.battery" class="form-control" required >
                        <option disabled value="">Select One</option>
                    <option value="Auto">Maintenance Free</option>
                    <option selected value="Manual">Maintenance </option>
                        <option  value="Both">Both</option>
                                           
                    </select>
                     <has-error :form="form" field="battery" ></has-error>
    </div> 
    <div class="form-group col-md-4">
      <label for="frontsuspension">Battery Voltage    * </label>
      <v-select  v-model="form.bvoltage" :options="allBetery" label=bvoltage :reduce="bvoltage=>bvoltage.bvoltage" required />
  
    </div>
    <div class="form-group col-md-4">
      <label for="headlight">Head Light   *</label>
         <input type="text" v-model="form.headlight"   class="form-control" id="headlight" required>
           <has-error :form="form" field="headlight" ></has-error>
    </div>
 <div class="form-group col-md-4">
      <label for="taillight">Tail Light  *</label>
      <select :class="{'is-invalid' :form.errors.has('taillight')}" id="taillight" v-model="form.taillight" class="form-control" required >
                        <option disabled value="">Select One</option>
                    <option selected value="led">LED </option>
                    <option  value="Manual">Manual </option>
                        <option  value="Both">Both</option>
                                           
                    </select>
                     <has-error :form="form" field="taillight" ></has-error>
    </div> 
    <div class="form-group col-md-4">
      <label for="indicators">Indicators    * </label>
       <select :class="{'is-invalid' :form.errors.has('indicators')}" id="indicators" v-model="form.indicators" class="form-control" required >
                        <option disabled value="">Select One</option>
                    <option selected value="bulb">Bulb </option>
                    <option  value="Manual">Manual </option>
                        <option  value="Both">Both</option>
                                           
                    </select>
                     <has-error :form="form" field="indicators" ></has-error>
  
    </div>
    <div class="form-group col-md-4">
      <label for="speedometer">Speedometer  *</label>
         <select :class="{'is-invalid' :form.errors.has('speedometer')}" id="speedometer" v-model="form.speedometer" class="form-control" required >
                        <option disabled value="">Select One</option>
                    <option selected value="digital">Digital </option>
                    <option  value="analog">Analog </option>
                        <option  value="Both">Both</option>
                                           
                    </select>
                     <has-error :form="form" field="speedometer" ></has-error>
    </div>


<!-- Electricals  end -->



<!-- Features     start -->

 <div class="form-group col-md-4">
      <label for="odometer">Odometer   *</label>
     <select :class="{'is-invalid' :form.errors.has('odometer')}" id="odometer" v-model="form.odometer" class="form-control" required >
                        <option disabled value="">Select One</option>
                    <option selected value="digital">Digital </option>
                    <option  value="analog">Analog </option>
                        <option  value="Both">Both</option>
                                           
                    </select>
                     <has-error :form="form" field="odometer" ></has-error>
    </div> 
    <div class="form-group col-md-4">
      <label for="rpmmeter">RPM Meter    * </label>
      <select :class="{'is-invalid' :form.errors.has('rpmmeter')}" id="rpmmeter" v-model="form.rpmmeter" class="form-control" required >
                        <option disabled value="">Select One</option>
                    <option selected value="digital">Digital </option>
                    <option value="analog">Analog </option>
                        <option  value="Both">Both</option>
                                           
                    </select>
                     <has-error :form="form" field="rpmmeter" ></has-error>
  
    </div>
    <div class="form-group col-md-4">
      <label for="handle">Handle Type   *</label>
          <select :class="{'is-invalid' :form.errors.has('handle')}" id="seattype" v-model="form.handle" class="form-control" required >
                        <option disabled value="">Select One</option>
                    <option selected value="2-Part ">2-Part Handle </option>
                    <option value="3-Part ">3-Part Handle </option>
                                         
                    </select>
                     <has-error :form="form" field="handle" ></has-error>
    </div>
 <div class="form-group col-md-4">
      <label for="seattype">Seat Type   *</label>
      <select :class="{'is-invalid' :form.errors.has('seattype')}" id="seattype" v-model="form.seattype" class="form-control" required >
                        <option disabled value="">Select One</option>
                    <option selected value="unibody">Unibody </option>
                    <option value="singlebody">Singlebody </option>
                        <option  value="Both">Both</option>
                                           
                    </select>
                     <has-error :form="form" field="seattype" ></has-error>
    </div> 
    <div class="form-group col-md-4">
      <label for="passenger">Passenger Grab Rail    * </label>
        <select :class="{'is-invalid' :form.errors.has('passenger')}" id="passenger" v-model="form.passenger" class="form-control" required >
                        <option disabled value="">Select One</option>
                    <option selected value="yes">Yes </option>
                    <option value="no">No </option>
                        <option  value="Both">Both</option>
                                           
                    </select>
                     <has-error :form="form" field="passenger" ></has-error>
  
    </div>
    <div class="form-group col-md-4">
      <label for="engineks">Engine Kill Switch   *</label>
       <select :class="{'is-invalid' :form.errors.has('engineks')}" id="engineks" v-model="form.engineks" class="form-control" required >
                        <option disabled value="">Select One</option>
                    <option selected value="yes">Yes </option>
                    <option value="no">No </option>
                        <option  value="Both">Both</option>
                                           
                    </select>
                     <has-error :form="form" field="engineks" ></has-error>
    </div>

 <div class="form-group col-md-4">
      <label for="embedurl">Embed Url  *</label>
        <input type="url" v-model="form.embedurl"   class="form-control" id="embedurl" required>
           <has-error :form="form" field="embedurl" ></has-error>
       
    </div>
<!-- Features   end -->


                <div class="form-group col-md-8">
              <label for="metadescription">Short Description * [Shortdescription may not be greater than 160 characters]</label>
                    <textarea v-model="form.shortdescription" class="form-control" rows="8" placeholder="Short Description" :class="{ 'is-invalid': form.errors.has('shortdescription') }"></textarea>
                  <has-error :form="form" field="shortdescription"></has-error>
            </div>
      <div class="form-group col-md-4">
                     <label for="exampleInputFile">Feature Image *</label>
                         <div class="custom-file">
                        <input  type="file" :class="{'is-invalid' :form.errors.has('featureimage')}" name="featureimage"  class="custom-file-input"   @change="changephoto($event)">
                           
                        <label class="custom-file-label" for="exampleInputFile">Update Image</label>
                        
                        <has-error :form="form" field="featureimage" ></has-error>
                      </div>
                     
                   <img :src="updateImage()" height="150px" width="100%">
                    </div>

  </div> <!--row-->

  
               
                 </div><!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Update</button>
                   <router-link to="/admin/productlist" class="btn btn-default ">Cancel</router-link>
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
            document.title = "Update  Product";
                    },
  data() {
    
    return {
      form: new Form({
        title: "",
        slug: "",
        cc: "",
        producttype: "new",
        marketstatus: "",
        keyword: "",
        regularprice: "",
        offerprice: "",
        offerurl: "",
        displacement: "",
        mileage: "",
        rm: "",
        rpm: "",
        torquenm: "",
        torquerpm: "",
        brand_id: "",
        brandcategory_id: "",
        engine: "",
        enginemaximumpower: "",
        enginemaximumtorque: "",
        bore: "",
        stroke: "",
         compressionratio: "",
         gears: "",
         clutch: "",
          transmission: "",
        cylinder: "",
       
        chassis: "",
        frontsuspension: "",
        rearsuspension: "",
        frontbrake: "",
        rearbrake: "",
        frontbrakediameter: "",
        rearbrakediameter: "",
        abs: "",
        ftyre: "",
        rtyre: "",
        tubeless: "",
        overalllength: "",
        overallwidth: "",
        groundclearness:"",
        weight: "",
        ftcapacity: "",
        wheelbase: "",
        battery: "",
         bvoltage: "",
        headlight: "",
        taillight: "",
        indicators: "",
        speedometer: "",
        odometer: "",
        rpmmeter: "",
        handle: "",
        seattype: "",
        passenger: "",
        engineks:"",
        embedurl:"",
        shortdescription: "",
        featureimage: "",
         images:[],
   
      }),
      
      categoryVal:[],
      allBrandname:null,
      Brand:[],
      allBrandCategory:[],
       allEnginelist:[],
       allBore:[],
       allStoke:[],
       allCylinder:[],
       AllGears:[],
       allCC:[],
       allFronttyre:[],
       allReartyre:[],
       allWeightlist:[],
       allBetery:[],
       allFtcapacity:[],
       allEnginelist:[],
        images:[],
      
    }
    
  },
        mounted() {
          var token = localStorage.getItem("token");
       var admin =localStorage.getItem("admin");
      if(admin){
               this.form.language = JSON.parse(localStorage.getItem("admin")).language;
     
      }
      else{
         this.$router.push("/admin/login");
      };

          axios.get('category')
                .then(response => {
                    response.data.category.forEach(element => {
                      this.categoryVal.push(element.categoryname)
                       //console.log(element.categoryname);
                    });
                    
                    
                });
                     axios.get(`admin/editproduct/${this.$route.params.id}`)
          .then((response)=>{
              this.form.fill(response.data.productinfo)
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
       this.allCC = response.data.cc;
       this.allFronttyre = response.data.fronttyre;
       this.allReartyre = response.data.reartyre;
       this.allWeightlist = response.data.weight;
       this.allBetery = response.data.bettery;
       this.allFtcapacity = response.data.ftcapacity;
       this.allBrandCategory = response.data.brandcategory;
      //console.log(this.allEnginelist);
    });
    
        },
  methods: {
    UpdateProduct() {
        this.form.put('/admin/updateproduct/'+`${this.$route.params.id}`)
         //this.form.put('/admin/updateblogpost/'+`${this.$route.params.id}`)
        //console.log('ok');
        .then(({ response }) => {
          [toastr.success("Product Update Successfull")],
            [this.$router.push("/admin/productlist")];
        })
        .catch(function(response) {
         toastr.warning("Sorry Try Agin");
        });
    },

      onBrandChange(event) {
           axios.post('/admin/brandcategory/'+ event.target.value)
      .then(response =>{
         (this.allBrandCategory = response.data.brandcategory)
      // console.log(response);
       
          });
             },
             uploadImageSuccess(formData, index, fileList) {
            this.form.images=fileList;
          },
           beforeRemove (index, done, fileList) {
     // console.log('index', index, fileList)
      var r = confirm("remove image")
      if (r == true) {
        done()
      } else {
      }
    },
     Title(event){
this.form.slug=this.form.title;
    },
          changephoto(event){
      let file=event.target.files[0];
      let reader=new FileReader();
      reader.onload=event=>{
        this.form.featureimage=event.target.result
      },
      reader.readAsDataURL(file);
    },
       updateImage(){
                let img = this.form.featureimage;
                if(img.length>100){
                    return  this.form.featureimage
                }else{
                    return `/images/productimages/${this.form.featureimage}`
                }

            },
  }
};
</script>
 <style>
 .vs__search, .vs__search:focus{
line-height: 1.7;
 }
 </style>