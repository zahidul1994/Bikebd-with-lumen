<template>
<div class="card">
            <div class="card-header">
              <h3 class="card-title">Engine List </h3>
                <div class="text-right">  <div class="btn btn-outline-info "> <router-link to="/admin/createengine">Create Engine</router-link></div></div>
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
                  <th>Engine Type Name</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="engine, index in allEnginelist.data">
                        
                          <td>{{ index + 1 }}</td>
                          <td>{{engine.enginetype}}</td>
                       <td>
                        
                        <router-link :to="`/admin/editeengine/${engine.id}`">
                       <i class="fas fa-edit"></i>
                        </router-link>
                        
                    </td>
                       <td>
                        <button class="btn btn-sm btn-warning" @click.prevent="deleteEngine(engine.id)"><i class="fas fa-trash-alt"></i></button>
                        
                        
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
              <div class="card-footer"><pagination :data="allEnginelist" @pagination-change-page="getResults" style="text-align:center"></pagination></div>
            </div>
            <!-- /.card-body -->
          </div>
 
</template>

<script>
export default {
  name: "EngineList",
    data() {
    return {
      // Our data object that holds the Laravel paginator data
      allEnginelist: {},
   
    }
    },
   created () {
            document.title = "Engine List ";
        },
  mounted() {
    //this.$store.dispatch("allCategory"); //for show Division
     this.getResults();
    
  },

  methods: {
     getResults(page = 1) {
      axios.get("admin/enginelist?page=" + page).then(response => {
        this.allEnginelist = response.data;
      });
    },
    //for serach
      RealSearch:_.debounce(function () {
      //alert(5);
      axios.get("/admin/enginesearch?s=" + encodeURI(this.keyword)).then(response => {
        this.allEnginelist = response.data;
      });
             
            },1000),
    deleteEngine(id) {
      if (confirm("Do you really want to delete it?")) {
                   
      axios.delete("/admin/deleteengine/" + id)
        .then(({ response = true }) => {
          [toastr.warning("Engine Delete Successfull", " Engine")];
        
        });
      }
      // this.$store
      //   .dispatch("allCategory") //for refreash show Division
         axios.get("admin/enginelist?page=" +  this.allEnginelist.current_page).then(response => {
        this.allEnginelist = response.data;
      })
        .catch(function(response = false) {
          console.log(response);
          toastr.error("Sorry Try Agin");
        }); //for show Division
    }
  }
};
</script>

