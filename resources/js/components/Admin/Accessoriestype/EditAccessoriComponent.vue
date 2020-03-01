<template>
 <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit Accessories</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
               <form role="form"  @submit.prevent="updateAccessories">
             
                <div class="card-body">
                  <div class="form-group">
                    <label for="division">Accessories</label>
                     <input  v-model="form.accessoriesname" type="text" class="form-control" :class="{ 'is-invalid': form.errors.has('accessoriesname') }" id="division" placeholder="Accessories Name">
                        <has-error :form="form" field="accessoriesname"></has-error>
                  </div>
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Update</button>
                  <router-link to="/admin/accessoriestypelist" class="btn btn-default ">Cancel</router-link>
               </div>
            </form>
                </div>

</template>

<script>
    export default {
      name:'EditAccessories',
       created () {
            document.title = "Edit Accessories";
        },
      mounted(){
          axios.get(`/admin/editaccessoriestype/${this.$route.params.id}`)
          .then((response)=>{
              this.form.fill(response.data.accessories)
          })
      },
        data(){
        return {
          form: new Form({
            accessoriesname:'',
          })
          
        }
    },
    
    
    methods: {
      updateAccessories(){
        this.form.patch('/admin/updateaccessoriestype/'+`${this.$route.params.id}`)
        //console.log('ok');
        .then(({ response }) => { [toastr.success('Accessories Update Successfull')],[this.$router.push('/admin/accessoriestypelist')]})
        .catch(function (response) {console.log(response);toastr.warning("Sorry Try Agin"); });
      }
       
    }
  }
</script>