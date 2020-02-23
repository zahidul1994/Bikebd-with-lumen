<template>
      <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Update Blog </h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
               <form role="form" @submit.prevent="UpdateBlogPost" enctype="multipart/form-data">
             
                <div class="card-body">
                   <div class="form-group">
                    <label for="language">Language *</label>
                    <select  :class="{'is-invalid' :form.errors.has('language')}" id="bikeversion"  v-model="form.language" class="form-control" >
                       <option disabled value="">Select One</option>
                        <option selected value="en">English</option>
                        <option  value="bn">Bangla</option>
                     
                    </select>
                     <has-error :form="form" field="language" ></has-error>
                </div>
                  <div class="form-group">
                    <label for="title">Title *</label>
                     <input  v-model="form.title " type="text" class="form-control" :class="{ 'is-invalid': form.errors.has('title') }" id="division" placeholder="title Name">
                        <has-error :form="form" field="title"></has-error>
                  </div>
                     <div class="form-group">
                    <label for="metadescription">Meta Description</label>
                          <textarea v-model="form.metadescription" class="form-control" rows="5" placeholder="Meta Description"></textarea>
                        <has-error :form="form" field="metadescription"></has-error>
                  </div>
                  <div class="form-group">
                    <label for="category" >Category *</label>
                     <!-- <span  v-for="category in form.blogcategorylist" class="img-prnt">
                                         
                           <li style="list-style:none">{{category.categorylist}}</li>
                            
                            <button class="" @click="deleteCategory(category.id)" style="top:2px;">
                                x
                            </button>
                            </span> -->
                            
                            
                      <v-select multiple v-model="form.category" :options="categoryVal"  id="category" :class="{'is-invalid' :form.errors.has('category')}"/>
                    <div class="col-sm-10">
                   
                      <has-error :form="form" field="category"></has-error>
                </div>
                  </div>
                  <!-- <div class="col-sm-10">
                    <select  :class="{'is-invalid' :form.errors.has('category')}" id="bikebrand" multiple  v-model="form.category" class="form-control" >
                        <option disabled value="">Select One</option>
                      <option v-for="brandrname in form.blogcategorylist" :value="brandrname.id" >{{brandrname.categorylist}}</option>
                     
                    </select>
                     <has-error :form="form" field="bikebrand_id" ></has-error>
                </div> -->


                   <!-- <div class="form-group">
                    <label for="tag" >Tag *</label>
                    
                    <v-select taggable multiple push-tags v-model="form.tag"  id="tag" :class="{'is-invalid' :form.errors.has('tag')}"/>

                    <div class="col-sm-10">
                   
                      <has-error :form="form" field="tag"></has-error>
                </div>
                  </div> -->
                 <div class="form-group">
                     <label for="exampleInputFile">Feature Image *</label>
                         <div class="custom-file">
                        <input  type="file" :class="{'is-invalid' :form.errors.has('postimage')}" name="image"  class="custom-file-input"   @change="changephoto($event)">
                           
                        <label class="custom-file-label" for="exampleInputFile">Update Image</label>
                        
                        <has-error :form="form" field="postimage" ></has-error>
                      </div>
                      <hr>
                   <img :src="updateImage()" height="300px" width="100%">
                    </div>
                    <div class="form-group">
                     <label for="exampleInputFile">Description *</label>
                  <vue-editor v-model="form.description" :class="{'is-invalid' :form.errors.has('description')}" aria-required=""></vue-editor>
                   <div class="col-sm-10">
                   
                      <has-error :form="form" field="description"></has-error>
                </div>
                </div>
               
                 </div><!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Update</button>
                   <router-link to="/admin/blogpost" class="btn btn-default ">Cancle</router-link>
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
            document.title = "Update  Blog";
                    },
  data() {
    return {
      form: new Form({
        title: "",
        category:[],
        blogcategorylist:[],
        description: "",
        postimage: "",
        language: "",
        tag: "",
        metadescription: "",
      }),
      categoryVal:[],
    }
    
  },
        mounted() {
          axios.get('http://127.0.0.1:8000/category')
                .then(response => {
                    response.data.category.forEach(element => {
                      this.categoryVal.push(element.categoryname)
                       //console.log(element.categoryname);
                    });
                    
                    
                });
                     axios.get(`/admin/editblogpost/${this.$route.params.id}`)
          .then((response)=>{
              this.form.fill(response.data.blogpost)
          }); 
                  
             
        },
  methods: {
    UpdateBlogPost() {
      
        this.form.put('/admin/updateblogpost/'+`${this.$route.params.id}`)
        //console.log('ok');
        .then(({ response }) => {
          [toastr.success("Blogpost Update Successfull")],
            [this.$router.push("/admin/blogpost")];
        })
        .catch(function(response) {
          console.log(response);
          toastr.warning("Sorry Try Agin");
        });
    },
       changephoto(event){
      let file=event.target.files[0];
      let reader=new FileReader();
      reader.onload=event=>{
        this.form.postimage=event.target.result
      },
      reader.readAsDataURL(file);
    },
       updateImage(){
                let img = this.form.postimage;
                if(img.length>100){
                    return  this.form.postimage
                }else{
                    return `/images/blogpost/${this.form.postimage}`
                }

            },
                deleteCategory(id){
                 
         if (confirm("Do you really want to delete it?")) {
         axios.post('/admin/deletecategorylist/'+id)
          .then(({ response = true }) => {
          toastr.warning("Category  Delete Successfully", " Category"),
          axios.get(`/admin/editblogpost/${this.$route.params.id}`)
         this.form.fill(response.data.blogpost)
          });
        }
    
    }
  }
};
</script>
<style>
span.img-prnt {
    position: relative;
}

.img-prnt button {
    position: absolute;
    top: 9px;
    right: 0px;
}
</style>