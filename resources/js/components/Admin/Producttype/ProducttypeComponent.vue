<template>
<div class="card">
            <div class="card-header">
              <h3 class="card-title">Producttupe List </h3>
                <div class="text-right">  <div class="btn btn-outline-info "> <router-link to="/admin/createproducttype">Create Product Type</router-link></div></div>
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
                  <th>Sl</th>
                  <th>Product Type Name</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="category, index in allProducttypelist.data">
                        
                          <td>{{ index + 1 }}</td>
                          <td>{{category.producttype}}</td>
                       <td>
                        
                        <router-link :to="`/admin/editproducttype/${category.id}`">
                       <i class="fas fa-edit"></i>
                        </router-link>
                        
                    </td>
                       <td>
                        <button class="btn btn-sm btn-warning" @click.prevent="deleteProducttype(category.id)"><i class="fas fa-trash-alt"></i></button>
                        
                        
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
              <div class="card-footer"><pagination :data="allProducttypelist" @pagination-change-page="getResults" style="text-align:center"></pagination></div>
            </div>
            <!-- /.card-body -->
          </div>
 
</template>

<script>
export default {
  name: "ProdcucttypeList",
    data() {
    return {
      // Our data object that holds the Laravel paginator data
      allProducttypelist: {},
      
    }
    },
   created () {
            document.title = "Prodcucttype List ";
        },
  mounted() {
    //this.$store.dispatch("allCategory"); //for show Division
     this.getResults();
    
  },
  // computed: {
  //   allStrokelist() {
  //     return this.$store.getters.getAdminstroke; //for get Division
      
  //   }
  // },
  methods: {
     getResults(page = 1) {
      axios.get("admin/producttypelist?page=" + page).then(response => {
        this.allProducttypelist = response.data;
      });
    },
          //for search
    RealSearch:_.debounce(function () {
      //alert(5);
      axios.get("/admin/producttypesearch?s=" + encodeURI(this.keyword)).then(response => {
        this.allProducttypelist = response.data;
      });
             
            },1000),
    deleteProducttype(id) {
      if (confirm("Do you really want to delete it?")) {
                   
      axios.delete("/admin/deleteproducttype/" + id)
        .then(({ response = true }) => {
          [toastr.warning("Product Type Delete Successfull", "Producttype")];
        
        });
      }
      // this.$store
      //   .dispatch("allCategory") //for refreash show Division
         axios.get("admin/producttypelist?page=" +  this.allProducttypelist.current_page).then(response => {
        this.allProducttypelist = response.data;
      })
        .catch(function(response = false) {
          console.log(response);
          toastr.error("Sorry Try Agin");
        }); //for show Division
    }
  }
};
</script>

