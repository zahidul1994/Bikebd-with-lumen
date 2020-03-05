<template>
<div>
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
      
    </ul>

    <!-- SEARCH FORM -->
     <!-- <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>  -->

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-comments"></i>
          <span class="badge badge-danger navbar-badge">3</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
           <a href="#" class="dropdown-item">
            <!-- Message Start -->
             <div class="media">
              <img src="" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Brad Diesel
                  <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">Call me whenever you can...</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a> 
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <!-- <img src="dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3"> -->
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  John Pierce
                  <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">I got your message bro</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <!-- <img src="dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3"> -->
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Nora Silvester
                  <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">The subject goes here</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
        </div>
      </li>
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-user"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">My Information </span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-userinfo mr-2"></i> <router-link to="/admin/adminprofile">Update Info</router-link>
            <!-- <span class="float-right text-muted text-sm">3 mins</span> -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>
      <li class="nav-item"> <a class="nav-link info"  style="cursor:pointer" @click="logOutNow()">
            Logout</a></li>
<!--       
       <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" ><i
            class="fas fa-th-large"></i></a>
      </li> -->
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
  

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
          <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img :src="'/images/profileimage/' + authenticatedimage" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a  class="d-block">{{authenticatedname}}</a>
        </div>
      </div> 

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview ">
            <a  class="nav-link ">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Bike
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a  class="nav-link">
                  <i class="fas fa-user"></i>
                  <p><router-link to="/admin/divisionlist">Division</router-link></p>
                </a>
              </li>
            
              <li class="nav-item">
                <a  class="nav-link">
                  <i class="fas fa-hand-paper"></i>
                  <p><router-link to="/admin/subdivisionlist">Sub-Division</router-link></p>
                </a>
              </li>
              <li class="nav-item">
                <a  class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p><router-link to="/admin/categorylist">Category</router-link></p>
                </a>
              </li> 
               <li class="nav-item">
                <a  class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p><router-link to="/admin/parentpagelist">Parent Page</router-link></p>
                </a>
              </li>
              <li class="nav-item">
                <a  class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p><router-link to="/admin/accessoriestypelist">Accesories Type</router-link></p>
                </a>
              </li> 
              <li class="nav-item">
                <a  class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p><router-link to="/admin/bikemodellist">Model</router-link></p>
                </a>
              </li>
              <li class="nav-item">
                <a  class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p><router-link to="/admin/modelyearlist">Model Year</router-link></p>
                </a>
              </li>
              <li class="nav-item">
                <a  class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p><router-link to="/admin/bikeversionlist">Bike Version </router-link></p>
                </a>
              </li>
              <li class="nav-item">
                <a  class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p><router-link to="/admin/bikebrandlist">Bike Brand </router-link></p>
                </a>
              </li>
            </ul>
          </li>
          
           <li class="nav-item has-treeview ">
            <a  class="nav-link ">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                User
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                <a  class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p><router-link to="/admin/userlist">User View</router-link></p>
                </a>
              </li> 
               <li class="nav-item">
                <a  class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p><router-link to="/admin/adminlist">Admin View</router-link></p>
                </a>
              </li>
             
            
            </ul>
          </li>
           <li class="nav-item has-treeview">
           
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a  class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                   <p><router-link to="/admin/adminmanager">Admin's Manager</router-link></p>
                </a>
              </li>  
			
              <li class="nav-item">
                <a  class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p><router-link to="/admin/usercarpostlist">UserCar List </router-link></p>
                </a>
              </li>
               <li class="nav-item">
                <a  class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p><router-link to="/admin/useraccessoriespostlist">UserAccessories List </router-link></p>
                </a>
              </li>
               <li class="nav-item">
                <a  class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p><router-link to="/admin/shoppaymentcheck">Shop Payment  </router-link></p>
                </a>
              </li>
            </ul>
          </li>
         <li class="nav-item has-treeview ">
            <a  class="nav-link ">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
               Product
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                <a  class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                   <p><router-link to="/admin/enginelist">Engine</router-link></p>
                </a>
              </li> 
             
               <li class="nav-item">
                <a  class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                   <p><router-link to="/admin/borelist">Bore</router-link></p>
                </a>
              </li> 
               <li class="nav-item">
                <a  class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p><router-link to="/admin/strokelist">Stroke</router-link></p>
                </a>
              </li>
               <li class="nav-item">
                <a  class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                   <p><router-link to="/admin/cylinderelist">Cylinder</router-link></p>
                </a>
              </li>
              <li class="nav-item">
                <a  class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p><router-link to="/admin/gearlist">Gear</router-link></p>
                </a>
              </li>
              <li class="nav-item">
                <a  class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p><router-link to="/admin/clutchlist">Clutch</router-link></p>
                </a>
              </li>
                <li class="nav-item">
                <a  class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p><router-link to="/admin/chassislist">Chassis</router-link></p>
                </a>
              </li>
              
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="" class="nav-link">
              <i class="nav-icon fas fa-tree"></i>
              <p>
               BlogPost
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                 <a  class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p><router-link to="/admin/blogpost">BlogPost  </router-link></p>
                </a>
              </li>
            
            </ul>
          </li> 
               <li class="nav-item has-treeview">
            <a href="" class="nav-link">
              <i class="nav-icon fas fa-tree"></i>
              <p>
               Company Info
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              
             <li class="nav-item">
                 <a  class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p><router-link to="/admin/companylist">Company  </router-link></p>
                </a>
              </li>
               <li class="nav-item">
                 <a  class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p><router-link to="/admin/brandcategorylist"> Brand Category</router-link></p>
                </a>
              </li>
            </ul>
          </li> 
            <li class="nav-item has-treeview">
            <a href="" class="nav-link">
              <i class="nav-icon fas fa-tree"></i>
              <p>
              Product Page
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              
              <li class="nav-item">
                 <a  class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p><router-link to="/admin/productlist">Product   </router-link></p>
                </a>
              </li>
               <li class="nav-item">
                 <a  class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p><router-link to="/admin/brandcategorylist"> Brand Category</router-link></p>
                </a>
              </li>
            </ul>
          </li>  
             <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tree"></i>
              <p>
               BlogPage
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                 <a  class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p><router-link to="/admin/blogpage">BlogPage </router-link></p>
                </a>
              </li>
             </ul>
          </li>
          
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Tables
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pages/tables/simple.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Simple Tables</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/tables/data.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>DataTables</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/tables/jsgrid.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>jsGrid</p>
                </a>
              </li>
            </ul>
          </li>
                 
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container">
     <router-view></router-view>
      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <li> <a class="nav-link btn btn-info"  @click="logOutNow()">
            Logout</a></li>
    <li> </li>
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    
    <strong>Copyright &copy; 2019-2020  <a href="http://bikebdbikroy.com">Virtuanic Solution</a>.</strong>
    All rights reserved by Virtuanic Solutions Ltd.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.0.0
    </div>
  </footer>
</div>

</template>



<script>
    export default {
      name:'AdminDashboard',
        data(){
        return {
        authenticatedname:null,
        authenticatedimage:null,
       
        }
    },
   
    mounted(){
     
      var token = localStorage.getItem("token");
       var admin =localStorage.getItem("admin");
      if(token && admin){
         this.authenticatedimage=JSON.parse(localStorage.getItem("admin")).image;
        this.authenticatedname= JSON.parse(localStorage.getItem("admin")).name;
     
        
         
      }
      else{
         this.$router.push("/admin/login");
      }
    },
 
    methods: {
      logOutNow(){
        //alert(5);
         localStorage.clear();
        this.$router.push("/admin/login")
      },
    //  superadmininfo(){
    //      axios.post("/superadmin/profile")
    //        .then(response => {
    //       return this.superadmin=response.data.superadmininfo;
    
    //     });
    //   }
       
    }
  }
</script>