

<template>
  <div class="container center">


  <div class="dropdown">
  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Bike
  </button>
  <div class="dropdown-menu">
    <!-- <a class="dropdown-item" href="#">Brand New</a> -->
        <router-link to="/en/bikepostlist">Bike View</router-link></p>
        <router-link to="/en/newbikepost">New bike Post</router-link></p>
        <router-link to="/en/usedbike">Used bike Post</router-link></p>
    
    <!-- <a class="dropdown-item" href="#">Used</a> -->
  
  </div>

<div class="btn-group">
  <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Car
  </button>
  <div class="dropdown-menu">
      <router-link to="/en/carpostlist">Car View</router-link></p>
      <router-link to="/en/brandnewcarview">Brand New Car</router-link></p>
       <router-link to="/en/postusedcar">Used Car</router-link></p>
       <router-link to="/en/postreconditioncar">Recondition Car</router-link></p>
  
  </div>
</div>
<div class="btn-group">
  <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Accessories 
  </button>
  <div class="dropdown-menu">
      <router-link to="/en/accessorieslist">Accessories View</router-link></p>
      <router-link to="/en/accbikenew">Brand New Bike</router-link></p>
       <!-- <router-link to="/en/accessoriesusedview">Used Bike</router-link></p>
       <router-link to="/en/accnewcarview">Brand New Car</router-link></p>
       <router-link to="/en/accessorggiesview">Used Car</router-link></p>
       <router-link to="/en/accessorggiesview">Other New </router-link></p>
       <router-link to="/en/accessggoriesview">Other Used</router-link></p> -->
  
  </div>
</div>

<!-- <div class="btn-group">
  <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Accessories Car
  </button>
  <div class="dropdown-menu">
      <router-link to="/en/accessoriesview">Brand New</router-link></p>
       <router-link to="/en/accessoriesview">Used</router-link></p>
  
  </div>
</div> -->

<!-- <div class="btn-group">
  <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Accessories Other 
  </button>
  <div class="dropdown-menu">
      <router-link to="/en/accessoriesview">Brand New</router-link></p>
       <router-link to="/en/accessoriesview">Used</router-link></p>
  
  </div>
</div> -->
</div>
</div>

</template>


