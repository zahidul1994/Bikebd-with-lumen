<template>
<div class="card">
            <div class="card-header">
              <h3 class="card-title">Fuel Tank List </h3>
                <div class="text-right">  <div class="btn btn-outline-info "> <router-link to="/admin/createftcapacity">Create Ftcapacity</router-link></div></div>
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
                  <th>Fuel Tand Capacity</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="engine, index in allFtcapacitylist.data">
                        
                          <td>{{ index + 1 }}</td>
                          <td>{{engine.ftcapacity}}</td>
                       <td>
                        
                        <router-link :to="`/admin/editftcapacity/${engine.id}`">
                       <i class="fas fa-edit"></i>
                        </router-link>
                        
                    </td>
                       <td>
                        <button class="btn btn-sm btn-warning" @click.prevent="deleteFtcapacity(engine.id)"><i class="fas fa-trash-alt"></i></button>
                        
                        
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
              <div class="card-footer"><pagination :data="allFtcapacitylist" @pagination-change-page="getResults" style="text-align:center"></pagination></div>
            </div>
            <!-- /.card-body -->
          </div>
 
</template>

<script>
export default {
  name: "FtcapacityList",
    data() {
    return {
      // Our data object that holds the Laravel paginator data
      allFtcapacitylist: {},
       keyword:'',
    }
    },
   created () {
            document.title = "Ftcapacity List ";
        },
  mounted() {
    //this.$store.dispatch("allCategory"); //for show Division
     this.getResults();
    
  },
  // computed: {
  //   allEnginelist() {
  //     return this.$store.getters.getAdminengine; //for get Engine
      
  //   }
  //},
  methods: {
     getResults(page = 1) {
      axios.get("admin/ftcapacitylist?page=" + page).then(response => {
        this.allFtcapacitylist = response.data;
      });
    },
     //for serach
        RealSearch:_.debounce(function () {
      //alert(5);
      axios.get("/admin/ftcapacitysearch?s=" + encodeURI(this.keyword)).then(response => {
        this.allFtcapacitylist = response.data;
      });   
            },1000),
    deleteFtcapacity(id) {
      if (confirm("Do you really want to delete it?")) {
                   
      axios.delete("/admin/deleteftcapacity/" + id)
        .then(({ response = true }) => {
          [toastr.warning("Ftcapacity Delete Successfull", " Ftcapacity")];
        
        });
      }
      // this.$store
      //   .dispatch("allCategory") //for refreash show Division
         axios.get("admin/ftcapacitylist?page=" +  this.allFtcapacitylist.current_page).then(response => {
        this.allFtcapacitylist = response.data;
      })
        .catch(function(response = false) {
          console.log(response);
          toastr.error("Sorry Try Agin");
        }); //for show Division
    }
  }
};
</script>

