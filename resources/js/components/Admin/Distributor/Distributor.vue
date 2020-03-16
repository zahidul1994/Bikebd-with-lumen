<template>
<div class="card">
            <div class="card-header">
              <h3 class="card-title">Distributor  List </h3>
                <div class="text-right">  <div class="btn btn-outline-info "> <router-link to="/admin/createdistributor">Create Distributor</router-link></div></div>
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
                  <th>Distributor</th>
                  <th>Image</th>
                  <th>Address</th>
                  <th>Phone</th>
                  <th>Full Name</th>
                  <th>Description</th>
                  <th>Status</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="company, index in allDistributorList.data">
                        
                          <td>{{ index + 1 }}</td>
                          <td>{{company.distributor}}</td>
                          <td><img :src="'/images/distributorimage/'+ company.profileimage" alt="no image" width=50 data-lightbox="image-1"></td>
                          <td>{{company.address}}</td>
                          <td>{{company.phone}}</td>
                          <td>{{company.fullname}}</td>
                          <td>{{company.description|shortlength(20,"..")}}</td>

                           <!-- <td>  <span v-html="bloginfo.description"></span></td> -->
                          <td>    
                         <span class="btn btn-sm btn-primary" @click.prevent="activestatus(company.id)" v-if="company.status==1"><i class="fas fa-check-square"></i> </span>
                         <span class="btn btn-sm btn-danger" @click.prevent="inactivestatus(company.id)"  v-else><i class="fas fa-ban"></i></span>
                         </td>
                       <td>
                        
                        <router-link :to="`/admin/editdistributor/${company.id}`">
                       <i class="fas fa-edit"></i>
                        </router-link>
                        
                    </td>
                       <td>
                        <button class="btn btn-sm btn-warning" @click.prevent="deleteDistributor(company.id)"><i class="fas fa-trash-alt"></i></button>
                        
                        
                    </td>
                </tr>
                
                </tbody>
                
              </table>
                <div class="card-footer"><pagination :data="allDistributorList" @pagination-change-page="getResults" style="text-align:center"></pagination></div>
            </div>
            <!-- /.card-body -->
          </div>
 
</template>

<script>
export default {
  name: "DistributorList",
  data(){
return{
  keyword:'',
  allDistributorList:{}
   
}

  },
  
   created () {
            document.title = " Distributor List ";
        },
  mounted() {
    this.getResults();
    
  },
  computed: {
   
  },
  methods: {
 getResults(page = 1) {
      axios.get("/admin/distributorlist?page=" + page).then(response => {
        this.allDistributorList = response.data;
      });
    },
 //for serach
        RealSearch:_.debounce(function () {
      //alert(5);
      axios.get("/admin/distributorsearch?s=" + encodeURI(this.keyword)).then(response => {
        this.allDistributorList = response.data;
      });   
            },1000),
    deleteDistributor(id) {
      if (confirm("Do you really want to delete it?")) {
                   
      axios.delete("/admin/deletedistributor/" + id)
        .then(({ response = true }) => {
          [toastr.warning(" Distributor   Delete Successfully", "Distributor")];
        
        });
      }
      axios.get("/admin/distributorlist?page=" +  this.allDistributorList.current_page).then(response => {
       this.allDistributorList = response.data;
      })
        .catch(function(response = false) {
            toastr.error("Sorry Try Agin");
        }); //for show Division
    },
     activestatus(id){
    
          axios.post("/admin/distributordactive/" + id)
        .then(({ response = true }) => {
         [toastr.success("Distributor In-Active Successfully", "Distributor")];
        });
           
       axios.get("/admin/distributorlist?page=" +  this.allDistributorList.current_page).then(response => {
       this.allDistributorList = response.data;
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
        .post("/admin/distributoractive/" + id)
        .then(({ response = true }) => {
          [toastr.success("Distributor Active Successfully", "Distributor")];
        });
   
       axios.get("/admin/distributorlist?page=" +  this.allDistributorList.current_page).then(response => {
       this.allDistributorList = response.data;
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

