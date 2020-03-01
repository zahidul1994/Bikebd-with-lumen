<template>
 <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit  Model Year</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
               <form role="form"  @submit.prevent="updateModelYear">
             
                <div class="card-body">
                  <div class="form-group">
                    <label for="modelyear">Model Year</label>
                     <input  v-model="form.modelyear" type="number" class="form-control" :class="{ 'is-invalid': form.errors.has('modelyear') }" id="division" placeholder="Model Year">
                        <has-error :form="form" field="modelyear"></has-error>
                  </div>
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Update</button>
                   <router-link to="/admin/modelyearlist" class="btn btn-default ">Cancel</router-link>
               </div>
            </form>
                </div>

</template>

<script>
    export default {
      name:'EditModelYear',
       created () {
            document.title = "Edit Model Year";
        },
      mounted(){
          axios.get(`/admin/editmodelyear/${this.$route.params.id}`)
          .then((response)=>{
              this.form.fill(response.data.modelyear)
          })
      },
        data(){
        return {
          form: new Form({
            modelyear:'',
          })
          
        }
    },
    
    
    methods: {
      updateModelYear(){
        this.form.patch('/admin/updatemodelyear/'+`${this.$route.params.id}`)
        //console.log('ok');
        .then(({ response }) => { [toastr.success('Model Year Update Successfull')],[this.$router.push('/admin/modelyearlist')]})
        .catch(function (response) {console.log(response);toastr.warning("Sorry Try Agin"); });
      }
       
    }
  }
</script>