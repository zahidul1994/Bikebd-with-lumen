<template>
 <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit  Cc</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
               <form role="form"  @submit.prevent="updateCC">
             
                <div class="card-body">
                  <div class="form-group">
                    <label for="cc">Cc Name</label>
                     <input  v-model="form.cc" type="text" class="form-control" :class="{ 'is-invalid': form.errors.has('cc') }" id="cc" placeholder="CC">
                        <has-error :form="form" field="cc"></has-error>
                  </div>
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Update</button>
                   <router-link to="/admin/cclist" class="btn btn-default ">Cancel</router-link>
               </div>
            </form>
                </div>

</template>

<script>
    export default {
      name:'EditCC',
       created () {
            document.title = "Edit Cc";
        },
      mounted(){
          axios.get(`/admin/editcclist/${this.$route.params.id}`)
          .then((response)=>{
              this.form.fill(response.data.cclist)
          })
      },
        data(){
        return {
          form: new Form({
            cc:'',
          })
          
        }
    },
    
    
    methods: {
      updateCC(){
        this.form.patch('/admin/updatecclist/'+`${this.$route.params.id}`)
        //console.log('ok');
        .then(({ response }) => { [toastr.success('Cc Update Successfully')],[this.$router.push('/admin/cclist')]})
        .catch(function (response) {toastr.warning("Sorry Try Agin"); });
      }
       
    }
  }
</script>