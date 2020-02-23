<template>
<div class="card">
            <div class="card-header">
              <h3 class="card-title">Category List </h3>
                <div class="text-right">  <div class="btn btn-outline-info "> <router-link to="/admin/createcategory">Create Category</router-link></div></div>
            </div>
          
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Sl</th>
                  <th>Category</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="category, index in allCategory.data">
                        
                          <td>{{ index + 1 }}</td>
                          <td>{{category.categoryname}}</td>
                       <td>
                        
                        <router-link :to="`/admin/editcategory/${category.id}`">
                       <i class="fas fa-edit"></i>
                        </router-link>
                        
                    </td>
                       <td>
                        <button class="btn btn-sm btn-warning" @click.prevent="deleteCategory(category.id)"><i class="fas fa-trash-alt"></i></button>
                        
                        
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
              <div class="card-footer"><pagination :data="allCategory" @pagination-change-page="getResults" style="text-align:center"></pagination></div>
            </div>
            <!-- /.card-body -->
          </div>
 
</template>

<script>
export default {
  name: "CatgegoryList",
    data() {
    return {
      // Our data object that holds the Laravel paginator data
      allCategory: {},
      
    }
    },
   created () {
            document.title = "Category List ";
        },
  mounted() {
    //this.$store.dispatch("allCategory"); //for show Division
     this.getResults();
    
  },
  computed: {
    allCategory() {
      return this.$store.getters.getCategory; //for get Division
      
    }
  },
  methods: {
     getResults(page = 1) {
      axios.get("admin/categorylist?page=" + page).then(response => {
        this.allCategory = response.data;
      });
    },
    deleteCategory(id) {
      if (confirm("Do you really want to delete it?")) {
                   
      axios.delete("/admin/deletecategory/" + id)
        .then(({ response = true }) => {
          [toastr.warning("Category Delete Successfull", " Category")];
        
        });
      }
      // this.$store
      //   .dispatch("allCategory") //for refreash show Division
         axios.get("admin/categorylist?page=" +  this.allCategory.current_page).then(response => {
        this.allCategory = response.data;
      })
        .catch(function(response = false) {
          console.log(response);
          toastr.error("Sorry Try Agin");
        }); //for show Division
    }
  }
};
</script>

