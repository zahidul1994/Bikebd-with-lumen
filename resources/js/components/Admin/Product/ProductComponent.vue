<template>
<div class="card">
 
            <div class="card-header">
              <h3 class="card-title">Product List </h3>
                <div class="text-right">  <div class="btn btn-outline-info "> <router-link to="/admin/createproduct">Create Product</router-link></div></div>
            </div>
          
            <!-- /.card-header -->
            <div class="card-body">
              <form role="form" class="form-inline">
<div class="input-group-btn">
  <input type="text" @keyup="RealSearch" v-model="keyword" class="form-control inline" placeholder="Search">
<button type="submit" @click.prevent="RealSearch"  class="btn btn-info "><i class="fa fa-search"></i>
</button>
</div>
 </form>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Date Time</th>
                  <th>Title</th>
                  <th>Image</th>
                  <th>CC</th>
                  <th>Reqular Price</th>
                  <th>Displacement </th>
                  <th>Mileage </th>
                 <th>Status </th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="productinfo in allProductlist.data" :key="productinfo.id">
                        
                          <td style="width:116px">{{productinfo.created_at}}</td>
                          <td>{{productinfo.title }}</td>
                          <!-- <td>{{productinfo.cc}}</td> -->
                       <td>
                                                        
                        <img :src="'/images/productimages/'+ productinfo.featureimage" alt="no image" width=50 title="Click Me" @click.prevent="Slider(productinfo.id)" data-toggle="modal" data-target="#showimagemodal"> 
                          
                           </td>
                      <td>{{productinfo.cc}}</td>
                      <td>{{productinfo.regularprice}}</td>
                      <td>{{productinfo.displacement}}</td>
                      <td>{{productinfo.mileage }}</td>
                          <td>    
                         <span class="btn btn-sm btn-primary" @click.prevent="activestatus(productinfo.id)" v-if="productinfo.status==1"><i class="fas fa-check-square"></i> </span>
                         <span class="btn btn-sm btn-danger" @click.prevent="inactivestatus(productinfo.id)"  v-else><i class="fas fa-ban"></i></span>
                         </td>
                        
                   <td>
                     <div class="btn-group">
                    <button type="button" class="btn btn-success btn-sm">Action</button>
                    <button type="button" class="btn btn-success dropdown-toggle dropdown-hover dropdown-icon btn-sm" data-toggle="dropdown">
                      <div class="dropdown-menu pull-right" role="menu">
                         <router-link class="dropdown-item" :to="`/admin/editproduct/${productinfo.id}`">
                       <i class="fas fa-edit"> Edit</i>
                        </router-link> 
                        <router-link class="dropdown-item" target='_blank' :to="`/blog/${productinfo.slug}`">
                       <i class="fas fa-info"> Details</i>
                        </router-link>
                         <button class="dropdown-item btn btn-sm btn-warning" @click.prevent="deleteProduct(productinfo.id)"><i class="fas fa-trash-alt"></i> Delete</button>
                        
                        <a class="dropdown-item" href="#">Something else here</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Separated link</a>
                      </div>
                    </button>
                  </div>
                     
                  </td>

                  
                </tr>
                
                </tbody>
             </table>
            
             <!-- /.card-body -->
             <div class="card-footer"><pagination :data="allProductlist" @pagination-change-page="getResults" style="text-align:center"></pagination></div>
          </div>


          <!--create Modal-->
      <div class="modal fade" id="showimagemodal">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Slider Images</h4>
                <button type="button" @click="FormReset()" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                </div>
            <div class="modal-body">
            
           <span  v-for="image in Sliderimage" class="img-prnt">
                                         
                            <img  :src="'/images/productimages/slider/'+ image.productimage"  width=200 >
                            
                            <button class="btn btn-danger" @click="deleteimage(image.id)">
                                x
                            </button>
                            </span>
              
            </div>
               <form  @submit.prevent="addSliderimage" enctype="multipart/form-data">
<div class="form-group col-md-6 ">
        <label for="exampleInputFile">Upload New Image *</label>
          <vue-upload-multiple-image
          @upload-success="uploadImageSuccess"
          @before-remove="beforeRemove"
         :data-images="form.images"
          idUpload="myIdUpload"
          editUpload="myIdEdit"
          ></vue-upload-multiple-image>
<button type="submit" class="btn btn-primary">Upload</button>
         
           </div> 
                </form>
                
            <div class="modal-footer justify-content-between">
           
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>



          </div>
 
</template>

<script>
import VueUploadMultipleImage from 'vue-upload-multiple-image'
export default {
   components: {
    VueUploadMultipleImage
  },
  name: "ProductList",
   data() {
    return { form: new Form({
      id:'',
         images:[],
   
      }),
      // Our data object that holds the Laravel paginator data
      allProductlist: {},
        keyword:'',
      Sliderimage:null,
    };
  },
   created () {
            document.title = "Product List";
        },
  mounted() {
    // this.$store.dispatch("allBlogpostlist"); //for show Accessories
     this.getResults();
   
     
  },
 
 methods: {
       getResults(page = 1) {
      axios.get("/admin/productlist?page=" + page).then(response => {
        this.allProductlist = response.data;
      });
    },
    deleteProduct(id) {
      if (confirm("Do you really want to delete it?")) {
                   
      axios.delete("/admin/deleteproduct/" + id)
        .then(({ response = true }) => {
          [toastr.warning("Product Delete Successfully", " Product")];
        
        });
      }; 

      axios.get("/admin/productlist?page=" +  this.allProductlist.current_page).then(response => {
        this.allProductlist = response.data;
      })
        .catch(function(response = false) {
          console.log(response);
          toastr.error("Sorry Try Agin");
        }); //for show Division
    },
           //for search
    RealSearch:_.debounce(function () {
      //alert(5);
      axios.get("/admin/productsearch?s=" + encodeURI(this.keyword)).then(response => {
        this.allProductlist = response.data;
      });
             
            },1000),

      activestatus(id){
    
          axios.post("/admin/productinactive/" + id)
        .then(({ response = true }) => {
          [toastr.info("Product  Inactive Successfully", "Product")];
        });
           
      axios.get("/admin/productlist?page=" +  this.allProductlist.current_page).then(response => {
        this.allProductlist = response.data;
      })
        .catch(function(response = false) {
          console.log(response);
          toastr.error("Sorry Try Agin");
        }); //for inactive account
// alert('Hello');
    },
      inactivestatus(id){
        //alert(5);
      axios
        .post("/admin/productactive/" + id)
        .then(({ response = true }) => {
          [toastr.success("Product  Active Successfully", "Product")];
        });
   
      axios.get("/admin/productlist?page=" +  this.allProductlist.current_page).then(response => {
        this.allProductlist = response.data;
      })
        .catch(function(response = false) {
          //console.log(response);
          toastr.error("Sorry Try Agin");
        }); //for active Account
// alert('Hello');
    },
    Slider(id){
      this.form.id=id;
 axios.post("/admin/sliderimage/" + id)
        .then(response => {
        this.Sliderimage = response.data.sliderim;
      })
    },

     deleteimage(id){
         if (confirm("Do you really want to delete it?")) {
         axios.get('/admin/deleteproductimage/'+id)
          .then(response => {
          toastr.warning("Slider Image Delete Successfully", " Image");
           this.Sliderimage = response.data.sliderim;
        
        });
        }
    
    },
     uploadImageSuccess(formData, index, fileList) {
            this.form.images=fileList;
          },
    beforeRemove (index, done, fileList) {
     // console.log('index', index, fileList)
      var r = confirm("Remove image")
      if (r == true) {
        done()
      } else {
      }
    },

      addSliderimage() {
      this.form
        .post("admin/createsliderimage")
        //console.log('ok');
        .then(response => {
          toastr.warning("Slider Image Upload Successfully", " Image");
           this.Sliderimage = response.data.sliderim;
this.fileList=0;
        })
        .catch(function(response) {
            toastr.warning("Sorry Try Agin111");
            // console.log(response);
        });
    },
    FormReset(){  //for restore form
      this.form.reset();
    }
      },
};
</script>
