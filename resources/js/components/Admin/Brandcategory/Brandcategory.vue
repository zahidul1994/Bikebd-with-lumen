<template>
<div class="card">
            <div class="card-header">
              <h3 class="card-title">Brand Category  List </h3>
                <div class="text-right">  <div class="btn btn-outline-info "> <router-link to="/admin/createbrandcategory">Create Brand Category</router-link></div></div>
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
                 
                   <th>SL</th>
                   <th>Brand Name</th>
                  <th>Brand Category</th>
                  <!-- <th>Status</th> -->
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="brandcate, index in allBrandCategory.data">
                        
                          <td>{{ index + 1 }}</td>
                          <td>{{brandcate.company.brand}}</td>
                          <td>{{brandcate.brandcategory}}</td>
                         <!-- <td>    
                         <span class="btn btn-sm btn-primary" @click.prevent="activestatus(company.id)" v-if="company.status==1"><i class="fas fa-check-square"></i> </span>
                         <span class="btn btn-sm btn-danger" @click.prevent="inactivestatus(company.id)"  v-else><i class="fas fa-ban"></i></span>
                         </td> -->
                       <td>
                        
                        <router-link :to="`/admin/editbrandcategory/${brandcate.id}`">
                       <i class="fas fa-edit"></i>
                        </router-link>
                        
                    </td>
                       <td>
                        <button class="btn btn-sm btn-warning" @click.prevent="deleteBrandCategory(brandcate.id)"><i class="fas fa-trash-alt"></i></button>
                        
                        
                    </td>
                </tr>
                
                </tbody>
                
              </table>
                <div class="card-footer"><pagination :data="allBrandCategory" @pagination-change-page="getResults" style="text-align:center"></pagination></div>
            </div>
            <!-- /.card-body -->
          </div>
 
</template>

<script>
export default {
  name: "BrandCategoryList",
  data(){
return{
  allBrandCategory:{}
}

  },
  
   created () {
            document.title = " Brand Category List ";
        },
  mounted() {
    this.getResults();
    
  },
 
  methods: {
 getResults(page = 1) {
      axios.get("/admin/brandcategorylist?page=" + page).then(response => {
        this.allBrandCategory = response.data;
      });
    },
      //for search
    RealSearch:_.debounce(function () {
      //alert(5);
      axios.get("/admin/brandcategorysearch?s=" + encodeURI(this.keyword)).then(response => {
        this.allBrandCategory = response.data;
      });
             
            },1000),
    deleteBrandCategory(id) {
      if (confirm("Do you really want to delete it?")) {
                   
      axios.delete("/admin/deletebrandcategory/" + id)
        .then(({ response = true }) => {
          [toastr.warning("Brand Category Delete Successfully", "BrandCategory")];
        
        });
      }
      axios.get("/admin/brandcategorylist?page=" +  this.allBrandCategory.current_page).then(response => {
       this.allBrandCategory = response.data;
      })
        .catch(function(response = false) {
            toastr.error("Sorry Try Agin");
        }); //for show Division
    },
     activestatus(id){
    
          axios.post("/admin/companydactive/" + id)
        .then(({ response = true }) => {
         [toastr.success("Company In-Active Successfully", "Company")];
        });
           
       axios.get("/admin/companylist?page=" +  this.allCompanyList.current_page).then(response => {
       this.allCompanyList = response.data;
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
        .post("/admin/companyactive/" + id)
        .then(({ response = true }) => {
          [toastr.success("Company Active Successfully", "Company")];
        });
   
       axios.get("/admin/companylist?page=" +  this.allCompanyList.current_page).then(response => {
       this.allCompanyList = response.data;
      })
        .catch(function(response = false) {
          console.log(response);
          toastr.error("Sorry Try Agin");
        }); //for active Account
// alert('Hello');
    },
  }
};
</script>

