<template>
<div class="card">
            <div class="card-header">
              <h3 class="card-title">Bike Brand List </h3>
                <div class="text-right">  <div class="btn btn-outline-info "> <router-link to="/admin/createbikebrand">Create Brand</router-link></div></div>
            </div>
          
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Sl</th>
                  <th>Brand</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="brand, index in allBikebrand">
                        
                          <td>{{ index + 1 }}</td>
                          <td>{{brand.bikebrand}}</td>
                       <td>
                        
                        <router-link :to="`/admin/editbikebrand/${brand._id}`">
                       <i class="fas fa-edit"></i>
                        </router-link>
                        
                    </td>
                       <td>
                        <button class="btn btn-sm btn-warning" @click.prevent="deleteBikeBrand(brand._id)"><i class="fas fa-trash-alt"></i></button>
                        
                        
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
            </div>
            <!-- /.card-body -->
          </div>
 
</template>

<script>
export default {
  name: "BrandList",
  pagination :{
   curent_page:1,
  },
  
   created () {
            document.title = "Brand List ";
        },
  mounted() {
    this.$store.dispatch("allBikebrand"); //for show Bikeversion
    
  },
  computed: {
    allBikebrand() {
      return this.$store.getters.getBikeBrand; //for get Bikeversioln
      
    }
  },
  methods: {
    deleteBikeBrand(id) {
      if (confirm("Do you really want to delete it?")) {
                   
      axios.delete("/admin/deletebikebrand/" + id)
        .then(({ response = true }) => {
          [toastr.warning("Bike Brand Delete Successfull", " Bike Brand")];
        
        });
      }
      this.$store
        .dispatch("allBikebrand") //for refreash show Bikeversion
        .catch(function(response = false) {
          console.log(response);
          toastr.error("Sorry Try Agin");
        }); //for show Division
    }
  }
};
</script>

