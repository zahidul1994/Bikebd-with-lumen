<template>
      <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Create Blog Page</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
               <form role="form" @submit.prevent="addBlogPage" enctype="multipart/form-data">
             
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
                    <label for="parentpage">Page Name *</label>
                     <input  v-model="form.parentpage " type="text" class="form-control" :class="{ 'is-invalid': form.errors.has('parentpage') }" id="parentpage" placeholder="Page Name">
                        <has-error :form="form" field="parentpage"></has-error>
                  </div>
                  <div class="form-group">
                    <label for="title">Title *</label>
                     <input  v-model="form.pagetitle " type="text" class="form-control" :class="{ 'is-invalid': form.errors.has('pagetitle') }" id="title" placeholder="Page Title Name">
                        <has-error :form="form" field="pagetitle"></has-error>
                  </div>

                   <div class="form-group">
                    <label for="title">Meta Description*</label>
                    <textarea v-model="form.pagemetadescription" class="form-control" rows="5" placeholder="Meta Description"></textarea>
                        <has-error :form="form" field="pagemetadescription"></has-error>
                  </div>

                 
                  <div class="form-group">
                    <label for="parentpagename">Select Parent Page *</label>
                    <select :class="{'is-invalid' :form.errors.has('parentpagename')}" id="parentpagename" v-model="form.parentpagename" class="form-control" >
                        <option disabled value="">Select One</option>
                      <option v-for="parentpagename in allparentpage" :value="parentpagename.id" >{{parentpagename.parentpage}}</option>
                     
                    </select>
                     <has-error :form="form" field="parentpagename" ></has-error>
                  </div>
                   <!-- <div class="form-group">
                    <label for="tag" >Tag *</label>
                    <v-select taggable multiple push-tags v-model="form.blogpagetag"  id="pagetag" :class="{'is-invalid' :form.errors.has('pagetag')}"/>

                    <div class="col-sm-10">
                   
                      <has-error :form="form" field="pagetag"></has-error>
                </div>
                  </div> -->
                <div class="form-group">
                     <label for="exampleInputFile">Feature Image *</label>
                      <div class="custom-file">
                        <input type="file" :class="{'is-invalid' :form.errors.has('pageimage')}" id="photo"  class="custom-file-input"   @change="changephoto($event)">
                           
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                        <has-error :form="form" field="pageimage" ></has-error>
                      </div>
                      
                     <img :src="form.pageimage" alt="" height="300px" width="100%">
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
                   <router-link to="/admin/blogpage" class="btn btn-default ">Cancle</router-link>
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
  name: "CreateBlogpage",
   created () {
            document.title = "Create New Blog";
        },
  data() {
    return {
      form: new Form({
        parentpage: "",
        parentpagename: "",
        pagetitle: "",
        category:[],
        description: "",
        pageimage: "",
        language: "",
        pagemetadescription: "",
        allparentpage: "",
      }),
      categoryVal:[],
      allparentpage:[],
    }
    
  },
        mounted() {
           
            
                axios.get('http://127.0.0.1:8000/category')
                .then(response => {
                    response.data.category.forEach(element => {
                      this.categoryVal.push(element.categoryname)
                       //console.log(element.categoryname);
                    });

                      axios.get('http://127.0.0.1:8000/admin/parentpage')
                     .then(response => {
                    (this.allparentpage = response.data.parentpageinfo)
                    //alert(5);
                    //console.log(response);

                });
                    
                    
                });
             
        },
  methods: {
    addBlogPage() {
      this.form
        .post("/admin/createblogpage")
        //console.log('ok');
        .then(({ response }) => {
          [toastr.success("Blog Page Create Successfull Tipu Sultan")],
            [this.$router.push("/admin/blogpage")];
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
        this.form.pageimage=event.target.result
      },
      reader.readAsDataURL(file);
    }
  }
};
</script>