<template>
<div class="card">
            <div class="card-header">
              <h3 class="card-title">Chassis List </h3>
                <div class="text-right">  <div class="btn btn-outline-info "> <router-link to="/admin/createchassis">Create Chassis</router-link></div></div>
            </div>
          
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Sl</th>
                  <th>Chassis Name</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="category, index in allChassislist.data">
                        
                          <td>{{ index + 1 }}</td>
                          <td>{{category.chassis}}</td>
                       <td>
                        
                        <router-link :to="`/admin/editchassis/${category.id}`">
                       <i class="fas fa-edit"></i>
                        </router-link>
                        
                    </td>
                       <td>
                        <button class="btn btn-sm btn-warning" @click.prevent="deleteChsssis(category.id)"><i class="fas fa-trash-alt"></i></button>
                        
                        
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
              <div class="card-footer"><pagination :data="allChassislist" @pagination-change-page="getResults" style="text-align:center"></pagination></div>
            </div>
            <!-- /.card-body -->
          </div>
 
</template>

<script>
export default {
  name: "ChsssisList",
    data() {
    return {
      // Our data object that holds the Laravel paginator data
      allChassislist: {},
      
    }
    },
   created () {
            document.title = "Chassis List ";
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
      axios.get("admin/chassislist?page=" + page).then(response => {
        this.allChassislist = response.data;
      });
    },
    deleteChsssis(id) {
      if (confirm("Do you really want to delete it?")) {
                   
      axios.delete("/admin/deletechassis/" + id)
        .then(({ response = true }) => {
          [toastr.warning("Chassis Delete Successfull", "Gear")];
        
        });
      }
      // this.$store
      //   .dispatch("allCategory") //for refreash show Division
         axios.get("admin/chassislist?page=" +  this.allChassislist.current_page).then(response => {
        this.allChassislist = response.data;
      })
        .catch(function(response = false) {
          console.log(response);
          toastr.error("Sorry Try Agin");
        }); //for show Division
    }
  }
};
</script>

