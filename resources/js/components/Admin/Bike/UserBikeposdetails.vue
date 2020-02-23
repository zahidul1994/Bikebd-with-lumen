<template>
        <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center inline"v-for="image in bikepostdetails.bikeimage">
                  <img class="profile-user-img img-fluid img-circle"
                       :src="'/images/bikepostimage/'+ image.image"
                       alt="User profile picture">
                </div>

                <h3 class="profile-username text-center">Category: {{bikepostdetails["category.categoryname"]}}</h3>

                <p class="text-muted text-center">{{bikepostdetails.created_at}}</p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Bike Type</b> <a class="float-right">{{bikepostdetails.biketype}}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Starting</b> <a class="float-right">{{bikepostdetails.startingmethod}}</a>
                  </li> <li class="list-group-item">
                    <b>Engine Capacity</b> <a class="float-right">{{bikepostdetails.engine_capacity}}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Description</b> <a class="float-right">{{bikepostdetails.description}}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Price</b> <a class="float-right">{{bikepostdetails.price}}</a>
                  </li>
                   <li class="list-group-item">
                    <b>Status</b> <a class="float-right">{{bikepostdetails.active}}</a>
                  </li>
                </ul>
   <b><router-link to="/admin/userbikepostlist" class="btn btn-primary btn-block">Back </router-link></b>
                        
             
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
 
</template>

<script>
export default {
    data(){
         return {
bikepostdetails:[],

         }
    },
  name: "UserBikePostdetails",

  mounted() {
    axios.get(`http://127.0.0.1:8000/admin/bikepostdetails/${this.$route.params.id}`)
.then(response => {
(this.bikepostdetails = response.data.bikepostdetails)
//console.log(response);

});
  },
 
}; 
</script>

