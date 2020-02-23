<template>
    <!-- Horizontal Form -->
    <div class="card card-info mt-5 container">
        <div class="card-header">
            <h3 class="card-title center">Edit Accessories New Car </h3>
        </div>

               

        <!-- /.card-header -->
       
        <!-- form start -->
        <form role="form" class="" @submit.prevent="Editaccnewbike" enctype="multipart/form-data">
            <div class="card-body">
                <input type ="hidden" v-model="form.new">

                      <div class="form-group row">
                    <label for="category"  class="col-sm-2 col-form-label" >Category *</label>
                     <div class="col-sm-10">
                       <select :class="{'is-invalid' :form.errors.has('category')}" id="category" v-model="form.category_id" 
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
                     <div class="col-sm-10 ">
                                  <vue-upload-multiple-image
                                    @upload-success="uploadImageSuccess"
                                    @before-remove="beforeRemove"
                                    @edit-image="editImage"
                                    :data-images="images"
                                    idUpload="myIdUpload"
                                    editUpload="myIdEdit"
                                    ></vue-upload-multiple-image>
                                    
                                     <span  v-for="image in form.accessoriesimge" class="img-prnt">
                                         
                            <img  :src="'/images/accpostimage/'+ image.image"  width=200 >
                            
                            <button class="btn btn-danger" @click="deleteimage(image._id)">
                                x
                            </button>
                            </span>
                      </div>
                    
                    </div>

                   <div class="form-group row">
                    <label for="bikebrand"  class="col-sm-2 col-form-label">Accessories Type *</label>
                <div class="col-sm-10">
                    <select  :class="{'is-invalid' :form.errors.has('accessoriestypename')}" id="accessoriestypename"  v-model="form.accessoriestype_id" class="form-control" >
                        <option disabled value="">Select One</option>
                      <option v-for="accessoriestypename in accessoriestypelist" :value="accessoriestypename._id">{{accessoriestypename.accessoriesname}}</option>
                     
                    </select>
                     <has-error :form="form" field="accessoriestypename" ></has-error>
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
                  <router-link to="/en/accessorieslist" class="btn btn-default ">Cancle</router-link>
            </div>
            <!-- /.card-footer -->
        </form>
    </div>
</template>

<script>
import VueUploadMultipleImage from 'vue-upload-multiple-image'
    export default {
        name: 'EditAccnewbike',
        data() {
            return {
                images:[],
                form: new Form({
                    category_id: '',
                    accessoriesname: '',
                    madeby: '', 
                    accessoriestype_id: '',
                    color: '',
                    size: '',
                    waight: '',
                    material: '',
                    description: '',
                    price: '',
                    negotiable: '',
                    accessoriesimge:[],
                    accessoriesimge1:[]
                  
                    
                }),
                accessoriestypelist: null,
                category: null,
              
            

            }
        },
 
        mounted() {
             axios.get(`/en/editaccnewbike/${this.$route.params.id}`)
          .then((response)=>{
              this.form.fill(response.data.accnewbikeinfo)
          });
            axios.get('http://127.0.0.1:8000/en/accessoreistypename')
                .then(response => {
                    (this.accessoriestypelist = response.data.accessoriestype)
                    //console.log(response);

                });
            axios.get('http://127.0.0.1:8000/en/category')
                .then(response => {
                    (this.category = response.data.category)
                    //console.log(response);

                });
              
            
        },
     components: {
    VueUploadMultipleImage
  },
        methods: {
            Editaccnewbike() {
                // if(this.form.accnewbikeimage.length==0){
                //      alert("please upload minimum one image");
                //  }
                //  else if(this.form.accnewbikeimage.length>4){
                //      alert("please upload maximum five image");
                //  }
                //  else{
                  console.log(this.form);
                  
                    this.form.put('/en/updateaccnewbike/'+`${this.$route.params.id}`)
                    .then(response => {
                        [toastr.success('Accessories New Post Update Successfully')], [this.$router.push({
                            name: 'AccnewBikePostList'
                        })]
                       
                    })
                    .catch(response => {
                        console.log(response);
                        [toastr.warning("Sorry Try Again Tipu Sultan"), ]
                    });
            
         // }
            },
           
             uploadImageSuccess(formData, index, fileList) {
                 if(fileList.length>6){
                   console.log( fileList)
                 alert("you Can not upload More Than 5 Image");
                 }
                 else{
                     
                        this.form.accessoriesimge=fileList;
                        this.form.accessoriesimge1=fileList;
                       //console.log(element);
                 
               
                 }
      
     
    },
    beforeRemove (index, done, fileList) {
       var r = confirm("remove image")
      if (r == true) {
         
         done()
        
      } 
      else {
      }
    },
    editImage (formData, index, fileList) {
      console.log('edit data', formData, index, fileList)
    },
    deleteimage(id){
         if (confirm("Do you really want to delete it?")) {
         axios.post('/en/deletaccnewbikepostimage/'+id)
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