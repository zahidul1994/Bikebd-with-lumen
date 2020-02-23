<template>
<div class="card">
            <div class="card-header">
              <h3 class="card-title">Account Permission List</h3>
                <div class="text-right">  <div class="btn btn-outline-info "> <router-link to="/superadmin/createpermission">Create New Permission</router-link></div></div>
            </div>
          
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Sl</th>
                  <th>Permission</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="permission, index in allpermissionList.data">
                        
                          <td>{{ index + 1 }}</td>
                          <td>{{permission.name}}</td>
                       <td>
                        
                        <router-link :to="`/superadmin/editpermission/${permission.id}`">
                       <i class="fas fa-edit"></i>
                        </router-link>
                        
                    </td>
                       <td>
                        <button class="btn btn-sm btn-warning" @click.prevent="deletePermission(permission.id)"><i class="fas fa-trash-alt"></i></button>
                        
                        
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
             <div class="card-footer"><pagination :data="allpermissionList" @pagination-change-page="getResults" style="text-align:center"></pagination></div>
          </div>
 
</template>

<script>
export default {
  name: "Permission",
   data() {
    return {
      // Our data object that holds the Laravel paginator data
      allpermissionList: {},
      
    };
  },
 
        created () {
            document.title = "Account Permission";
        },
  mounted() {
    this.getResults();
  },
  
  methods: {
 getResults(page = 1) {
      axios.get("superadmin/permissionlist?page=" + page).then(response => {
        this.allpermissionList = response.data;
      });
    },
    deletePermission(id) {
      if (confirm("Do you really want to delete it?")) {
                   
      axios.delete("/superadmin/deletepermission/" + id)
        .then(({ response = true }) => {
          [toastr.warning("Permission Delete Successfull", " Permission")];
        
        });
      }
      axios.get("superadmin/permissionlist?page=" +  this.allpermissionList.current_page).then(response => {
        this.allpermissionList = response.data;
      })
        .catch(function(response = false) {
           toastr.error("Sorry Try Agin");
        }); //for show Gender
    }
  }
};
</script>


