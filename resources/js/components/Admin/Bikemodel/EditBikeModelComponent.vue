<template>
 <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit Bike Model</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
               <form role="form"  @submit.prevent="updateBikeModel">
             
                <div class="card-body">
                  <div class="form-group">
                    <label for="division">Bike Model</label>
                     <input  v-model="form.bikemodel" type="text" class="form-control" :class="{ 'is-invalid': form.errors.has('bikemodel') }" id="division" placeholder="Category Name">
                        <has-error :form="form" field="bikemodel"></has-error>
                  </div>
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Update</button>
                   <router-link to="/admin/bikemodellist" class="btn btn-default ">Cancel</router-link>
               </div>
            </form>
                </div>

</template>

<script>
    export default {
      name:'EditBikeModel',
       created () {
            document.title = "Edit Bike Model";
        },
      mounted(){
          axios.get(`/admin/editbikemodel/${this.$route.params.id}`)
          .then((response)=>{
              this.form.fill(response.data.bikemodel)
          })
      },
        data(){
        return {
          form: new Form({
            bikemodel:'',
          })
          
        }
    },
    
    
    methods: {
      updateBikeModel(){
        this.form.patch('/admin/updatebikemodel/'+`${this.$route.params.id}`)
        //console.log('ok');
        .then(({ response }) => { [toastr.success('Bike Model Update Successfull')],[this.$router.push('/admin/bikemodellist')]})
        .catch(function (response) {console.log(response);toastr.warning("Sorry Try Agin"); });
      }
       
    }
  }
</script>