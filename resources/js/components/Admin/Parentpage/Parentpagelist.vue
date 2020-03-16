<template>
<div class="card">
            <div class="card-header">
              <h3 class="card-title">Parent Page List </h3>
                <div class="text-right">  <div class="btn btn-outline-info "> <router-link to="/admin/createparentpage">Create Parent Page</router-link></div></div>
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
                  <th>Parent Page</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="parentpage, index in allParentpagelist.data">
                        
                          <td>{{ index + 1 }}</td>
                          <td>{{parentpage.parentpage}}</td>
                       <td>
                        
                        <router-link :to="`/admin/editparentpage/${parentpage.id}`">
                       <i class="fas fa-edit"></i>
                        </router-link>
                        
                    </td>
                       <td>
                        <button class="btn btn-sm btn-warning" @click.prevent="deleteparentpage(parentpage.id)"><i class="fas fa-trash-alt"></i></button>
                        
                        
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
              <div class="card-footer"><pagination :data="allParentpagelist" @pagination-change-page="getResults" style="text-align:center"></pagination></div>
            </div>
            <!-- /.card-body -->
          </div>
 
</template>

<script>
export default {
  name: "Parentpagelist",
   data() {
    return {
      // Our data object that holds the Laravel paginator data
      allParentpagelist: {},
      keyword:'',
      
    }
    },
   created () {
            document.title = "Parent Page List ";
        },
         mounted() {
    //this.$store.dispatch("allBlogpagelist"); //for show Accessories
    this.getResults();
    
  },
  // mounted() {
  //   this.$store.dispatch("allParentpagelist"); //for parent page
    
  // },
  // computed: {
  //   allParentpagelist() {
  //     return this.$store.getters.getAdminparentpage; //for parent page
      
  //   }
  // },
  methods: {
     getResults(page = 1) {
      axios.get("admin/parentpagelist?page=" + page).then(response => {
        this.allParentpagelist = response.data;
      });
    },
     //for serach
        RealSearch:_.debounce(function () {
      //alert(5);
      axios.get("/admin/Parentpagesearch?s=" + encodeURI(this.keyword)).then(response => {
        this.allParentpagelist = response.data;
      });   
            },1000),
    deleteparentpage(id) {
      if (confirm("Do you really want to delete it?")) {
                   
      axios.delete("/admin/deleteparentpage/" + id)
        .then(({ response = true }) => {
          [toastr.warning("Parent Page Delete Successfull", " ParentPage")];
        
        });
      }
      // this.$store
      //   .dispatch("allParentpagelist") //for refreash show Division
          axios.get("admin/parentpagelist?page=" +  this.allParentpagelist.current_page).then(response => {
        this.allParentpagelist = response.data;
      })
        .catch(function(response = false) {
          console.log(response);
          toastr.error("Sorry Try Agin");
        }); //for show Division
    }
  }
};
</script>

