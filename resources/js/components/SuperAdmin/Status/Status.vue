<template >
    <div class="card">
            <div class="card-header">
              <h3 class="card-title">Status List</h3>
                <div class="text-right">  <div class="btn btn-outline-info "> <router-link to="/superadmin/createstatus">Create Status</router-link></div></div>
            </div>
          
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>Sl</th>
                    <th>Status</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                </thead>
                <tbody>
               <tr v-for="status, index in allStatus">
                        
                          <td>{{ index + 1 }}</td>
                          <td>{{status.status_name}}</td>
                       <td>
                        
                        <router-link :to="`/superadmin/editstatus/${status._id}`">
                       <i class="fas fa-edit"></i>
                        </router-link>
                        
                    </td>
                       <td>
                        <button class="btn btn-sm btn-warning" @click.prevent="deleteStatus(status._id)"><i class="fas fa-trash-alt"></i></button>
                        
                        
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
  name: "StatusList",
   created () {
            document.title = "Status";
        },
  mounted() {
    this.$store.dispatch("allStatus"); //for show Status
  },
  computed: {
    allStatus() {
      return this.$store.getters.getStatus; //for get Status
    }
  },
  methods: {
    deleteStatus(id) {
      if (confirm("Do you really want to delete it?")) {
      //console.log(id)
      axios.delete("/superadmin/deletestatus/" + id)
      
        .then(({ response = true }) => {
          [toastr.warning("Status Delete Successfully", " Status")];
        });
      }
      this.$store
        .dispatch("allStatus") //for refreash show Status
        .catch(function(response = false) {
          console.log(response);
          toastr.error("Sorry Try Agin");
        });
    }
  }
};
</script>