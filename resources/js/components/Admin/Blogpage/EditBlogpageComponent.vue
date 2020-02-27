<template>
      <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Update Page </h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
               <form role="form" @submit.prevent="UpdateBlogPage" enctype="multipart/form-data">
             
                <div class="card-body">
                   <div class="form-group">
                    <label for="language">Language *</label>
                    <select  :class="{'is-invalid' :form.errors.has('language')}" id="language"  v-model="form.language" class="form-control" disabled>
                       <option selected value="en">English</option>
                        <option  value="bn">Bangla</option>
                     
                    </select>
                     <has-error :form="form" field="language" ></has-error>
                </div>
                 <div class="form-group">
                    <label for="pagename">Page Name *</label>
                     <input  v-model="form.pagename " type="text" class="form-control" :class="{ 'is-invalid': form.errors.has('pagename') }" id="pagename" placeholder="Page Name">
                        <has-error :form="form" field="pagename"></has-error>
                  </div>
                  <div class="form-group">
                    <label for="pagetitle">Title *</label>
                     <input  v-model="form.pagetitle " type="text" class="form-control" :class="{ 'is-invalid': form.errors.has('pagetitle') }" v-on:keydown="Title" id="Title" placeholder="Title Name">
                        <has-error :form="form" field="pagetitle"></has-error>
                  </div>
                   <div class="form-group">
                    <label for="slug">Custom Slug</label>
                     <input  v-model="form.slug" type="text"  class="form-control"  :class="{ 'is-invalid': form.errors.has('slug') }"  id="slug" >
                        <has-error :form="form" field="slug"></has-error>
                  </div>
                  <div class="form-group">
                    <label for="url" v-if="form.language=='en'">বাংলা (Slug)</label>
                    <label for="url" v-else="">English (Slug)</label>
                     <input  v-model="form.pageurl" type="text"  class="form-control"  :class="{ 'is-invalid': form.errors.has('pageurl') }"  id="url" >
                        <has-error :form="form" field="pageurl"></has-error>
                  </div>
                   <div class="form-group">
                    <label for="pagekeyword">Key Word*</label>
                     <input  v-model="form.pagekeyword " type="text" class="form-control" :class="{ 'is-invalid': form.errors.has('pagekeyword') }"  id="pagekeyword" placeholder="pagekeyword Name">
                        <has-error :form="form" field="pagekeyword"></has-error>
                  </div>
                   <div class="form-group">
                    <label for="title">Meta Description*</label>
                    <textarea v-model="form.pagemetadescription" class="form-control" rows="5" placeholder="Meta Description"></textarea>
                        <has-error :form="form" field="pagemetadescription"></has-error>
                  </div>
                      <div class="form-group">
                    <label for="parentpage">Update Parent Page *</label>
                    <select :class="{'is-invalid' :form.errors.has('parentpage_id')}" id="parentpage" v-model="form.parentpage_id" class="form-control" >
                        <option disabled value="">Select One</option>
                      <option v-for="parentpagename in allparentpage" :value="parentpagename.id" >{{parentpagename.parentpage}}</option>
                     
                    </select>
                     <has-error :form="form" field="gender_id" ></has-error>
                  </div>
                  <!-- <div class="col-sm-10">
                    <select  :class="{'is-invalid' :form.errors.has('category')}" id="bikebrand" multiple  v-model="form.category" class="form-control" >
                        <option disabled value="">Select One</option>
                      <option v-for="brandrname in form.blogcategorylist" :value="brandrname.id" >{{brandrname.categorylist}}</option>
                     
                    </select>
                     <has-error :form="form" field="bikebrand_id" ></has-error>
                </div> -->
                 <div class="form-group">
                     <label for="exampleInputFile">Feature Image *</label>
                         <div class="custom-file">
                        <input  type="file" :class="{'is-invalid' :form.errors.has('pageimage')}" name="image"  class="custom-file-input"   @change="changephoto($event)">
                           
                        <label class="custom-file-label" for="exampleInputFile">Update Image</label>
                        
                        <has-error :form="form" field="pageimage" ></has-error>
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
  name: "CreateBlogpost",
   created () {
            document.title = "Update  Blog";
        },
  data() {
    return {
      form: new Form({
        parentpage_id: "",
        pagename: "",
        pagetitle: "",
      description: "",
        pageimage: "",
        language: "",
        slug: "",
        pagekeyword: "",
        pagemetadescription: "",
        parentpage: "",
        pageurl: "",
         pagecategorylist:[],
      }),
      categoryVal:[],
      allparentpage:[],
       
    }
    
  },
        mounted() {
          // axios.get('http://127.0.0.1:8000/category')
          //       .then(response => {
          //           response.data.category.forEach(element => {
          //             this.categoryVal.push(element.categoryname)
          //              //console.log(element.categoryname);
          //           });
                      axios.get('/admin/parentpage')
                     .then(response => {
                    (this.allparentpage = response.data.parentpageinfo)
                    //alert(5);
                    //console.log(response);

                });
            
            axios.get(`/admin/editblogpage/${this.$route.params.id}`)
           .then((response)=>{
              this.form.fill(response.data.blogpage)
          }); 
                  
             
        },
  methods: {
    UpdateBlogPage() {
      
        this.form.put('/admin/updateblogpage/'+`${this.$route.params.id}`)
        //console.log('ok');
        .then(({ response }) => {
          [toastr.success("Page Update Successfull")],
            [this.$router.push("/admin/blogpage")];
        })
        .catch(function(response) {
          console.log(response);
          toastr.warning("Sorry Try Agin");
        });
    },
      Title(event){
     this.form.slug=this.form.pagetitle;
    },
       changephoto(event){
      let file=event.target.files[0];
      let reader=new FileReader();
      reader.onload=event=>{
        this.form.pageimage=event.target.result
      },
      reader.readAsDataURL(file);
    },
       updateImage(){
                let img = this.form.pageimage;
                if(img.length>100){
                    return  this.form.pageimage
                }else{
                    return `/images/blogpage/${this.form.pageimage}`
                }

            },
                deleteCategory(id){
                 
         if (confirm("Do you really want to delete it?")) {
         axios.post('/admin/deletecategorylist/'+id)
          .then(({ response = true }) => {
          [toastr.warning("Category  Delete Successfully", " Category")][this.$router.go(0)];
        
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