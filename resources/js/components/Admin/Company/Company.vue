<template>
<div class="card">
            <div class="card-header">
              <h3 class="card-title">Company  List </h3>
                <div class="text-right">  <div class="btn btn-outline-info "> <router-link to="/admin/createcompany">Create Company</router-link></div></div>
            </div>
          
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Sl</th>
                  <th>Short Name</th>
                   <th>Image</th>
                  <th>Full Name</th>
                 <th>Description</th>
                  <th>Status</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="company, index in allCompanyList.data">
                        
                          <td>{{ index + 1 }}</td>
                          <td>{{company.shortname}}</td>
                          <td><img :src="'/images/companyimage/'+ company.profileimage" alt="no image" width=50 data-lightbox="image-1"></td>
                          <td>{{company.fullname}}</td>
                          <td>{{company.description}}</td>
                           <!-- <td>  <span v-html="bloginfo.description"></span></td> -->
                          <td>    
                         <span class="btn btn-sm btn-primary" @click.prevent="activestatus(company.id)" v-if="company.status==1"><i class="fas fa-check-square"></i> </span>
                         <span class="btn btn-sm btn-danger" @click.prevent="inactivestatus(company.id)"  v-else><i class="fas fa-ban"></i></span>
                         </td>
                       <td>
                        
                        <router-link :to="`/admin/editcompany/${company.id}`">
                       <i class="fas fa-edit"></i>
                        </router-link>
                        
                    </td>
                       <td>
                        <button class="btn btn-sm btn-warning" @click.prevent="deleteCompany(company.id)"><i class="fas fa-trash-alt"></i></button>
                        
                        
                    </td>
                </tr>
                
                </tbody>
                
              </table>
                <div class="card-footer"><pagination :data="allCompanyList" @pagination-change-page="getResults" style="text-align:center"></pagination></div>
            </div>
            <!-- /.card-body -->
          </div>
 
</template>

<script>
export default {
  name: "ModelYearList",
  data(){
return{
  allCompanyList:{}
}

  },
  
   created () {
            document.title = " Company List ";
        },
  mounted() {
    this.getResults();
    
  },
  computed: {
   
  },
  methods: {
 getResults(page = 1) {
      axios.get("/admin/companylist?page=" + page).then(response => {
        this.allCompanyList = response.data;
      });
    },

    deleteCompany(id) {
      if (confirm("Do you really want to delete it?")) {
                   
      axios.delete("/admin/deletecompany/" + id)
        .then(({ response = true }) => {
          [toastr.warning(" Company   Delete Successfully", "Company")];
        
        });
      }
      axios.get("/admin/companylist?page=" +  this.allCompanyList.current_page).then(response => {
       this.allCompanyList = response.data;
      })
        .catch(function(response = false) {
            toastr.error("Sorry Try Agin");
        }); //for show Division
    },
     activestatus(id){
    
          axios.post("/admin/companydactive/" + id)
        .then(({ response = true }) => {
         [toastr.success("Company In-Active Successfully", "Company")];
        });
           
       axios.get("/admin/companylist?page=" +  this.allCompanyList.current_page).then(response => {
       this.allCompanyList = response.data;
      })
        .catch(function(response = false) {
          console.log(response);
          toastr.error("Sorry Try Agin");
        }); //for inactive account
// alert('Hello');
    },
      inactivestatus(id){
        //alert(5);
      axios
        .post("/admin/companyactive/" + id)
        .then(({ response = true }) => {
          [toastr.success("Company Active Successfully", "Company")];
        });
   
       axios.get("/admin/companylist?page=" +  this.allCompanyList.current_page).then(response => {
       this.allCompanyList = response.data;
      })
        .catch(function(response = false) {
          console.log(response);
          toastr.error("Sorry Try Agin");
        }); //for active Account
// alert('Hello');
    },
  }
};
</script>

