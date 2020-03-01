<template>
    <!-- Horizontal Form -->
    <div class="card card-info mt-5 container">
        <div class="card-header">
            <h3 class="card-title center">Bike Sell an item or service</h3>
        </div>

               

        <!-- /.card-header -->
        <!-- form start -->
        <form role="form" class="" @submit.prevent="postbike" enctype="multipart/form-data">
            <div class="card-body">
                <input type ="hidden" v-model="form.new">      
                <div class="form-group row">
                    <label for="category"  class="col-sm-2 col-form-label" >Category *</label>
                     <div class="col-sm-10">
                       <select :class="{'is-invalid' :form.errors.has('category')}" id="category" v-model="form.category" 
                        class="form-control">
                        <option disabled value="">Select One</option>
                        <option v-for="categoryname in category" :value="categoryname.id">{{categoryname.categoryname}}
                            
                        </option>

                    </select>
                    <has-error :form="form" field="category"></has-error>
                </div> 
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

               <div class="form-group row">
                    <label for="checkbox" class="col-sm-2 col-form-label">Bike Type *</label>
                    <div class="checkbox">

                        <label class="radio-inline">
                            <input type ="radio"  id="Motorbikes" v-model="form.biketype"  value="Motorbikes">Motorbikes</label>

                        <label class="radio-inline">
                    <input type ="radio"  id="Scooter" value="scooter" v-model="form.biketype" >Scooter & E-Bikes</label>
                    </div>
                </div>
    

                 <div class="form-group row">
                    <label for="bikebrand"  class="col-sm-2 col-form-label">Brand *</label>
                <div class="col-sm-10">
                    <select  :class="{'is-invalid' :form.errors.has('bikebrand')}" id="bikebrand"  v-model="form.bikebrand" class="form-control" >
                        <option disabled value="">Select One</option>
                      <option v-for="brandrname in allbikebrand" :value="brandrname.id" >{{brandrname.bikebrand}}</option>
                     
                    </select>
                     <has-error :form="form" field="bikebrand" ></has-error>
                </div>
                  </div>   
               
               <div class="form-group row">
                    <label for="bikemodel"  class="col-sm-2 col-form-label">Model *</label>
                <div class="col-sm-10">
                    <select  :class="{'is-invalid' :form.errors.has('bikemodel')}" id="bikemodel"  v-model="form.bikemodel" class="form-control" >
                        <option disabled value="">Select One</option>
                      <option v-for="bikemodelname in bikemode" :value="bikemodelname.id" >{{bikemodelname.bikemodel}}</option>
                     
                    </select>
                     <has-error :form="form" field="bikemodel" ></has-error>
                </div>
                  </div>  
                <div class="form-group row">
                    <label for="bikeversion"  class="col-sm-2 col-form-label">Version *</label>
                <div class="col-sm-10">
                    <select  :class="{'is-invalid' :form.errors.has('bikeversion')}" id="bikeversion"  v-model="form.bikeversion" class="form-control" >
                        <option disabled value="">Select One</option>
                      <option v-for="bikeversionname in bikeversion" :value="bikeversionname.id" >{{bikeversionname.bikeversion}}</option>
                     
                    </select>
                     <has-error :form="form" field="bikeversion" ></has-error>
                </div>
                  </div> 
                   <div class="form-group row">
                    <label for="bikemodelyear"  class="col-sm-2 col-form-label">Model Year *</label>
                <div class="col-sm-10">
                    <select  :class="{'is-invalid' :form.errors.has('bikemodelyear')}" id="bikemodelyear"  v-model="form.bikemodelyear" class="form-control" >
                        <option disabled value="">Select One</option>
                      <option v-for="bikemodelyearname in modelyear" :value="bikemodelyearname.id" >{{bikemodelyearname.modelyear}}</option>
                     
                    </select>
                     <has-error :form="form" field="bikemodelyear" ></has-error>
                </div>
                  </div> 
                
                 <div class="form-group row">
                    <label for="engine_capacity" class="col-sm-2 col-form-label">Engine capacity (cc)  *</label>
                    <div class="col-sm-10">
                        <input v-model="form.engine_capacity" type="text" class="form-control"
                            :class="{ 'is-invalid': form.errors.has('engine_capacity') }" id="engine_capacity" placeholder="Capacity">
                        <has-error :form="form" field="engine_capacity"></has-error>
                    </div>

                </div>  
              <div class="form-group row">
                    <label for="checkbox" class="col-sm-2 col-form-label">Starting Method *</label>
                    <div class="checkbox">

                        <label class="radio-inline">
                            <input type="radio" name="startingmethod" id= "Auto" selected value= "auto" v-model ="form.startingmethod" >Auto</label>

                        <label class="radio-inline">
                            <input type="radio" name="startingmethod" id= "Manual" v-model ="form.startingmethod" value ="manual">Manual</label>

                             <label class="radio-inline">
                            <input type="radio" name="startingmethod" id= "Self" v-model ="form.startingmethod" value ="self">Self</label>

                             <label class="radio-inline">
                            <input type="radio" name="startingmethod" id= "Kick" v-model ="form.startingmethod" value ="kick">Kick</label>

                            <label class="radio-inline">
                            <input type="radio" name="startingmethod" id= "Both" v-model ="form.startingmethod" value ="both">Both</label>
                    </div>
                </div> 

              
                <div class="form-group row">
                    <label for="description" class="col-sm-2 col-form-label">Description *</label>
                   <div class="col-sm-10">
                       
                        <textarea v-model="form.description" class="form-control" rows="5" placeholder="Description"></textarea>
                           
                      
                    </div>
                        
                </div>
                  <has-error :form="form" field="description"></has-error>

                    <div class="form-group row">
                    <label for="price" class="col-sm-2 col-form-label">Price(Taka) *</label>
                    <div class="col-sm-5">
                        <input v-model="form.price" type="number" class="form-control"
                            :class="{ 'is-invalid': form.errors.has('price') }" id="price"
                            placeholder="Price">
                          
                        <has-error :form="form" field="price"></has-error>
                    </div>
                    
                       <label class="checkbox-inline">
                        <input type="checkbox"   v-model="form.negotiable">Negotiable
                    </label>
                     
                </div>
                <br>
                   
              
                
              
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <button type="submit" class="btn btn-info">Add Post</button>
                  <router-link to="/en/biketypepost" class="btn btn-default ">Cancel</router-link>
            </div>
            <!-- /.card-footer -->
        </form>
    </div>
</template>

<script>
import VueUploadMultipleImage from 'vue-upload-multiple-image'
    export default {
        name: 'Bike',
        data() {
            return {
                images:[],
                form: new Form({
                    new: 'new',
                    bikebrand: '',
                    category: '',
                    bikemodel: '',
                    bikemodelyear: '',
                    bikeversion: '',
                    bikeimage: '',
                    biketype: 'Motorbikes',
                    startingmethod: 'both',
                    engine_capacity: '',
                    description: '',
                    price: '',
                    negotiable: '',
                  allimage:[]
                  
                    
                }),
                allbikebrand: null,
                category: null,
                bikemode: null,
                bikeversion: null,
                modelyear: null,
                //alldivision:null,
               // allsubdivision:null,

            }
        },
  components: {
    VueUploadMultipleImage
  },
        mounted() {
                  //var token= localStorage.getItem("token");
            var user= localStorage.getItem("user");
            
              if(!user){
                
                this.$router.push("/en/login")
            }
            axios
                .get('http://127.0.0.1:8000/en/bikebrand')
                .then(response => {
                    (this.allbikebrand = response.data.bikebrand)
                    //console.log(response);

                });
            axios
                .get('http://127.0.0.1:8000/en/category')
                .then(response => {
                    (this.category = response.data.category)
                    //console.log(response);

                });
                axios
                .get('http://127.0.0.1:8000/en/bikemodel')
                .then(response => {
                    (this.bikemode = response.data.bikemodel)
                    //console.log(response);

                });
                axios
                .get('http://127.0.0.1:8000/en/bikemodelyear')
                .then(response => {
                    (this.modelyear = response.data.modelyear)
                    //console.log(response);

                });

                axios
                .get('http://127.0.0.1:8000/en/bikeversion')
                .then(response => {
                    (this.bikeversion = response.data.bikeversion)
                    console.log(response);

                });
            //      axios.get('http://127.0.0.1:8000/en/division')
            // .then(response =>{ (this.alldivision = response.data.division)
            // //console.log(response);
            
            //     });

            //     axios.get('http://127.0.0.1:8000/en/subdivisionlist')
            // .then(response =>{ (this.allsubdivision = response.data.subdivision)
            // //console.log(response);
            
            //      });
        },
 
        methods: {
            postbike() {
                if(this.form.allimage.length==0){
                     alert("please upload minimum one image");
                 }
                 else{
                  console.log(this.form);
                this.form.post("/en/bike", this.form)
                    .then(response => {
                        [toastr.success('Add Post  Successfully')], [this.$router.push({
                            name: 'BikePostList'
                        })]
                        if (response.data.token) {
                            localStorage.setItem("token", response.data.token);

                        }
                    })
                    .catch(response => {
                        console.log(response);
                        [toastr.warning("Sorry Try Again"), ]
                    });
                      }    
            },
            

    //         onDivisionChange(event) {
           
    //            axios.get('http://127.0.0.1:8000/en/subdivision/'+ event.target.value)
    //   .then(response =>{ (this.allsubdivision = response.data.subdivision)
    //    console.log(response);
       
    //       });

    //          },
             uploadImageSuccess(formData, index, fileList) {
                 if(fileList.length>6){
                   //  this.formData.index==5;
                 alert("you Can not upload More Than 5 Image");
                 }
                 
                 else{
                     
                        this.form.allimage=fileList;
                       //console.log(element);
                 
               
                 }
      
     
    },
    beforeRemove (index, done, fileList) {
      console.log('index', index, fileList)
      var r = confirm("remove image")
      if (r == true) {
        done()
      } else {
      }
    },
    editImage (formData, index, fileList) {
      console.log('edit data', formData, index, fileList)
    }
  
          
            //  [localStorage.setItem("token", response.data.token)], [this.$route.defaults.headers.common['Authorization']="Token " + localStorage.getItem("token")],
        }
    }

</script>