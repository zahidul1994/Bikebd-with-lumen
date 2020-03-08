<template>
 <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit Fuel Tank Capacity</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
               <form role="form"  @submit.prevent="updateFtcapacity">
             
                <div class="card-body">
                  <div class="form-group">
                    <label for="ftcapacity">Rear Tyre</label>
                     <input  v-model="form.ftcapacity" type="text" class="form-control" :class="{ 'is-invalid': form.errors.has('ftcapacity') }" id="ftcapacity" placeholder="Fuel Tank Capacity">
                        <has-error :form="form" field="ftcapacity"></has-error>
                  </div>
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Update</button>
                   <router-link to="/admin/ftcapacitylist" class="btn btn-default ">Cancel</router-link>
               </div>
            </form>
                </div>

</template>

<script>
    export default {
      name:'EditFtcapacity',
       created () {
            document.title = "Edit Fuel Tank Capacity";
        },
      mounted(){
          axios.get(`/admin/editftcapacity/${this.$route.params.id}`)
          .then((response)=>{
              this.form.fill(response.data.ftcapacity)
          })
      },
        data(){
        return {
          form: new Form({
            ftcapacity:'',
          })
          
        }
    },
    
    
    methods: {
      updateFtcapacity(){
        this.form.patch('/admin/updateftcapacity/'+`${this.$route.params.id}`)
        //console.log('ok');
        .then(({ response }) => { [toastr.success('Rear Tyre Update Successfull')],[this.$router.push('/admin/ftcapacitylist')]})
        .catch(function (response) {console.log(response);toastr.warning("Sorry Try Agin"); });
      }
       
    }
  }
</script>