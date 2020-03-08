<template>
<div class="card">
            <div class="card-header">
              <h3 class="card-title">Weight List </h3>
                <div class="text-right">  <div class="btn btn-outline-info "> <router-link to="/admin/createweight">Create Weight</router-link></div></div>
            </div>
          
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Sl</th>
                  <th>weight</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="category, index in allWeightlist.data">
                        
                          <td>{{ index + 1 }}</td>
                          <td>{{category.weight}}</td>
                       <td>
                        
                        <router-link :to="`/admin/editweight/${category.id}`">
                       <i class="fas fa-edit"></i>
                        </router-link>
                        
                    </td>
                       <td>
                        <button class="btn btn-sm btn-warning" @click.prevent="deleteWeight(category.id)"><i class="fas fa-trash-alt"></i></button>
                        
                        
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
              <div class="card-footer"><pagination :data="allWeightlist" @pagination-change-page="getResults" style="text-align:center"></pagination></div>
            </div>
            <!-- /.card-body -->
          </div>
 
</template>

<script>
export default {
  name: "WeightList",
    data() {
    return {
      // Our data object that holds the Laravel paginator data
      allWeightlist: {},
      
    }
    },
   created () {
            document.title = "Weight List ";
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
      axios.get("admin/weightlist?page=" + page).then(response => {
        this.allWeightlist = response.data;
      });
    },
    deleteWeight(id) {
      if (confirm("Do you really want to delete it?")) {
                   
      axios.delete("/admin/deleteweight/" + id)
        .then(({ response = true }) => {
          [toastr.warning("Weight Delete Successfull", "Stroke")];
        
        });
      }
      // this.$store
      //   .dispatch("allCategory") //for refreash show Division
         axios.get("admin/weightlist?page=" +  this.allWeightlist.current_page).then(response => {
        this.allWeightlist = response.data;
      })
        .catch(function(response = false) {
          console.log(response);
          toastr.error("Sorry Try Agin");
        }); //for show Division
    }
  }
};
</script>

