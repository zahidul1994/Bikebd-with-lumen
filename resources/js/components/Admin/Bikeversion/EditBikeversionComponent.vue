<template>
 <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit Bike Version</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
               <form role="form"  @submit.prevent="updateBikeVersion">
             
                <div class="card-body">
                  <div class="form-group">
                    <label for="bikeversion">Bike Version</label>
                     <input  v-model="form.bikeversion" type="text" class="form-control" :class="{ 'is-invalid': form.errors.has('bikeversion') }" id="bikeversion" placeholder="Bike Version Name">
                        <has-error :form="form" field="bikeversion"></has-error>
                  </div>
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Update</button>
                   <router-link to="/admin/bikeversionlist" class="btn btn-default ">Cancle</router-link>
               </div>
            </form>
                </div>

</template>

<script>
    export default {
      name:'EditBikeVersin',
       created () {
            document.title = "Edit Bike Version";
        },
      mounted(){
          axios.get(`/admin/editbikeversion/${this.$route.params.id}`)
          .then((response)=>{
              this.form.fill(response.data.bikeversion)
          })
      },
        data(){
        return {
          form: new Form({
            bikeversion:'',
          })
          
        }
    },
    
    
    methods: {
      updateBikeVersion(){
        this.form.patch('/admin/updatebikeversion/'+`${this.$route.params.id}`)
        //console.log('ok');
        .then(({ response }) => { [toastr.success('Bike Version Update Successfull')],[this.$router.push('/admin/bikeversionlist')]})
        .catch(function (response) {console.log(response);toastr.warning("Sorry Try Agin"); });
      }
       
    }
  }
</script>