<template>
<div class="card">
            <div class="card-header">
              <h3 class="card-title">Blog List </h3>
                <div class="text-right">  <div class="btn btn-outline-info "> <router-link to="/admin/createblogpage">Create Blog Page</router-link></div></div>
            </div>
          
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Date</th>
                  <th>Name</th>
                  <th>Title</th>
                  <th>Image</th>
                  <th>Status </th>
                  <th>Preview</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="bloginfo, index in allBlogpagelist.data">
                        
                          <td>{{bloginfo.created_at}}</td>
                          <td>{{bloginfo.pagename}}</td>
                          <td>{{bloginfo.pagetitle}}</td>

                          <td><img :src="'/images/blogpage/'+ bloginfo.pageimage" alt="no image" width=80 data-lightbox="image-1"></td>
                           <!-- <td>{{bloginfo.blogcategorylists.categorylist}}</td> -->

                            <!-- <td><span v-for="catelist in  bloginfo.pagecategorylist">{{catelist.pagecategorylist}} <br></span></td> -->
                            
                          <!-- <td>  <span v-html="bloginfo.description"></span></td> -->
                          <td>    
                         <span class="btn btn-sm btn-primary" @click.prevent="activestatus(bloginfo.id)" v-if="bloginfo.status==1"><i class="fas fa-check-square"></i> </span>
                         <span class="btn btn-sm btn-danger" @click.prevent="inactivestatus(bloginfo.id)"  v-else><i class="fas fa-ban"></i></span>
                         </td>
                          <td>
                        <router-link target= '_blank' :to="`/en/page/${bloginfo.slug}`">
                         Details
                        </router-link>
                        
                    </td> 
                       <td>
                        
                        <router-link :to="`/admin/editblogpage/${bloginfo.id}`">
                       <i class="fas fa-edit"></i>
                        </router-link>
                        
                    </td>
                       <td>
                        <button class="btn btn-sm btn-warning" @click.prevent="deletePage(bloginfo.id)"><i class="fas fa-trash-alt"></i></button>
                        
                        
                    </td>
                </tr>
                
                </tbody>
                <!-- <tfoot>
                <tr>
                  <th>Rendering engine</th>
                  <th>Browser</th>
                  <th>Platform(s)</th>
                  <th>Engine version</th>
                 
                </tr>
                </tfoot> -->
              </table>
                           <!-- /.card-body -->
             <div class="card-footer"><pagination :data="allBlogpagelist" @pagination-change-page="getResults" style="text-align:center"></pagination></div>
            </div>
            <!-- /.card-body -->
          </div>
 
</template>

<script>
export default {
  name: "BlogPageList",
    data() {
    return {
      // Our data object that holds the Laravel paginator data
      allBlogpagelist: {},
      
    }
    },
   created () {
            document.title = "Blog List ";
        },
  mounted() {
    //this.$store.dispatch("allBlogpagelist"); //for show Accessories
    this.getResults();
    
  },
  // computed: {
  //   allBlogpagelist() {
  //     return this.$store.getters.getAdminblogpage; //for get Accessories
      
  //   }
  // },
  methods: {

     getResults(page = 1) {
      axios.get("/admin/blogpage?page=" + page).then(response => {
        this.allBlogpagelist = response.data;
      });
    },
    deletePage(id) {
      if (confirm("Do you really want to delete it?")) {
                   
      axios.delete("/admin/deleteblogpage/" + id)
        .then(({ response = true }) => {
          [toastr.warning("Page Delete Successfully", " BlogPage")];
        
        });
      }
      // this.$store
      //   .dispatch("allBlogpagelist") //for refreash show Division
         axios.get("/admin/blogpage?page=" +  this.allBlogpagelist.current_page).then(response => {
        this.allBlogpagelist = response.data;
      })
        .catch(function(response = false) {
          console.log(response);
          toastr.error("Sorry Try Agin");
        }); //for show Division
    },

       activestatus(id){
    
          axios.post("/admin/pageinactive/" + id)
        .then(({ response = true }) => {
          [toastr.info("Page  Successfully", "Blogpage")];
        });
        //     this.$store
        // .dispatch("allBlogpagelist") //for refreash show admin
         axios.get("/admin/blogpage?page=" +  this.allBlogpagelist.current_page).then(response => {
        this.allBlogpagelist = response.data;
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
        .post("/admin/pageactive/" + id)
        .then(({ response = true }) => {
          [toastr.success("Blog Post  Public Successfully", "Blogpage")];
        });
        //     this.$store
        // .dispatch("allBlogpagelist") //for refreash show admin
         axios.get("/admin/blogpage?page=" +  this.allBlogpagelist.current_page).then(response => {
        this.allBlogpagelist = response.data;
      })
        .catch(function(response = false) {
          console.log(response);
          toastr.error("Sorry Try Agin");
        }); //for active Account
// alert('Hello');
    },
      },
};
</script>

