<template>

   <div>

  <div class="card"  v-for="bikeinfo, index in shopvalue">
    <div class="card-header h2" >{{bikeinfo.bikebrand.bikebrand}} {{bikeinfo.bikemodel.bikemodel}} {{bikeinfo.bikeversion}}</div>
     <div class="row">
     
    <div v-for="image, index in bikeinfo.bikeimage">
      <img class="card-img  w-60" :src="'/images/bikepostimage/'+ image.image" alt="First slide">
       
    </div>
    
  </div>
  

    <div class="card-body">
      <h3>TK: {{bikeinfo.price}}</h3>
      <p class="card-text">{{bikeinfo.description}}</p>
      <p class="card-text"><small class="text-muted">Shared publicly - {{bikeinfo.created_at}}</small></p>
    </div>
  </div>
</div>

    

              
</template>
<script>
    export default {
        name: 'Shopview',
        data() {
            return {
               
                shopvalue:[],

            }
        },
        mounted() {
         
            axios.get(`http://127.0.0.1:8000/en/shop/${this.$route.params.id}`)
                .then(response => {
                    (this.shopvalue = response.data.shopinfo)
                    console.log(response);

                });
           
        },

    }

</script>
