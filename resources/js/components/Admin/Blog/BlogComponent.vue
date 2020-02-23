<template>
<div class="card">
            <div class="card-header">
              <h3 class="card-title">Blog List </h3>
                <div class="text-right">  <div class="btn btn-outline-info "> <router-link to="/admin/createblogpost">Create Blog</router-link></div></div>
            </div>
          
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Date Time</th>
                  <th>Title</th>
                  <th>Image</th>
                  
                  <th>Category</th>
                  <!-- <th>Description</th> -->
                 <th>Status </th>
                  <th>Preview</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="bloginfo in allBlogpostlist.data" :key="bloginfo.id">
                        
                          <td style="width:116px">{{bloginfo.created_at}}</td>
                          <td>{{bloginfo.title}}</td>

                          <td><img :src="'/images/blogpost/'+ bloginfo.postimage" alt="no image" width=50 data-lightbox="image-1"></td>

                            <td><span v-for="catelist in  bloginfo.blogcategorylist" :key="(catelist.id)">{{catelist.categorylist}} <br></span></td>
                            
                          <!-- <td>  <span v-html="bloginfo.description"></span></td> -->
                          <td>    
                         <span class="btn btn-sm btn-primary" @click.prevent="activestatus(bloginfo.id)" v-if="bloginfo.status==1"><i class="fas fa-check-square"></i> </span>
                         <span class="btn btn-sm btn-danger" @click.prevent="inactivestatus(bloginfo.id)"  v-else><i class="fas fa-ban"></i></span>
                         </td>
                          <td>
                        <router-link target='_blank' :to="`/en/blog/${bloginfo.slug}`">
                         Details
                        </router-link>
                        
                    </td> 
                       <td>
                        
                        <router-link :to="`/admin/editblogpost/${bloginfo.id}`">
                       <i class="fas fa-edit"></i>
                        </router-link>
                        
                    </td>
                       <td>
                        <button class="btn btn-sm btn-warning" @click.prevent="deleteBlog(bloginfo.id)"><i class="fas fa-trash-alt"></i></button>
                        
                        
                    </td>
                </tr>
                
                </tbody>
             </table>
            
             <!-- /.card-body -->
             <div class="card-footer"><pagination :data="allBlogpostlist" @pagination-change-page="getResults" style="text-align:center"></pagination></div>
          </div>
          </div>
 
</template>

<script>
export default {
  name: "BlogPostList",
   data() {
    return {
      // Our data object that holds the Laravel paginator data
      allBlogpostlist: {},
      
    };
  },
   created () {
            document.title = "Blog List ";
        },
  mounted() {
    // this.$store.dispatch("allBlogpostlist"); //for show Accessories
     this.getResults();
     
  },
 
 methods: {
       getResults(page = 1) {
      axios.get("admin/blogpost?page=" + page).then(response => {
        this.allBlogpostlist = response.data;
      });
    },
    deleteBlog(id) {
      if (confirm("Do you really want to delete it?")) {
                   
      axios.delete("/admin/deleteblogpost/" + id)
        .then(({ response = true }) => {
          [toastr.warning("Post Delete Successfully", " BlogPost")];
        
        });
      };
      axios.get("blogpost?page=" +  this.allBlogpostlist.current_page).then(response => {
        this.allBlogpostlist = response.data;
      })
        .catch(function(response = false) {
          console.log(response);
          toastr.error("Sorry Try Agin");
        }); //for show Division
    },

       activestatus(id){
    
          axios.post("/admin/blogpostinactive/" + id)
        .then(({ response = true }) => {
          [toastr.info("Blog Post  Private Successfully", "Blogpost")];
        });
           
      axios.get("blogpost?page=" +  this.allBlogpostlist.current_page).then(response => {
        this.allBlogpostlist = response.data;
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
        .post("/admin/blogpostactive/" + id)
        .then(({ response = true }) => {
          [toastr.success("Blog Post  Public Successfully", "Blogpost")];
        });
   
      axios.get("blogpost?page=" +  this.allBlogpostlist.current_page).then(response => {
        this.allBlogpostlist = response.data;
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

