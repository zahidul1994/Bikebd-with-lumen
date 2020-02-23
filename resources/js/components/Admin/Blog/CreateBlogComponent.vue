<template>
      <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Create Blog </h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
               <form role="form" @submit.prevent="addBlogPost" enctype="multipart/form-data">
             
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
                     <input  v-model="form.title " type="text" class="form-control" :class="{ 'is-invalid': form.errors.has('title') }" v-on:keydown="Title" id="Title" placeholder="Title Name">
                        <has-error :form="form" field="title"></has-error>
                  </div>
                    <div class="form-group">
                    <label for="slug">Custom Slug</label>
                     <input  v-model="form.slug" type="text"  class="form-control"  :class="{ 'is-invalid': form.errors.has('slug') }"  id="slug" >
                        <has-error :form="form" field="slug"></has-error>
                  </div>
                   <div class="form-group">
                    <label for="url">Copy Url(Slug)</label>
                     <input  v-model="form.url" type="text"  class="form-control"  :class="{ 'is-invalid': form.errors.has('url') }"  id="url" >
                        <has-error :form="form" field="url"></has-error>
                  </div>
                   <div class="form-group">
                    <label for="metadescription">Meta Description</label>
                          <textarea v-model="form.metadescription" class="form-control" rows="5" placeholder="Meta Description"></textarea>
                        <has-error :form="form" field="metadescription"></has-error>
                  </div>
                  <div class="form-group">
                    <label for="category" >Category *</label>
                     <v-select multiple v-model="form.category" :options="categoryVal"  id="category" :class="{'is-invalid' :form.errors.has('category')}"/>
                    <div class="col-sm-10">
                   
                      <has-error :form="form" field="category"></has-error>
                </div>
                  </div>
                   <div class="form-group">
                    <label for="tag" >Tag *</label>
                    <v-select taggable multiple push-tags v-model="form.tag"  id="tag" :class="{'is-invalid' :form.errors.has('tag')}"/>

                    <div class="col-sm-10">
                   
                      <has-error :form="form" field="tag"></has-error>
                </div>
                  </div>
                 <div class="form-group">
                     <label for="exampleInputFile">Feature Image *</label>
                      <div class="custom-file">
                        <input type="file" :class="{'is-invalid' :form.errors.has('postimage')}" id="photo"  class="custom-file-input"   @change="changephoto($event)">
                           
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                        <has-error :form="form" field="postimage" ></has-error>
                      </div>
                      
                     <img :src="form.postimage" alt="" height="300px" width="100%">
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
                  <button type="submit" class="btn btn-primary">Submit</button>
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
            document.title = "Create New Blog";
        },
  data() {
    return {
      form: new Form({
        title: "",
        category:[],
        description: "",
        postimage: "",
        language: "",
        tag: "",
        slug: "",
        url: "",
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
             
        },
  methods: {
    addBlogPost() {
      this.form
        .post("/admin/createblogpost")
        //console.log('ok');
        .then(({ response }) => {
          [toastr.success("Blogpost Create Successfull")],
            [this.$router.push("/admin/blogpost")];
        })
        .catch(function(response) {
          console.log(response);
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
    }
  }
};
</script>