<template>
    <!-- Horizontal Form -->
    <div class="card card-info mt-5 container">
        <div class="card-header">
            <h3 class="card-title center">New Bike Edit </h3>
        </div>

               

        <!-- /.card-header -->
        <!-- form start -->
        <form role="form" class="" @submit.prevent="Editpostbike" enctype="multipart/form-data">
            <div class="card-body">
                      
                <div class="form-group row">
                    <label for="category"  class="col-sm-2 col-form-label" >Category *</label>
                     <div class="col-sm-10">
                       <select :class="{'is-invalid' :form.errors.has('categoryid')}" id="category" v-model="form.categoryid" 
                        class="form-control">
                        <option disabled value="">Select One</option>
                        <option v-for="categoryname in category" :value="categoryname.id">{{categoryname.categoryname}}
                            
                        </option>

                    </select>
                    <has-error :form="form" field="categoryid"></has-error>
                </div> 
                </div> 
                
              <div class="form-group row">
                     <label for="exampleInputFile" class="col-sm-2 col-form-label"> Image *</label> 
                     <div class="col-sm-10 ">
                                  <vue-upload-multiple-image
                                    @upload-success="uploadImageSuccess"
                                    @before-remove="beforeRemove"
                                    @edit-image="editImage"
                                    :data-images="images"
                                    idUpload="myIdUpload"
                                    editUpload="myIdEdit"
                                    ></vue-upload-multiple-image>
                                    
                                     <span  v-for="image in form.bikeimage" class="img-prnt">
                                         
                            <img  :src="'/images/bikepostimage/'+ image.image"  width=200 >
                            
                            <button class="btn btn-danger" @click="deleteimage(image.id)">
                                x
                            </button>
                            </span>
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
                    <select  :class="{'is-invalid' :form.errors.has('bikebrandid')}" id="bikebrand"  v-model="form.bikebrandid" class="form-control" >
                        <option disabled value="">Select One</option>
                      <option v-for="brandrname in allbikebrand" :value="brandrname.id" >{{brandrname.bikebrand}}</option>
                     
                    </select>
                     <has-error :form="form" field="bikebrandid" ></has-error>
                </div>
                  </div>   
               
               <div class="form-group row">
                    <label for="bikemodel"  class="col-sm-2 col-form-label">Model *</label>
                <div class="col-sm-10">
                    <select  :class="{'is-invalid' :form.errors.has('bikemodelid')}" id="bikemodel"  v-model="form.bikemodelid" class="form-control" >
                        <option disabled value="">Select One</option>
                      <option v-for="bikemodelname in bikemode" :value="bikemodelname.id" >{{bikemodelname.bikemodel}}</option>
                     
                    </select>
                     <has-error :form="form" field="bikemodelid" ></has-error>
                </div>
                  </div>  
                <div class="form-group row">
                    <label for="bikeversion"  class="col-sm-2 col-form-label">Version *</label>
                <div class="col-sm-10">
                    <select  :class="{'is-invalid' :form.errors.has('bikeversionid')}" id="bikeversion"  v-model="form.bikeversionid" class="form-control" >
                        <option disabled value="">Select One</option>
                      <option v-for="bikeversionname in bikeversion" :value="bikeversionname.id" >{{bikeversionname.bikeversion}}</option>
                     
                    </select>
                     <has-error :form="form" field="bikeversionid" ></has-error>
                </div>
                  </div> 
                   <div class="form-group row">
                    <label for="bikemodelyear"  class="col-sm-2 col-form-label">Model Year *</label>
                <div class="col-sm-10">
                    <select  :class="{'is-invalid' :form.errors.has('bikemodelyearid')}" id="bikemodelyear"  v-model="form.bikemodelyearid" class="form-control" >
                        <option disabled value="">Select One</option>
                      <option v-for="bikemodelyearname in modelyear" :value="bikemodelyearname.id" >{{bikemodelyearname.modelyear}}</option>
                     
                    </select>
                     <has-error :form="form" field="bikemodelyearid" ></has-error>
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
                           
                        <has-error :form="form" field="description"></has-error>
                    </div>

                </div>
                 

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
                <button type="submit" class="btn btn-info">Update Post</button>
                  <router-link to="/en/bikepostlist" class="btn btn-default ">Cancle</router-link>
            </div>
            <!-- /.card-footer -->
        </form>
    </div>
</template>

<script>
import VueUploadMultipleImage from 'vue-upload-multiple-image'
    export default {
        name: 'EditBike',
        created(){
            document.title="Edit Bike Post"
        },
        data() {
            return {
                images:[],
                form: new Form({
                    bikebrandid: '',
                    categoryid: '',
                    bikemodelid: '', 
                    bikemodelyearid: '',
                    bikeversionid: '',
                    biketype: '',
                    startingmethod: '',
                    engine_capacity: '',
                    description: '',
                    price: '',
                    negotiable: '',
                  bikeimage:[],
                  bikeimage1:[]
                  
                    
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
 
        mounted() {
                 var token= localStorage.getItem("token");
            var user= localStorage.getItem("user");
            
            if(token && !user){
                
                this.$router.push("/en/login")
            }
             axios.get(`/en/editbike/${this.$route.params.id}`)
          .then((response)=>{
              this.form.fill(response.data.bikeinfo)
          });
            axios.get('http://127.0.0.1:8000/en/bikebrand')
                .then(response => {
                    (this.allbikebrand = response.data.bikebrand)
                    //console.log(response);

                });
            axios.get('http://127.0.0.1:8000/en/category')
                .then(response => {
                    (this.category = response.data.category)
                    //console.log(response);

                });
                axios.get('http://127.0.0.1:8000/en/bikemodel')
                .then(response => {
                    (this.bikemode = response.data.bikemodel)
                    //console.log(response);

                });
                axios.get('http://127.0.0.1:8000/en/bikemodelyear')
                .then(response => {
                    (this.modelyear = response.data.modelyear)
                    //console.log(response);

                });

                axios.get('http://127.0.0.1:8000/en/bikeversion')
                .then(response => {
                    (this.bikeversion = response.data.bikeversion)
                    //console.log(response);

                });
            
        },
     components: {
    VueUploadMultipleImage
  },
        methods: {
            Editpostbike() {
                if(this.form.bikeimage.length==0){
                     alert("please upload minimum one image");
                 }
                 else if(this.form.bikeimage.length>4){
                     alert("please upload maximum five image");
                 }
                 else{
                  console.log(this.form);
                  
                    this.form.put('/en/updatebike/'+`${this.$route.params.id}`)
                    .then(response => {
                        [toastr.success('Bike Post Update Successfully')], [this.$router.push({
                            name: 'BikePostList'
                        })]
                       
                    })
                    .catch(response => {
                        console.log(response);
                        [toastr.warning("Sorry Try Again"), ]
                    });
            }
            },
                  


             uploadImageSuccess(formData, index, fileList) {
                 if(fileList.length>6){
                   console.log( fileList)
                 alert("you Can not upload More Than 5 Image");
                 }
                 else{
                     
                        this.form.bikeimage=fileList;
                        this.form.bikeimage1=fileList;
                       //console.log(element);
                 
               
                 }
      
     
    },
    beforeRemove (index, done, fileList) {
       var r = confirm("remove image")
      if (r == true) {
         
         done()
        
      } else {
      }
    },
    editImage (formData, index, fileList) {
      console.log('edit data', formData, index, fileList)
    },
    deleteimage(id){
         if (confirm("Do you really want to delete it?")) {
         axios.post('/en/deletebikepostimage/'+id)
          .then(({ response = true }) => {
          [toastr.warning("Bike Image Delete Successfully", " Image")][this.$router.go(0)];
        
        });
        }
    
    }
  
          
           
        }
    }

</script>
<style>
span.img-prnt {
    position: relative;
}

.img-prnt button {
    position: absolute;
    top: -87px;
    right: 0px;
}
</style>