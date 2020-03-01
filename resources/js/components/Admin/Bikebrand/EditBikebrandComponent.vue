<template>
 <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit Bike Brand</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
               <form role="form"  @submit.prevent="updateBikeBrand">
             
                <div class="card-body">
                  <div class="form-group">
                    <label for="bikeversion">Bike Brand</label>
                     <input  v-model="form.bikebrand" type="text" class="form-control" :class="{ 'is-invalid': form.errors.has('bikebrand') }" id="bikebrand" placeholder="Bike Brand Name">
                        <has-error :form="form" field="bikebrand"></has-error>
                  </div>
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Update</button>
                   <router-link to="/admin/bikebrandlist" class="btn btn-default ">Cancel</router-link>
               </div>
            </form>
                </div>

</template>

<script>
    export default {
      name:'EditBikebrand',
       created () {
            document.title = "Edit Bike Brand";
        },
      mounted(){
          axios.get(`/admin/editbikebrand/${this.$route.params.id}`)
          .then((response)=>{
              this.form.fill(response.data.bikebrand)
          })
      },
        data(){
        return {
          form: new Form({
            bikebrand:'',
          })
          
        }
    },
    
    
    methods: {
      updateBikeBrand(){
        this.form.patch('/admin/updatebikebrand/'+`${this.$route.params.id}`)
        //console.log('ok');
        .then(({ response }) => { [toastr.success('Bike Brand Update Successfull')],[this.$router.push('/admin/bikebrandlist')]})
        .catch(function (response) {console.log(response);toastr.warning("Sorry Try Agin"); });
      }
       
    }
  }
</script>