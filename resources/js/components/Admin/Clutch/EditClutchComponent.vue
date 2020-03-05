<template>
 <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit Clutch</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
               <form role="form"  @submit.prevent="updateClutch">
             
                <div class="card-body">
                  <div class="form-group">
                    <label for="clutch">Clutch</label>
                     <input  v-model="form.clutch" type="text" class="form-control" :class="{ 'is-invalid': form.errors.has('clutch') }" id="clutch" placeholder="Clutch Name">
                        <has-error :form="form" field="clutch"></has-error>
                  </div>
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Update</button>
                   <router-link to="/admin/clutchlist" class="btn btn-default ">Cancel</router-link>
               </div>
            </form>
                </div>

</template>

<script>
    export default {
      name:'EditClutch',
       created () {
            document.title = "Edit Clutch";
        },
      mounted(){
          axios.get(`/admin/editclutch/${this.$route.params.id}`)
          .then((response)=>{
              this.form.fill(response.data.clutch)
          })
      },
        data(){
        return {
          form: new Form({
            clutch:'',
          })
          
        }
    },
    
    
    methods: {
      updateClutch(){
        this.form.patch('/admin/updateclutch/'+`${this.$route.params.id}`)
        //console.log('ok');
        .then(({ response }) => { [toastr.success('Clutch Update Successfull')],[this.$router.push('/admin/clutchlist')]})
        .catch(function (response) {console.log(response);toastr.warning("Sorry Try Agin"); });
      }
       
    }
  }
</script>