<template>
<div class="card">
            <div class="card-header">
              <h3 class="card-title">Clutch List </h3>
                <div class="text-right">  <div class="btn btn-outline-info "> <router-link to="/admin/createclutch">Create Clutch</router-link></div></div>
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
                  <th>Clutch</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="category, index in allClutchlist.data">
                        
                          <td>{{ index + 1 }}</td>
                          <td>{{category.clutch}}</td>
                       <td>
                        
                        <router-link :to="`/admin/editclutch/${category.id}`">
                       <i class="fas fa-edit"></i>
                        </router-link>
                        
                    </td>
                       <td>
                        <button class="btn btn-sm btn-warning" @click.prevent="deleteClutch(category.id)"><i class="fas fa-trash-alt"></i></button>
                        
                        
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
              <div class="card-footer"><pagination :data="allClutchlist" @pagination-change-page="getResults" style="text-align:center"></pagination></div>
            </div>
            <!-- /.card-body -->
          </div>
 
</template>

<script>
export default {
  name: "ClutchList",
    data() {
    return {
      // Our data object that holds the Laravel paginator data
      allClutchlist: {},
      keyword:'',
    }
    },
   created () {
            document.title = "Clutch List ";
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
      axios.get("admin/clutchlist?page=" + page).then(response => {
        this.allClutchlist = response.data;
      });
    },
         //for search
    RealSearch:_.debounce(function () {
      //alert(5);
      axios.get("/admin/clutchsearch?s=" + encodeURI(this.keyword)).then(response => {
        this.allClutchlist = response.data;
      });   
            },1000),
    deleteClutch(id) {
      if (confirm("Do you really want to delete it?")) {
                   
      axios.delete("/admin/deleteclutch/" + id)
        .then(({ response = true }) => {
          [toastr.warning("Clutch Delete Successfull", "Gear")];
        
        });
      }
      // this.$store
      //   .dispatch("allCategory") //for refreash show Division
         axios.get("admin/clutchlist?page=" +  this.allClutchlist.current_page).then(response => {
        this.allClutchlist = response.data;
      })
        .catch(function(response = false) {
          console.log(response);
          toastr.error("Sorry Try Agin");
        }); //for show Division
    }
  }
};
</script>

