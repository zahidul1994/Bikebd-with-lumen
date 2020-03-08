<template>
<div class="card">
            <div class="card-header">
              <h3 class="card-title">Rear Tyre List </h3>
                <div class="text-right">  <div class="btn btn-outline-info "> <router-link to="/admin/creatertyre">Create Rear Tyre</router-link></div></div>
            </div>
          
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Sl</th>
                  <th>Rear Tyre</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="category, index in allRtyrelist.data">
                        
                          <td>{{ index + 1 }}</td>
                          <td>{{category.rtyre}}</td>
                       <td>
                        
                        <router-link :to="`/admin/editrtyre/${category.id}`">
                       <i class="fas fa-edit"></i>
                        </router-link>
                        
                    </td>
                       <td>
                        <button class="btn btn-sm btn-warning" @click.prevent="deleteRtyre(category.id)"><i class="fas fa-trash-alt"></i></button>
                        
                        
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
              <div class="card-footer"><pagination :data="allRtyrelist" @pagination-change-page="getResults" style="text-align:center"></pagination></div>
            </div>
            <!-- /.card-body -->
          </div>
 
</template>

<script>
export default {
  name: "RtyreList",
    data() {
    return {
      // Our data object that holds the Laravel paginator data
      allRtyrelist: {},
      
    }
    },
   created () {
            document.title = "Rtyre List ";
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
      axios.get("admin/rtyrelist?page=" + page).then(response => {
        this.allRtyrelist = response.data;
      });
    },
    deleteRtyre(id) {
      if (confirm("Do you really want to delete it?")) {
                   
      axios.delete("/admin/deletertyre/" + id)
        .then(({ response = true }) => {
          [toastr.warning("Rtyre Delete Successfull", "Rtyre")];
        
        });
      }
      // this.$store
      //   .dispatch("allCategory") //for refreash show Division
         axios.get("admin/rtyrelist?page=" +  this.allRtyrelist.current_page).then(response => {
        this.allRtyrelist = response.data;
      })
        .catch(function(response = false) {
          console.log(response);
          toastr.error("Sorry Try Agin");
        }); //for show Division
    }
  }
};
</script>

