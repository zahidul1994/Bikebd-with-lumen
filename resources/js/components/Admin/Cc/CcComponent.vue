<template>
<div class="card">
            <div class="card-header">
              <h3 class="card-title">Cc  List </h3>
                <div class="text-right">  <div class="btn btn-outline-info "> <router-link to="/admin/createcclist">Create Cc</router-link></div></div>
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
                  <th>CC List</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="ccname, index in allCclist.data">
                        
                          <td>{{ index + 1 }}</td>
                          <td>{{ccname.cc}}</td>
                       <td>
                        
                        <router-link :to="`/admin/editcclist/${ccname.id}`">
                       <i class="fas fa-edit"></i>
                        </router-link>
                        
                    </td>
                       <td>
                        <button class="btn btn-sm btn-warning" @click.prevent="deleteCC(ccname.id)"><i class="fas fa-trash-alt"></i></button>
                        
                        
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
              <div class="card-footer"><pagination :data="allCclist" @pagination-change-page="getResults" style="text-align:center"></pagination></div>
            </div>
            <!-- /.card-body -->
          </div>
 
</template>

<script>
export default {
  name: "CcList",
   data() {
    return {
      // Our data object that holds the Laravel paginator data
      allCclist: {},
      keyword:'',
    }
    },
   created () {
            document.title = "CC List";
        },
  mounted() {
    //this.$store.dispatch("allCategory"); //for show Division
     this.getResults();
     
  },
 
  methods: {
     getResults(page = 1) {
      axios.get("admin/cclist?page=" + page).then(response => {
        this.allCclist = response.data;
      });
    },
     //for serach
        RealSearch:_.debounce(function () {
      //alert(5);
      axios.get("/admin/ccsearch?s=" + encodeURI(this.keyword)).then(response => {
        this.allCclist = response.data;
      });   
            },1000),
    deleteCC(id) {
      if (confirm("Do you really want to delete it?")) {
                   
      axios.delete("/admin/deletecclist/" + id)
        .then(({ response = true }) => {
          [toastr.warning("Cc Delete Successfully", "Cc")];
        
        });
      }
      
         axios.get("admin/cclist?page=" +  this.allCclist.current_page).then(response => {
        this.allCclist = response.data;
      })
        .catch(function(response = false) {
        
          toastr.error("Sorry Try Agin");
        }); //for show Division
    }
  }
};
</script>

