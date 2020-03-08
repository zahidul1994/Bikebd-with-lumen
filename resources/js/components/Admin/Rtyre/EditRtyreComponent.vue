<template>
 <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit Rear Tyre</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
               <form role="form"  @submit.prevent="updateReartyre">
             
                <div class="card-body">
                  <div class="form-group">
                    <label for="rtyre">Rear Tyre</label>
                     <input  v-model="form.rtyre" type="text" class="form-control" :class="{ 'is-invalid': form.errors.has('rtyre') }" id="rtyre" placeholder="Rear Tyre ">
                        <has-error :form="form" field="rtyre"></has-error>
                  </div>
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Update</button>
                   <router-link to="/admin/rtyrelist" class="btn btn-default ">Cancel</router-link>
               </div>
            </form>
                </div>

</template>

<script>
    export default {
      name:'EditRearTyre',
       created () {
            document.title = "Edit Rear Tyre";
        },
      mounted(){
          axios.get(`/admin/editrtyre/${this.$route.params.id}`)
          .then((response)=>{
              this.form.fill(response.data.rtyre)
          })
      },
        data(){
        return {
          form: new Form({
            rtyre:'',
          })
          
        }
    },
    
    
    methods: {
      updateReartyre(){
        this.form.patch('/admin/updatertyre/'+`${this.$route.params.id}`)
        //console.log('ok');
        .then(({ response }) => { [toastr.success('Rear Tyre Update Successfull')],[this.$router.push('/admin/rtyrelist')]})
        .catch(function (response) {console.log(response);toastr.warning("Sorry Try Agin"); });
      }
       
    }
  }
</script>