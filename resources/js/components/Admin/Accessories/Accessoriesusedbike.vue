



<template>
    <!-- Horizontal Form -->
    <div class="card card-info mt-5 container bg-warning">
        <div class="card-header">
            <h3 class="card-title center">Accessories New Bike</h3>
        </div>

               

        <!-- /.card-header -->
        <!-- form start -->
        <form role="form" class="" @submit.prevent="accnewbikecreate" enctype="multipart/form-data">
            <div class="card-body">
                <input type ="hidden" v-model="form.new">

                    <div class="form-group row">
                    <label for="category"  class="col-sm-2 col-form-label" >Category *</label>
                     <div class="col-sm-10">
                       <select :class="{'is-invalid' :form.errors.has('category')}" id="category" v-model="form.category" 
                        class="form-control">
                        <option disabled value="">Select One</option>
                        <option v-for="categoryname in category" :value="categoryname._id">{{categoryname.categoryname}}
                            
                        </option>

                    </select>
                    <has-error :form="form" field="category"></has-error>
                </div> 
                </div> 
                  <div class="form-group row">
                    <label for="accessoriesname" class="col-sm-2 col-form-label">Accessories</label>
                    <div class="col-sm-10">
                        <input v-model="form.accessoriesname" type="text" class="form-control"
                            :class="{ 'is-invalid': form.errors.has('accessoriesname') }" id="accessoriesname" placeholder="Accessoriesname">
                        <has-error :form="form" field="accessoriesname"></has-error>
                    </div>

                </div>      
              

                 <div class="form-group row">
                    <label for="madeby" class="col-sm-2 col-form-label">Made by</label>
                    <div class="col-sm-10">
                        <input v-model="form.madeby" type="text" class="form-control"
                            :class="{ 'is-invalid': form.errors.has('madeby') }" id="madeby" placeholder="Madeby">
                        <has-error :form="form" field="madeby"></has-error>
                    </div>

                </div>

                  <div class="form-group row">
                    <label for="color" class="col-sm-2 col-form-label">Color</label>
                    <div class="col-sm-10">
                        <input v-model="form.color" type="text" class="form-control"
                            :class="{ 'is-invalid': form.errors.has('color') }" id="color" placeholder="Color">
                        <has-error :form="form" field="color"></has-error>
                    </div>

                </div>
                   <div class="form-group row">
                    <label for="size" class="col-sm-2 col-form-label">Size</label>
                    <div class="col-sm-10">
                        <input v-model="form.size" type="text" class="form-control"
                            :class="{ 'is-invalid': form.errors.has('size') }" id="size" placeholder="Size">
                        <has-error :form="form" field="size"></has-error>
                    </div>

                </div>

                 <div class="form-group row">
                    <label for="waight" class="col-sm-2 col-form-label">Waight</label>
                    <div class="col-sm-10">
                        <input v-model="form.waight" type="text" class="form-control"
                            :class="{ 'is-invalid': form.errors.has('waight') }" id="waight" placeholder="waight">
                        <has-error :form="form" field="waight"></has-error>
                    </div>

                </div>

                <div class="form-group row">
                    <label for="material" class="col-sm-2 col-form-label">Material</label>
                    <div class="col-sm-10">
                        <input v-model="form.material" type="text" class="form-control"
                            :class="{ 'is-invalid': form.errors.has('material') }" id="material" placeholder="Material">
                        <has-error :form="form" field="material"></has-error>
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
                    <label for="bikebrand"  class="col-sm-2 col-form-label">Brand *</label>
                <div class="col-sm-10">
                    <select  :class="{'is-invalid' :form.errors.has('bikebrand')}" id="bikebrand"  v-model="form.bikebrand" class="form-control" >
                        <option disabled value="">Select One</option>
                      <option v-for="brandrname in allbikebrand" :value="brandrname._id" >{{brandrname.bikebrand}}</option>
                     
                    </select>
                     <has-error :form="form" field="bikebrand" ></has-error>
                </div>
                  </div> 
                  
                   
               
               <div class="form-group row">
                    <label for="bikemodel"  class="col-sm-2 col-form-label">Model *</label>
                <div class="col-sm-10">
                    <select  :class="{'is-invalid' :form.errors.has('bikemodel')}" id="bikemodel"  v-model="form.bikemodel" class="form-control" >
                        <option disabled value="">Select One</option>
                      <option v-for="bikemodelname in bikemode" :value="bikemodelname._id" >{{bikemodelname.bikemodel}}</option>
                     
                    </select>
                     <has-error :form="form" field="bikemodel" ></has-error>
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
             return  {
                    images:[],
                    form: new Form({
                    accessoriesname: '',
                    bikebrand: '',
                    bikemodel: '',
                    bikeimage: '',
                    madeby: '',
                    category: '',
                    color: '',
                    waight: '',
                    material: '',
                    description: '',
                    price: '',
                    negotiable: '',
                    allimage:[]
                  
                    
                }),
                allbikebrand: null,
                category: null,
                bikemode: null,
              
            }
        },
  components: {
    VueUploadMultipleImage
  },
        mounted() {
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
                 
        },
 
        methods: {
            accnewbikecreate() {
                  console.log(this.form);
                this.form.post("/en/accnewbikecreate", this.form)
                    .then(response => {
                        [toastr.success('Add Post  Successfully Tipu Sultan')], [this.$router.push({
                            name:'AccnewBikePostList'
                        })]
                        if (response.data.token) {
                            localStorage.setItem("token", response.data.token);

                        }
                    })
                    .catch(response => {
                        console.log(response);
                        [toastr.warning("Sorry Try Again"), ]
                    });
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